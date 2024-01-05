<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



class loginController extends Controller
{
    public function index(){
        return view("auth.login");
    }
    public function store(Request $request){
        $request->validate([
            "email"=>"email|required",
            "password"=>"required"
        ]);
        if (auth()->attempt($request->only(["email","password"]))) {
           $request->session()->regenerate();
           return redirect()->route("dashboard");
        }
        return back()->withErrors([
            "email"=>"you credentials are wrong"
        ])->onlyInput("email");
    }
}
