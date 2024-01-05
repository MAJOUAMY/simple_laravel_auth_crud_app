<?php

namespace App\Http\Controllers\Auth; // Corrected namespace to follow PSR-4 conventions

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view("auth.register");
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            "username" => "required",
            "email" => "email|required",
            "password" => "confirmed|required"
        ]);

        User::create([
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

    
        return redirect()->back()->with("success", "Registered successfully");
    }
}
