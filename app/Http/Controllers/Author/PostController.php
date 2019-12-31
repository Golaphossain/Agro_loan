<?php

namespace App\Http\Controllers\Author;

use App\Category;
use App\Notifications\NewAuthorPost;
use App\Post;
use App\Tag;
use App\User;
use App\Organization;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Auth::guard('organization')->user()->posts()->get();
//        $posts =$id->posts()->latest()->get();
//        $posts=null;
        return view('author.post.index',compact('posts'));
    }


    public function create()
    {
        $categories=Category::all();
        $tags=Tag::all();
        return view('author.post.create',compact('categories','tags'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'image'=>'required',
            'tags'=>'required',
            'categories'=>'required',
            'body'=>'required',
            'loanSize'=>'required',
            'loanPeriod'=>'required',
            'interest_rate'=>'required',
            'installment_type'=>'required',
        ]);
        $image=$request->file('image');
        $slug=Str::slug($request->title);
            if (isset($image)) {
                $currentdate = Carbon::now()->toDateString();
                $imagename = $slug . '-' . $currentdate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
                if (!Storage::disk('public')->exists('post')) {
                    Storage::disk('public')->makeDirectory('post');
                }
                $postIamge = Image::make($image)->resize(200, 150)->save($imagename, 90);
                Storage::disk('public')->put('post/' . $imagename, $postIamge);
            } else {
                $imagename = 'default.png';
            }

        $post=new Post();
        $post->organization_id=Auth::guard('organization')->id();
        $post->title=$request->title;
//        $post->slug=$slug;
        $post->image = $imagename;
        $post->body=$request->body;
        $post->loanSize=$request->loanSize;
        $post->loanPeriod=$request->loanPeriod;
        $post->interest_rate=$request->interest_rate;
        $post->installment_type=$request->installment_type;
        if (isset($request->status)){
            $post->status=true;
        }
        else{
            $post->status=false;
        }
        $post->is_approved=true;
        $post->save();
        $post->categories()->attach($request->categories);
        $post->tags()->attach($request->tags);

//        $users=User::where('role_id','1')->get();
//        Notification::send($users,new NewAuthorPost($post));

        Toastr::success('Post Saved Successfully :)','Success');
        return redirect()->route('author.post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
//        return $post;
        if ($post->organization_id!=Auth::guard('organization')->id()){
            Toastr::error('You are not permitted to access this post','Error');
            return redirect()->back();
        }
        return view('author.post.show',compact('post'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if ($post->organization_id!=Auth::guard('organization')->id()){
            Toastr::error('You are not permitted to access this post','Error');
            return redirect()->back();
        }
        $categories=Category::all();
        $tags=Tag::all();
        return view('author.post.edit',compact('post','categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        if ($post->organization_id!=Auth::guard('organization')->id()){
            Toastr::error('You are not permitted to access this post','Error');
            return redirect()->back();
        }
        $this->validate($request,[
            'title'=>'required',
            'image'=>'required',
            'tags'=>'required',
            'categories'=>'required',
            'body'=>'required',
            'loanSize'=>'required',
            'loanPeriod'=>'required',
            'interest_rate'=>'required',
            'installment_type'=>'required',
        ]);
        $image=$request->file('image');
        $slug=Str::slug($request->title);
        if(isset($image)) {
            $currentdate = Carbon::now()->toDateString();
            $imagename = $slug . '-' . $currentdate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            if (!Storage::disk('public')->exists('post')) {
                Storage::disk('public')->makeDirectory('post');
            }
            if (Storage::disk('public')->exists('post/'.$post->image))
                Storage::disk('public')->delete('post/'.$post->image);

            $postIamge = Image::make($image)->resize(200, 150)->save($imagename, 90);
            Storage::disk('public')->put('post/' . $imagename, $postIamge);
        }
        else{
            $imagename=$post->image;
        }
        $post->organization_id=Auth::guard('organization')->id();
        $post->title=$request->title;
//        $post->slug=$slug;
        $post->image=$imagename;
        $post->body=$request->body;
        $post->loanSize=$request->loanSize;
        $post->loanPeriod=$request->loanPeriod;
        $post->interest_rate=$request->interest_rate;
        $post->installment_type=$request->installment_type;
        if (isset($request->status)){
            $post->status=true;
        }
        else{
            $post->status=false;
        }
        $post->is_approved=true;
        $post->save();
        $post->categories()->sync($request->categories);
        $post->tags()->sync($request->tags);
        Toastr::success('Post Updated Successfully :)','Success');
        return redirect()->route('author.post.index');
    }


    public function destroy(Post $post)
    {
        if ($post->organization_id !=Auth::guard('organization')->id()){
            Toastr::error('You are not permitted to access this post','Error');
            return redirect()->back();
        }
        if(Storage::disk('public')->exists('post/'.$post->image)){
            Storage::disk('public')->delete('post/'.$post->image);
        }
        $post->categories()->detach();
        $post->tags()->detach();
        $post->delete();
        Toastr::success('Post deleted successfully :)','Success');
        return redirect()->back();
    }
}
