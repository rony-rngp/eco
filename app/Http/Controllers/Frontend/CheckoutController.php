<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Country;
use App\Model\DeliveryAddress;
use App\Model\District;
use App\Model\Order;
use App\Model\OrderProduct;
use App\Model\Product;
use App\Model\ProductAttribute;
use App\Model\ShippingCharge;
use App\Model\SSLCommerz;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Library\SslCommerz\SslCommerzNotification;


class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {

        if($request->isMethod('post')){


            if(empty($request->address_id)){
                notify()->error('Please select delivery address !', 'Error');
                return redirect()->back();
            }
            if(empty($request->payment_gateway)){
                notify()->error('Please select payment method !', 'Error');
                return redirect()->back();
            }

            if ($request->payment_gateway == 'COD'){
                $payment_method = "COD";
            }elseif($request->payment_gateway == 'SSLCommerz'){
                $payment_method = "Prepaid";
            }elseif($request->payment_gateway == 'Stripe'){
                $payment_method = "Prepaid";
            }elseif ($request->payment_gateway == 'Paypal'){
                echo 'coming soon';
                die();
                $payment_method = "Prepaid";
            }else{
                echo 'Invalid Payment Method';
                die();
            }


            //Get delivery address
            $delivery_address = DeliveryAddress::find($request->address_id);

            $contents = Cart::content();

            $total_weight = 0;
            foreach($contents as $content){
                $product_weight = $content->weight;
                $total_weight += $product_weight;
            }

            //Shipping charges
            $shipping_charges = ShippingCharge::getShippingCharges($delivery_address->district, $total_weight);

            //calculate grand total
            $grand_total = Session::get('grand_total')+$shipping_charges;
            //Replace grand total in session
            Session::put('grand_total', $grand_total);

            $contents = Cart::content();
            foreach ($contents as $cart){
                //if product is deleted
                $delete_product = Product::where('id', $cart->id)->first();
                if ($delete_product == '') {
                    //Forget Coupon Session
                    Session::forget('coupon_amount');
                    Session::forget('coupon_code');
                    Session::forget('grand_total');
                    Cart::destroy();
                    notify()->error('Sorry ! Something went to wrong!', 'Error');
                    return redirect()->route('show.cart');
                }
                //if product status is inactive
                $check_product = Product::where('id', $cart->id)->where('status', 1)->first();
                if ($check_product == '') {
                    //Forget Coupon Session
                    Session::forget('coupon_amount');
                    Session::forget('coupon_code');
                    Session::forget('grand_total');
                    Cart::remove($cart->rowId);
                    notify()->error('Sorry ! Product Status Inactive And We Remove From Cart', 'Error');
                    return redirect()->route('show.cart');
                }
                //if product stock is out of stock
                $qty = $cart->qty;
                $attribute = ProductAttribute::where('product_id', $cart->id)->where('id', $cart->options->attribute_id)->first();
                if(!empty($attribute)){
                    if ($attribute->stock < $qty){
                        Cart::remove($cart->rowId);
                        notify()->error('Sorry ! Required Quantity is not available', 'Error');
                        return redirect()->back();
                    }
                }else{
                    $product = Product::where('id', $cart->id)->first();
                    if ($product->stock < $qty){
                        Cart::remove($cart->rowId);
                        notify()->error('Sorry ! Required Quantity is not available', 'Error');
                        return redirect()->back();
                    }
                }
            }


             $order = new Order();
             $order->user_id = Auth::user()->id;
             $order->first_name = $delivery_address->first_name;
             $order->last_name = $delivery_address->last_name;
             $order->address = $delivery_address->address;
             $order->country = $delivery_address->country;
             $order->division = $delivery_address->division;
             $order->district = $delivery_address->district;
             $order->zip_code = $delivery_address->zip_code;
             $order->mobile = $delivery_address->mobile;
             $order->email = Auth::user()->email;
             $order->shipping_charges = $shipping_charges;
             $order->coupon_code = Session::get('coupon_code');
             $order->coupon_amount = Session::get('coupon_amount');
             $order->order_status = 'New';
             $order->payment_method = $payment_method;
             $order->payment_gateway = $request->payment_gateway;
             $transaction_id = rand();
             if($request->payment_gateway == 'SSLCommerz'){
                 $order->transaction_id = $transaction_id;
                 $order->status = 'Pending';
             }
             if($request->payment_gateway == 'Stripe'){
                 $order->status = 'Pending';
             }
             $order->grand_total = Session::get('grand_total');
             $order->amount = Session::get('grand_total');
             $order->currency = 'BDT';
             $order->save();
             Session::put('order_id', $order->id);

             foreach ($contents as $content){

                 //---Get Price-----
                 if ($content->options->attribute_id){
                     $discounted_attr_price = \App\Model\Product::getDiscountedAttrPrice($content->id, $content->options->attribute_id);
                     $d_price = $discounted_attr_price['discounted_attr_price'];
                     if($d_price > 0){
                         $price = $discounted_attr_price['discounted_attr_price'];
                     }else{
                         $price = $discounted_attr_price['product_main_attr_price'];
                     }
                 }else{
                     $discounted_product_price = \App\Model\Product::getDiscountedPrice($content->id);
                     $d_price = $discounted_product_price['discounted_price'];
                     if($d_price > 0){
                         $price = $discounted_product_price['discounted_price'];
                     }else{
                         $price = $discounted_product_price['product_main_price'];
                     }
                 }
                 //---End Get Price-----

                 $order_products = new OrderProduct();
                 $order_products->order_id = $order->id;
                 $order_products->user_id = Auth::user()->id;
                 $order_products->product_id = $content->id;
                 $product = Product::find($content->id);
                 $attribute = ProductAttribute::where('product_id', $content->id)->where('id', $content->options->attribute_id)->first();
                 $order_products->product_code = $product->code;
                 $order_products->product_name = $product->name;
                 $order_products->product_color = $product->color;
                 $order_products->product_size = @$attribute->size;
                 $order_products->product_price = $price;
                 $order_products->product_qty = $content->qty;
                 $order_products->save();
             }


            if ($request->payment_gateway == 'COD'){

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
                $order_details = Order::with('order_products','user')->where('id', $order->id)->first();
                $email = Auth::user()->email;
                $data = [
                    'name' => Auth::user()->name,
                    'email' => $email,
                    'order_details' => $order_details,
                ];

                Mail::send('frontend.emails.order', $data, function ($messege) use ($email){
                    $messege->to($email)->subject('Order Placed - Flipmart');
                });

                return redirect()->route('thanks');
            }else{

                //---SSLCommerz payment gateway-----
                if ($request->payment_gateway == 'SSLCommerz'){

                    SSLCommerz::getPayment($order, $contents);

                }//---Stripe payment gateway-----
                if ($request->payment_gateway == 'Stripe'){

                    return redirect('/stripe');

                }



            }
        }

