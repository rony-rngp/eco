<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
           'email' => 'required|unique:subscribers',
        ]);

        $subscriber = new Subscriber();
        $subscriber->email = $request->email;
        $subscriber->status = 1;
        $subscriber->save();
        notify()->success('You are added to our subscriber list!', 'Success');
        return redirect()->back();
    }

    public function check_subscriber(Request $request)
    {
        $email_count = Subscriber::where('email', $request->email)->count();
        if($email_count > 0){
            echo 'false';
        }else{
            echo 'true'; die();
        }
    }
}
