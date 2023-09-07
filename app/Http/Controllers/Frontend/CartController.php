<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Coupon;
use App\Model\Product;
use App\Model\ProductAttribute;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class CartController extends Controller
{
    public function add_to_cart(Request $request)
    {
        $this->validate($request, [
            'qty' => 'required',
        ]);

       $product = Product::with('attributes')->find($request->product_id);

        if($product->attributes->count() != 0){
            $this->validate($request, [
                'attribute_id' => 'required'
            ]);
        }

        //Check Product if already exits in cart
        $contents = Cart::content();
        foreach ($contents as $content){
            if($content->options->attribute_id != null){
                if($request->attribute_id == $content->options->attribute_id && $content->id == $request->product_id){
                    notify()->error('Sorry ! Product already exists in Cart!', 'Error');
                    return redirect()->back();
                }
            }else{
                if($content->id == $request->product_id){
                    notify()->error('Sorry ! Product already exists in Cart!', 'Error');
                    return redirect()->back();
                }
            }
        }

        $qty = $request->qty;
        if ($qty < 1) {
            notify()->error('Please Add Maximum Quantity!', 'Error');
            return redirect()->back();
        }


        $attribute = ProductAttribute::where(['product_id' => $request->product_id, 'id' => $request->attribute_id])->first();
        if(!empty($attribute)){
            if ($attribute->stock < 1){
                notify()->error('Sorry ! This Product is not available!', 'Error');
                return redirect()->back();
            }elseif ($attribute->stock < $qty){
                notify()->error('Sorry ! Required Quantity is not available', 'Error');
                return redirect()->back();
            }
        }else{
            if ($product->stock < 1){
                notify()->error('Sorry ! This Product is not available!', 'Error');
                return redirect()->back();
            }elseif ($product->stock < $qty){
                notify()->error('Sorry ! Required Quantity is not available', 'Error');
                return redirect()->back();
            }
        }

        //Forget Coupon Session
        Session::forget('coupon_amount');
        Session::forget('coupon_code');

        Cart::add([
            'id' => $request->product_id,
            'qty' => $request->qty,
            'price' => 0,
            'name' => $product->name,
            'weight' => $product->weight,
            'options' => [
                'attribute_id' => @$attribute->id,
                'code' => $product->code,
                'color' => $product->color,
                'image' => $product->main_image,
                'discount' => $request->discount,
            ],
        ]);

        notify()->success('Product has been added in cart!', 'Success');
        return redirect()->route('show.cart');
    }

    public function show_cart()
    {
        $contents = Cart::content();
        return view('frontend.cart.shopping_cart', compact('contents'));
    }

    public function update_quantity(Request $request)
    {
        $qty = $request->new_qty;

        $data = Cart::get($request->rowId);

        $product_id = $data->id;
        $attribute_id = $data->options->attribute_id;
        $avilableStocks = ProductAttribute::select('stock')->where(['product_id' =>$product_id, 'id'=>$attribute_id ])->first();
        if(!empty($avilableStocks)){
            if ($qty > $avilableStocks->stock){
                $messege = "Product Stock is not available";
            }else{
                //Forget Coupon Session
                Session::forget('coupon_amount');
                Session::forget('coupon_code');

                Cart::update( $request->rowId, $qty);
                $messege = '';
            }
        }else{
            $product = Product::find($product_id);
            if ($qty > $product->stock){
                $messege = "Product Stock is not available";
            }else{
                //Forget Coupon Session
                Session::forget('coupon_amount');
                Session::forget('coupon_code');

                Cart::update( $request->rowId, $qty);
                $messege = '';
            }
        }

        if(isset($messege)){
            $contents = Cart::content();
            $totalCartItems = totalCartItems();
            $totalAmount = totalAmount();
            $coupon_amount = 0;
            return response()->json([
                'messege' => $messege,
                'totalCartItems' => $totalCartItems,
                'totalAmount' => $totalAmount,
                'coupon_amount' => $coupon_amount,
                'status' => false,
                'view' => (String)View::make('frontend.cart.cart_items', compact('contents')),
            ]);
        }
    }

    public function destroy_cart_item($rowId)
    {
        //Forget Coupon Session
        Session::forget('coupon_amount');
        Session::forget('coupon_code');


        Cart::remove($rowId);
        notify()->success('Product Removed', 'Success');
        return redirect()->back();
    }

    public function apply_coupon(Request $request)
    {
        //Forget Coupon Session
        Session::forget('coupon_amount');
        Session::forget('coupon_code');

        $coupon_count = Coupon::where('coupon_code', $request->code)->count();
        if($coupon_count == 0){
            $contents = Cart::content();
            $totalCartItems = totalCartItems();
            $totalAmount = totalAmount();
            if(Session::get('coupon_amount') == null){
                $coupon_amount = 0;
            }else{
                $coupon_amount = Session::get('coupon_amount');
            }
            $total_coupon_amount = totalAmount()-$coupon_amount;
            return response()->json([
                'messege' => 'This Coupon is not valid!',
                'totalCartItems' => $totalCartItems,
                'totalAmount' => $totalAmount,
                'coupon_amount' => $coupon_amount,
                'total_coupon_amount' => $total_coupon_amount,
                'status' => false,
                'view' => (String)View::make('frontend.cart.cart_items', compact('contents')),
            ]);
        }else{
            //Check if coupon is inactive
            $coupon_details = Coupon::where('coupon_code', $request->code)->first();
            if($coupon_details->status == 0){
                $messege = "This Coupon is not active!";
            }

            //check if coupon is expired
            $expiry_date = $coupon_details->expiry_date;
            $current_date = date('Y-m-d', strtotime(Carbon::now()));
            if($expiry_date < $current_date){
                $messege = "This Coupon is expired!";
            }

            if(isset($messege)){
                $contents = Cart::content();
                $totalCartItems = totalCartItems();
                $totalAmount = totalAmount();
                if(Session::get('coupon_amount') == null){
                    $coupon_amount = 0;
                }else{
                    $coupon_amount = Session::get('coupon_amount');
                }
                $total_coupon_amount = totalAmount()-$coupon_amount;
                return response()->json([
                    'messege' => $messege,
                    'totalCartItems' => $totalCartItems,
                    'totalAmount' => $totalAmount,
                    'coupon_amount' => $coupon_amount,
                    'total_coupon_amount' => $total_coupon_amount,
                    'status' => false,
                    'view' => (String)View::make('frontend.cart.cart_items', compact('contents')),
                ]);
            }else{
                //Check Amount Type
                if($coupon_details->amount_type == 'Fixed'){
                    $coupon_amount = $coupon_details->amount;
                }else{
                    $coupon_amount = totalAmount()*$coupon_details->amount/100;
                    $coupon_amount = (int)$coupon_amount;
                }
                //Add coupon Code & Amount in Session
                Session::put('coupon_amount', $coupon_amount);
                Session::put('coupon_code', $request->code);

                $contents = Cart::content();
                $totalCartItems = totalCartItems();
                $totalAmount = totalAmount();
                if(Session::get('coupon_amount') == null){
                    $coupon_amount = 0;
                }else{
                    $coupon_amount = Session::get('coupon_amount');
                }
                $total_coupon_amount = totalAmount()-$coupon_amount;
                return response()->json([
                    'messege' => 'Coupon code successfully applied. You are availing discount',
                    'totalCartItems' => $totalCartItems,
                    'totalAmount' => $totalAmount,
                    'coupon_amount' => $coupon_amount,
                    'total_coupon_amount' => $total_coupon_amount,
                    'status' => true,
                    'view' => (String)View::make('frontend.cart.cart_items', compact('contents')),
                ]);
            }
        }
    }


}
