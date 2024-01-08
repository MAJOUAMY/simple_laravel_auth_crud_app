<?php

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\auth\loginController;
use App\Http\Controllers\auth\RegisterController;

Route::get('/', function () {
    $products = Product::with('user')->get()->reverse();
    return view("welcome")->with("products", $products);
});

Route::get('/login', [loginController::class, "index"])->name("login");
Route::post('/login', [loginController::class, "store"]);

Route::get('/register', [RegisterController::class, "index"])->name("register");
Route::post('/register', [RegisterController::class, "store"]);

Route::post("/logout", [LogoutController::class, "store"]);

Route::get("/dashboard", [dashboardController::class, "index"])->name("dashboard");


Route::get("/products/{id}", [ProductController::class, "show"])->name("products.show");
Route::get("/products/edit/{id}", [ProductController::class, "edit"])->name("products.edit");
Route::post("/products/edit/{id}", [ProductController::class, "update"]);
Route::post("/products/delete/", [ProductController::class, "destroy"])->name("products.destroy");
Route::get("/create", [ProductController::class, "create"])->name("products.create");
Route::post("/create", [ProductController::class, "store"])->name("products.store");