        //-----checkout------

        $contents = Cart::content();
        $total = 0;
        $total_weight = 0;
        foreach($contents as $content){
            $product_weight = $content->weight;
            $total_weight += $product_weight;
            //----getPrice
            if($content->options->attribute_id) {
                $discounted_attr_price = \App\Model\Product::getDiscountedAttrPrice($content->id, $content->options->attribute_id);
                $d_price = $discounted_attr_price['discounted_attr_price'];
                if($d_price > 0){
                    $price = $discounted_attr_price['discounted_attr_price'];
                }else{
                    $price = $discounted_attr_price['product_main_attr_price'];
                }
                $percentage = $discounted_attr_price['discounted_attr_percentage'];

            }else{

                $discounted_product_price = \App\Model\Product::getDiscountedPrice($content->id);
                $d_price = $discounted_product_price['discounted_price'];
                if ($d_price > 0) {
                    $price = $discounted_product_price['discounted_price'];
                } else {
                    $price = $discounted_product_price['product_main_price'];
                }
                $percentage = $discounted_product_price['discounted_percentage'];

            }

            $total += $price*$content->qty;
        }

        $delivery_addresses = DeliveryAddress::where('user_id', Auth::user()->id)->get();
        foreach ($delivery_addresses as $key => $delivery_address){
            $shipping_charges = ShippingCharge::getShippingCharges($delivery_address->district, $total_weight);
            $delivery_addresses[$key]['shipping_charges'] = $shipping_charges;
        }

        return view('frontend.checkout.checkout', compact('contents', 'delivery_addresses', 'total'));
    }


    public function thanks()
    {
        if(Session::has('order_id')){
            Cart::destroy();
            return view('frontend.checkout.thanks');
        }else{
            return redirect()->route('show.cart');
        }
    }

    public function add_delivery_address()
    {
        $countries = Country::all();
        $districts = District::all();
        return view('frontend.checkout.add_delivery_address', compact('countries', 'districts'));
    }

    public function store_delivery_address(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'address' => 'required|min:3',
            'country' => 'required',
            'division' => 'required',
            'district' => 'required',
            'zip_code' => 'required|numeric',
            'mobile' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        ]);

        $address = new DeliveryAddress();
        $address->user_id = Auth::user()->id;
        $address->first_name = $request->first_name;
        $address->last_name = $request->last_name;
        $address->address = $request->address;
        $address->country = $request->country;
        $address->division = $request->division;
        $address->district = $request->district;
        $address->zip_code = $request->zip_code;
        $address->mobile = $request->mobile;
        $address->status = 1;
        $address->save();

        notify()->success('Delivery address added :)', 'Success');
        return redirect()->route('checkout');
    }

    public function edit_delivery_address($id)
    {
        $countries = Country::all();
        $districts = District::all();
        $address = DeliveryAddress::findOrfail($id);
        if ($address->user_id != Auth::user()->id){
            notify()->error('Access Denied!', 'Error');
            return redirect()->back();
        }
        return view('frontend.checkout.edit_delivery_address', compact('countries', 'address', 'districts'));
    }

    public function update_delivery_address(Request $request, $id)
    {
        $this->validate($request, [
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'address' => 'required|min:3',
            'country' => 'required',
            'division' => 'required',
            'district' => 'required',
            'zip_code' => 'required|numeric',
            'mobile' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        ]);

        $address = DeliveryAddress::find($id);
        $address->user_id = Auth::user()->id;
        $address->first_name = $request->first_name;
        $address->last_name = $request->last_name;
        $address->address = $request->address;
        $address->country = $request->country;
        $address->division = $request->division;
        $address->district = $request->district;
        $address->zip_code = $request->zip_code;
        $address->mobile = $request->mobile;
        $address->save();

        notify()->success('Delivery address Updated :)', 'Success');
        return redirect()->route('checkout');
    }

    public function delete_delivery_address($id)
    {
        $address = DeliveryAddress::findOrfail($id);
        if ($address->user_id != Auth::user()->id){
            notify()->error('Access Denied!', 'Error');
            return redirect()->back();
        }
        $address->delete();
        notify()->success('Delivery Address Deleted :)', 'Success');
        return redirect()->route('checkout');
    }
}
