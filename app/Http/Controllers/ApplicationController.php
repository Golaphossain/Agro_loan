<?php

namespace App\Http\Controllers;

use App\Application;
use App\Category;
use App\Post;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ApplicationController extends Controller
{
    public function showForm($id)
    {
        $post=Post::where('id',$id)->approved()->published()->first();
//        $categories=Category::all();
        return view('appform',compact('post'));
    }
    public function processForm(Request $request,$id)
    {
        //validate
        //store
        //redirect
        $this->validate($request,[
//            'farmerName'=>'required',
//            'farmerType'=>'required',
            'landAmount'=>'required',
//            'nidNo'=>'required|max:11',
            'nidImage'=>'required|image|max:2048',
//            'phone'=>'required|max:13',
//            'district'=>'required',
            'address'=>'required',
            'nomineeName'=>'required',
            'nRelation'=>'required',
            'nAddress'=>'required',
            'nNid'=>'required|max:11',
            'nNidImage'=>'required|image|max:2048',
            'nomineeImage'=>'required|image|max:2048',

        ]);
        $nidImage=$request->file('nidImage');
        $nNidImage=$request->file('nNidImage');
        $nomineeImage=$request->file('nomineeImage');
        $slug=Str::slug($request->farmerName);
        if (isset($nidImage)) {
//            $currentdate = Carbon::now()->toDateString();
//            $imagename1 = $slug . '-' . $currentdate . '-' . uniqid() . '.' . $nidImage->getClientOriginalExtension();
//            $imagename2 = $slug . '-' . $currentdate . '-' . uniqid() . '.' . $nNidImage->getClientOriginalExtension();
//            $imagename3 = $slug . '-' . $currentdate . '-' . uniqid() . '.' . $nomineeImage->getClientOriginalExtension();
            $imagename1 = $slug . '-' . '-' . uniqid() . '.' . $nidImage->getClientOriginalExtension();
            $imagename2 = $slug . '-' . '-' . uniqid() . '.' . $nNidImage->getClientOriginalExtension();
            $imagename3 = $slug . '-' . '-' . uniqid() . '.' . $nomineeImage->getClientOriginalExtension();
            if (!Storage::disk('public')->exists('applicationForm')) {
                Storage::disk('public')->makeDirectory('applicationForm');
            }
            $applynidImage = Image::make($nidImage)->resize(200, 150)->save($imagename1, 90);
            $applynNidImage = Image::make($nNidImage)->resize(200, 150)->save($imagename2, 90);
            $applynomineeImage = Image::make($nomineeImage)->resize(200, 150)->save($imagename3, 90);
            Storage::disk('public')->put('applicationForm/' . $imagename1, $applynidImage);
            Storage::disk('public')->put('applicationForm/' . $imagename2, $applynNidImage);
            Storage::disk('public')->put('applicationForm/' . $imagename3, $applynomineeImage);
        } else {
            $imagename1 = 'default.png';
            $imagename2 = 'default.png';
            $imagename3 = 'default.png';
        }
        $application= new Application();
        $application->user_id=Auth::id();
        $application->post_id=$id;
        $application->farmerName=Auth::user()->name;
//        $application->farmerType=$request->farmerType;
        $application->landAmount=$request->landAmount;
        $application->nidNo=Auth::user()->national_id;
        $application->nidImage = $imagename1;
        $application->phone=Auth::user()->phone;
//        $application->district=$request->district;
        $application->address=$request->address;
        $application->nomineeName=$request->nomineeName;
        $application->nRelation=$request->nRelation;
        $application->nNid=$request->nNid;
        $application->nNidImage = $imagename2;
        $application->nomineeImage = $imagename3;
        $application->nAddress=$request->nAddress;
        $application->status='pending';
        $application->save();
        Toastr::success('Submitted Successfully :)','Success');
        return redirect()->route('home');
    }
    public function applyUpdate($id)
    {
//        $categories=Category::all();
        $application=Application::where('id',$id)->first();
//        return $application;
        return view('progress',compact('application'));

    }
}
