<?php

namespace App\Http\Controllers\Admin;

use App\Organization;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin',['except'=>['logout']]);
    }

   /** public function show()
    {
        return view('Auth.OrgRegister');
    }
    public function process(Request $request)
    {
        //return $request->only('image');
        //validate
        //store
        //redirect
        $this->validate($request,[
            'name'=>'required',
            'username'=>'required',
            'email'=>'required|email',
            'phone'=>'required|max:13',
            'swift_code'=>'required|max:11',
            'password'=>'required|min:8|confirmed',
            'image'=>'required|image',
        ]);
        $image=$request->file('image');
        $slug=Str::slug($request->username);
        if(isset($image)) {
            $currentdate = Carbon::now()->toDateString();
            $imagename = $slug . '-' . $currentdate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            if (!Storage::disk('public')->exists('author')) {
                Storage::disk('public')->makeDirectory('author');
            }
            $postIamge = Image::make($image)->resize(1600, 479)->save($imagename, 90);
            Storage::disk('public')->put('author/' . $imagename, $postIamge);
        }
        else{
            $imagename='default.png';
        }
    $organization=new Organization();
        $organization->name=$request->name;
        $organization->username=$request->username;
        $organization->email=$request->email;
        $organization->phone=$request->phone;
        $organization->swift_code=$request->swift_code;
        $organization->password=Hash::make($request->password);
        $organization->image=$imagename;
        $organization->save();
        return redirect()->route('author.dashboard');
    }**/
    public function logout()
    {
        Auth::guard('admin')->logout();
//        session()->flash('message','user has been logged out');
//        session()->flash('type','success');
        return redirect()->route('login');
    }
}
