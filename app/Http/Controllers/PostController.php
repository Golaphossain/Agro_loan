<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    public function index(){
       $posts=Post::latest()->approved()->published()->paginate(2);
      return view('posts',compact('posts'));
    }
    public function details($id){
        $post=Post::where('id',$id)->approved()->published()->first();
        $blogKey='blog_'.$post->id;
        if(!Session::has($blogKey)){
        $post->increment('view_count');
        Session::put($blogKey,1);
        }
        $randomPost=Post::approved()->published()->take(3)->inRandomOrder()->get();
        $categories=Category::all();
        return view('post',compact('post','randomPost','categories'));
    }
    public function postByCategory($slug){
         $category=Category::where('slug',$slug)->first();
         $posts=$category->posts()->approved()->published()->get();
        return view('category_post',compact('category','posts'));
    }
}
