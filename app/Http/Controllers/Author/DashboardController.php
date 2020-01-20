<?php

namespace App\Http\Controllers\Author;

use App\Organization;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function index()
    {
//        $banks=Organization::all();
//        $user=Auth::guard('organization')->user();
//        $offers=$user->posts;
//        $total_pending_offers = $offers->where('is_approved',false)->count();
//        $all_views = $offers->sum('view_count');
        //
//        $organization_id=Auth::guard('organization')->id();
//        $posts=Post::where('organization_id',$organization_id)->paginate(1);
////        $users = User::where('votes', '>', 100)->paginate(15);
        $posts=Auth::guard('organization')->user()->posts()->get();
        return view('author.dashboard',compact('posts'));
    }
}
