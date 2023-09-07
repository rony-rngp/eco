<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function subscriber()
    {
        $subscribers = Subscriber::latest()->get();
        return view('backend.subscriber.subscriber', compact('subscribers'));
    }

    public function status(Request $request)
    {
        $subscriber = Subscriber::find($request->id);
        $subscriber->status = $request->status;
        $subscriber->save();
        return response()->json(['messege' => 'success']);
    }

    public function destroy($id)
    {
        $brand = Subscriber::find($id);
        $brand->delete();
        notify()->success('Subscriber Deleted', 'Success');
        return redirect()->back();
    }
}
