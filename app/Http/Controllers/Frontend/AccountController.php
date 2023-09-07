<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function account()
    {
        $user = Auth::user();
        return view('frontend.account.account_details', compact('user'));
    }

    public function edit_profile()
    {
        $user = Auth::user();
        $countries = DB::table('countries')->get();
        return view('frontend.account.edit_profile', compact('user','countries'));
    }

    public function update_profile(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'mobile' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        ]);

        $user = User::where('id', Auth::user()->id)->first();
        $user->name = $request->name;
        $user->address = $request->address;
        $user->city = $request->city;
        $user->state = $request->state;
        $user->country = $request->country;
        $user->zip_code = $request->zip_code;
        $user->mobile = $request->mobile;
        $user->save();

        notify()->success('Profile Updated', 'Success');
        return redirect()->back();
    }

    public function change_password()
    {
        return view('frontend.account.change_password');
    }

    public function check_current_password(Request $request)
    {
        if (Hash::check($request->current_password, Auth::user()->password)){
            echo 'true';
        }else{
            echo  'false';die();
        }
    }

    public function update_password(Request $request)
    {
        $this->validate($request, [
            'current_password' => 'required',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => 'required',
        ]);

        if (Hash::check($request->current_password, Auth::user()->password)){
            //check new and old password is matching
            if (!Hash::check($request->password_confirmation, Auth::user()->password)) {
                $user = User::find(Auth::user()->id);
                $user->password = Hash::make($request->password_confirmation);
                $user->save();
                notify()->success('Password Updated', 'Success');
                return redirect()->route('user.account');
            }else{
                notify()->error('Sorry ! New password can not be same as old password (:', 'Error');
                return redirect()->back();
            }
        }else{
            notify()->error('Current password is wrong!', 'Error');
            return redirect()->back();
        }
    }
}
