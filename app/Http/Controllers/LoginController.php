<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public  function show()
    {
        return view('Auth.login');
    }
    public function process(Request $request)
    {
        $credentials = $request->only('email','password');

        if (Auth::guard('organization')->attempt($credentials)) {

            return redirect()->route('author.dashboard');
        }

        if (Auth::guard('admin')->attempt($credentials)){
            return redirect()->route('admin.dashboard');
        }
        if (Auth::attempt($credentials)) {

        return redirect()->route('home');
    }
    }
    public function logout()
    {
        Auth::logout();
//        session()->flash('message','user has been logged out');
//        session()->flash('type','success');
        return redirect()->route('login');
    }

}
