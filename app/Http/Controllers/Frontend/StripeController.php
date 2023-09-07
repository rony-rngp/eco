<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Order;
use App\Model\Product;
use App\Model\ProductAttribute;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Stripe;

class StripeController extends Controller
{
    public function index(){
        if (Session::has('order_id')){
            return view('frontend.checkout.stripe');
        }else{
            return redirect()->route('show.cart');
        }
    }

    public function payment(Request $request)
    {

        $order = Order::find(Session::get('order_id'));
        if($order->status == 'Complete'){
            Session::forget('order_id');
            Session::forget('grand_total');
            Session::forget('coupon_amount');
            Session::forget('coupon_code');
            Cart::destroy();

            notify()->error('Order already completed!', 'Error');
            return redirect()->route('checkout');
        }

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $data =  Stripe\Charge::create([
            "amount" => Session::get('grand_total')*100,
            "currency" => "bdt",
            "source" => $request->stripeToken,
            "description" => 'Payment  successfully completed',
            "receipt_email" => $order->email,

            "shipping"=> [
                'address'=>[
                    "city" => $order->division,
                    "country" => $order->country,
                    "line1" => $order->address,
                    "line2" => "",
                    "postal_code" => $order->zip_code,
                    "state" => $order->district,
                ],
                "name"=> $order->first_name.' '.$order->last_name,
                "phone" => $order->mobile,
            ],

        ]);



        if($data['status'] == 'succeeded') {

            if ($order->status == 'Pending') {
                $update_product = DB::table('orders')
                    ->where('id', $order->id)
                    ->update(['status' => 'Complete', 'transaction_id' => $data->id]);

                $contents = Cart::content();
                foreach ($contents as $content) {
                    //---Stock-----
                    if ($content->options->attribute_id) {
                        $c_attribute = ProductAttribute::where(['id'=>$content->options->attribute_id, 'product_id'=>$content->id])->first();
                        $c_attribute->stock = $c_attribute->stock - $content->qty;
                        $c_attribute->save();
                    }else{
                        $c_product = Product::where('id', $content->id)->first();
                        $c_product->stock = $c_product->stock - $content->qty;
                        $c_product->save();
                    }
                    //---Stock-----
                }

                //----Send Mail
                $order_details = Order::with('order_products','user')->where('id', Session::get('order_id'))->first();
                $email = $order_details->user->email;
                $data = [
                    'name' => $order_details->user->name,
                    'email' => $email,
                    'order_details' => $order_details,
                ];

                Mail::send('frontend.emails.order', $data, function ($messege) use ($email){
                    $messege->to($email)->subject('Order Placed - Flipmart');
                });
                return redirect()->route('thanks');

            }else{
                notify()->error('Order already completed!', 'Error');
                return redirect()->route('checkout');
            }

        } else {
            notify()->error('Something went to wrong!', 'Error');
            return redirect()->route('checkout');
        }
    }
}
