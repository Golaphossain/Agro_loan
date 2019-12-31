<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class registerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::guard('organization')->check()) {
            return redirect()->route('author.dashboard');
        }
        if(Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }
        if (Auth::check()){
            return redirect()->route('home');
        }
        return $next($request);
    }
}
