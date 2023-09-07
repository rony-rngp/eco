<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function loginRegister()
    {
        if (Auth::check()){
            return redirect()->back();
        }
        return view('frontend.auth.login_register');
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'mobile' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->mobile = $request->mobile;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->token = md5($request->email.$request->name.$request->mobile);
        $user->status = 0;
        $user->save();

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'token' => md5($request->email.$request->name.$request->mobile),
        ];

        $email = $request->email;

        Mail::send('frontend.emails.confirm_email', $data, function ($messege) use ($email){
            $messege->to($email)->subject('Confirm your E-Mail Account');
        });

        //Redirect back with success messege
        notify()->success('Please confirm your email to active your account!', 'Success');
        return redirect()->back();
    }

    public function check_email(Request $request)
    {
        $email_count = User::where('email', $request->email)->count();
        if($email_count > 0){
            echo 'false';
        }else{
            echo 'true'; die();
        }
    }

    public function confirm_email($token)
    {
        $user_count = User::where('token', $token)->count();
        if($user_count > 0){
            //User email already activated or not
            $user_details = User::where('token', $token)->first();
            if($user_details->status == 1){
                notify()->error('Your account already activated. Please login here!', 'Error');
                return redirect()->route('login.register');
            }else{
                User::where('token', $token)->update(['status'=>1]);

                notify()->success('Your email is activated. You can login now..', 'Success');
                return redirect()->route('login.register');
            }
        }else{
            notify()->error('Something went to wrong!', 'Error');
            return redirect()->route('login.register');
        }
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'login_email'   => 'required|email',
            'login_password' => 'required'
        ]);

        if(Auth::attempt(['email'=> $request->login_email, 'password'=> $request->login_password], $request->remember)){
            //Check Email is activated or not
            $user_status = User::where('email', $request->login_email)->first();
            if($user_status->status == 0){
                Auth::logout();
                notify()->error('Your account is not activated yet! please confirm your email to activated!', 'Error');
                return redirect()->back();
            }
            $contents = Cart::content()->count();
            if($contents > 0){
                return redirect('/show-cart');
            }else{
                return redirect()->route('user.account');
            }

        }
        // if failed, redirect back with form data
        notify()->error('These credentials do not match our records.', 'Error');
        return redirect()->back()->withInput($request->only('login_email', 'remember'));
    }

    public function forget_password(Request $request)
    {
        if (Auth::check()){
            return redirect()->back();
        }

        if($request->isMethod('post')){
            $email = $request->email;
            $email_count = User::where('email', $email)->count();
            if ($email_count == 0){
                notify()->error('Email does not exists!', 'Error');
                return redirect()->back();
            }else{
                $user = User::where('email', $email)->first();
                $data = [
                    'name' => $user->name,
                    'email' => $user->email,
                    'token' => $user->token,
                ];

                $email = $user->email;

                Mail::send('frontend.emails.forgot_password', $data, function ($messege) use ($email){
                    $messege->to($email)->subject('Recover Your Password');
                });

                notify()->success('Please check your mail to reset your password!', 'Success');
                return redirect()->route('login.register');
            }
        }
        return view('frontend.auth.forget_password');
    }

    public function reset_password($token)
    {
        $user_count = User::where('token', $token)->count();
        if($user_count > 0){
            $user_details = User::where('token', $token)->first();

            if($user_details->status == 1){
                return view('frontend.auth.new_password', compact('token'));
            }else{
                notify()->error('Your account is not verified. Please verify your account first..', 'Error');
                return redirect()->route('login.register');
            }
        }else{
            notify()->error('Something went to wrong!', 'Error');
            return redirect()->route('login.register');
        }
    }

    public function reset_password_update(Request $request, $token)
    {
        $this->validate($request, [
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $user = User::where('token', $token)->first();
        $user->password = Hash::make($request->password);
        $user->save();

        notify()->success('Password Reset Successfully', 'Success');
        return redirect()->route('login.register');
    }

    public function logout()
    {
        Auth::logout();
        Cart::destroy();
        Session::forget('coupon_amount');
        Session::forget('coupon_code');
        Session::forget('grand_total');
        return redirect('/');
    }
}
