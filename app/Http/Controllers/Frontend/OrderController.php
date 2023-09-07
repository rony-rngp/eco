<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function order()
    {
        $orders = Order::with('order_products')->where('user_id', Auth::user()->id)->latest()->get();
        return view('frontend.account.order.order', compact('orders'));
    }

    public function order_details($id)
    {
        $order_details = Order::with('order_products')->where('id', $id)->first();
        if($order_details->user_id != Auth::user()->id){
            return redirect()->back();
        }
        return view('frontend.account.order.order_details', compact('order_details'));
    }
}
