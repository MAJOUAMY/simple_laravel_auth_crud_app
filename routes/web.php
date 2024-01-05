<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\auth\loginController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\dashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', [loginController::class,"index"])->name("login");
Route::post('/login', [loginController::class,"store"]);



Route::get('/register', [RegisterController::class,"index"])->name("register");
Route::post('/register', [RegisterController::class,"store"]);


Route::post("/logout",[LogoutController::class,"store"]);

Route::get("/dashboard",[dashboardController::class, "index"])->name("dashboard");


Route::controller(ProductController::class)->group(function () {
    Route::get("/products/{id}", "show")->name("products.show");
    Route::get("/create", "create")->name("products.create");   
    Route::post("/create", "store")->name("products.store");    // Change route name to "products.store"
});




