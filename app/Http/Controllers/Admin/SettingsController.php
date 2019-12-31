<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class SettingsController extends Controller
{
    public function index(){
        return view('admin.settings');
    }
    public function updateProfile(Request $request){
        $this->validate($request,[
            'username'=>'required',
            'email'=>'required|email',
        ]);
//        $image=$request->file('image');
        $slug=Str::slug($request->name);
        $user=Admin::findOrFail(Auth::guard('admin')->id());
//        if(isset($image)) {
//            $currentdate = Carbon::now()->toDateString();
//            $imagename = $slug . '-' . $currentdate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
//            if (!Storage::disk('public')->exists('profile')) {
//                Storage::disk('public')->makeDirectory('profile');
//            }
//            if (Storage::disk('public')->exists('post/'.$user->image))
//                Storage::disk('public')->delete('post/'.$user->image);
//
//            $profile = Image::make($image)->resize(500, 500)->save($imagename, 90);
//            Storage::disk('public')->put('profile/' . $imagename, $profile);
//        }
//        else{
//            $imagename=$user->image;
//        }
        $user->name=$request->name;
        $user->email=$request->email;
//        $user->image=$imagename;
//        $user->about=$request->about;
        $user->save();
        Toastr::success('Profile Updated Successfully :)','Success');
        return redirect()->back();
    }
    public function updatePassword(Request $request){
        $this->validate($request,[
           'old_password'=>'required',
            'password'=>'required|confirmed',
        ]);
        $hashedPassword=Auth::guard('admin')->user()->password;
        if (Hash::check($request->old_password,$hashedPassword)){
            if (!Hash::check($request->password,$hashedPassword)){
                $user=Admin::find(Auth::guard('admin')->id());
                $user->password=Hash::make($request->password);
                $user->save();
                Toastr::success('Password changed Successfully','Success');
                Auth::guard('admin')->logout();
                return redirect()->back();
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
