<?php

namespace App\Http\Controllers\Author;

use App\Organization;
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
        return view('author.settings');
    }
    public function updateProfile(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'username'=>'required',
            'email'=>'required|email',
            'phone'=>'required|max:13',
//            'swift_code'=>'required|max:11',
            'image'=>'required|image',
        ]);
        $image=$request->file('image');
        $slug=Str::slug($request->name);
        $user=Organization::findOrFail(Auth::guard('organization')->id());
        if(isset($image)) {
            $currentdate = Carbon::now()->toDateString();
            $imagename = $slug . '-' . $currentdate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            if (!Storage::disk('public')->exists('profile')) {
                Storage::disk('public')->makeDirectory('profile');
            }
            if (Storage::disk('public')->exists('post/'.$user->image))
                Storage::disk('public')->delete('post/'.$user->image);

            $profile = Image::make($image)->resize(500, 500)->save($imagename, 90);
            Storage::disk('public')->put('profile/' . $imagename, $profile);
        }
        else{
            $imagename=$user->image;
        }
        $user->name=$request->name;
        $user->username=$request->username;
        $user->email=$request->email;
        $user->phone=$request->phone;
//        $user->swift_code=$request->swift_code;
        $user->image=$imagename;
//        $user->about=$request->about;
        $user->save();
        Toastr::success('Profile Updated Successfully :)','Success');
        return redirect()->back();
    }
    public function updatePassword(Request $request){
        $this->validate($request,[
            'old_password'=>'required',
            'password'=>'required|min:8|confirmed',
//            'password'=>'required|confirmed',
        ]);
        $hashedPassword=Auth::guard('organization')->user()->password;
        if (Hash::check($request->old_password,$hashedPassword)){
            if (!Hash::check($request->password,$hashedPassword)){
                $user=Organization::find(Auth::guard('organization')->id());
                $user->password=Hash::make($request->password);
                $user->save();
                Toastr::success('Password changed Successfully','Success');
                Auth::guard('organization')->logout();
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
