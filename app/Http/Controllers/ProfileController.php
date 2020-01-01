<?php

namespace App\Http\Controllers;

use App\Application;
use App\Category;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function profile()
    {
        $categories=Category::all();
//        return view('profile',compact('categories'));
        return view('profileBest',compact('categories'));
    }
    public function appFormlist()
    {
        $categories=Category::all();
        $applications=Auth::user()->applications()->get();
//        $user_id=Auth::id();
//        $applications=Application::Where('user_id',$user_id)->get()->all();
//        return $applications;
        return view('appList',compact('categories','applications'));
    }
    public function password(){
        $categories=Category::all();
        return view('password',compact('categories'));
    }
    public function updatePassword(Request $request)
    {
        $this->validate($request,[
            'old_password'=>'required',
            'password'=>'required|min:8|confirmed',
        ]);
        $hashedPassword=Auth::user()->getAuthPassword();
        if (Hash::check($request->old_password,$hashedPassword)){
            if (!Hash::check($request->password,$hashedPassword)){
                $user=User::find(Auth::id());
                $user->password=Hash::make($request->password);
                $user->save();
                Toastr::success('Password changed Successfully','Success');
//                Auth::logout();
                return redirect()->back();
//                return redirect()->route('login');
            }
            else{
                Toastr::error('Password cannot be same as old password','Error');
                return redirect()->back();
            }
        }
        else{
            Toastr::error('Your password does not match','Error');
            return redirect()->back();
        }
    }
}
