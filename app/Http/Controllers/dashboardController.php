<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class dashboardController extends Controller
{
    public function index(){
            
            if (Auth::check()) {
                $products = Product::with('user')->get()->reverse();
                return view("dashboard")->with("products",$products );
            }
            return redirect()->route("login")->withErrors([
                "email"=>"you credentials are wrong"
            ])->onlyInput("email");
           
       
    }
}
