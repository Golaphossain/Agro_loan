<?php

namespace App\Http\Controllers\Author;

use App\Organization;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function index()
    {
//        $banks=Organization::all();
        $user=Auth::guard('organization')->user();
        $offers=$user->posts;
        $total_pending_offers = $offers->where('is_approved',false)->count();
        $all_views = $offers->sum('view_count');
        return view('author.dashboard',compact('offers','total_pending_offers','all_views'));
    }
}
