<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $categories=Category::all();
//        $posts=Post::latest()->approved()->published()->take(6)->get();
//        $posts = Post::latest()->orderBy('created_at','desc')->paginate(6);
        $posts=Post::latest()->approved()->published()->paginate(6);
        return view('welcome',compact('posts','categories'));
    }
    public function notify()
    {
//        $categories=Category::all();
//        $notifications=auth()->user()->notifications;
        $notifications = auth()->user()->notifications()->orderBy('created_at','desc')->take(8)->get();
//        dd($notifications);
        auth()->user()->unreadNotifications->markAsRead();
        return view('notifications',compact('notifications'));
    }
}
