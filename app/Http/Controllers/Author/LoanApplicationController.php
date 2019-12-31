<?php

namespace App\Http\Controllers\Author;

use App\Application;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LoanApplicationController extends Controller
{
   public function index()
   {
       $posts=Auth::guard('organization')->user()->posts()->get();
       return view('author.applicationIndex',compact('posts'));
   }
   public function details($id)
   {
//       return $id;
//       $application=$id;
       $application=Application::where('id',$id)->first();
//       return $application;
       return view('author.applicationDetails',compact('application'));
   }
   public function delete($id)
   {
       $application=Application::where('id',$id)->first();
       if(Storage::disk('public')->exists('applicationForm/'.$application->nidImage)){
           Storage::disk('public')->delete('applicationForm/'.$application->nidImage);
       }
       if(Storage::disk('public')->exists('applicationForm/'.$application->nNidImage)){
           Storage::disk('public')->delete('applicationForm/'.$application->nNidImage);
       }
       if(Storage::disk('public')->exists('applicationForm/'.$application->nomineeImage)){
           Storage::disk('public')->delete('applicationForm/'.$application->nomineeImage);
       }

       $application->delete();
       Toastr::success('Form delete successfully :)','Success');
       return redirect()->back();
   }
}
