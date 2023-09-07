<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Order;
use App\Model\OrderLog;
use App\Model\OrderStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function order()
    {
        $orders = Order::with('order_products')->latest()->get();
        return view('backend.order.order', compact('orders'));
    }

    public function order_details($id)
    {
        $order_details = Order::with('order_products','user')->where('id', $id)->first();
        $order_statuses = OrderStatus::all();
        $order_logs = OrderLog::where('order_id', $id)->get();
        return view('backend.order.order_details', compact('order_details', 'order_statuses', 'order_logs'));
    }

    public function order_invoice($id)
    {
        $order_details = Order::with('order_products','user')->where('id', $id)->firstOrFail();
        return view('backend.order.order_invoice', compact('order_details'));
    }

    public function update_status(Request $request, $id)
    {
        if($request->order_status == ''){
            notify()->error('Filed Must Not be Empty :(', 'Error');
            return redirect()->back();
        }

        Order::where('id', $id)->update(['order_status' => $request->order_status]);

        //---Update courier name and tracking number
        if(!empty($request->courier_name) && !empty($request->tracking_number)){
            Order::where('id', $id)->update(['courier_name' => $request->courier_name, 'tracking_number'=> $request->tracking_number ]);
        }

        //---Update Order log--
        $log = new OrderLog();
        $log->order_id = $id;
        $log->order_status = $request->order_status;
        $log->save();

        //--Send Email
        $order_details = Order::with('order_products', 'user')->where('id', $id)->first();
        $email = $order_details->email;
        $data = [
            'name' => $order_details->user->name,
            'email' => $email,
            'courier_name' => $request->courier_name,
            'tracking_number' => $request->tracking_number,
            'order_details' => $order_details,
        ];
        Mail::send('backend.emails.order_status', $data, function ($messege) use ($email){
            $messege->to($email)->subject('Order Status Updated - Flipmart');
        });

        notify()->success('Status Updated :(', 'Success');
        return redirect()->back();
    }
}
