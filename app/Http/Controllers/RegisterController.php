<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Organization;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class RegisterController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public  function show()
    {
        return view('Auth.register');
    }

    public function process(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'email' => 'required|unique:users,email',
            'phone'=>'required|max:13|unique:users',
            'national_id'=>'required|max:11|unique:users',
            'password'=>'required|min:8|confirmed',
            'image'=>'required|image',
        ]);
        $image=$request->file('image');
        $slug=Str::slug($request->name);
        if(isset($image)) {
            $currentdate = Carbon::now()->toDateString();
            $imagename = $slug . '-' . $currentdate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            if (!Storage::disk('public')->exists('profile')) {
                Storage::disk('public')->makeDirectory('profile');
            }
            $postIamge = Image::make($image)->save($imagename, 90);
            Storage::disk('public')->put('profile/' . $imagename, $postIamge);
        }
        else{
            $imagename='default.png';
        }
        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->phone=$request->phone;
        $user->national_id=$request->national_id;
        $user->password=Hash::make($request->password);
        $user->image=$imagename;
        $user->save();
        return redirect()->route('login');
    }
    public function logout()
    {
        Auth::logout();
//        session()->flash('message','user has been logged out');
//        session()->flash('type','success');
        return redirect()->route('login');
    }
}
