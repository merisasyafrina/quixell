<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutUsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [IndexController::class, 'index'])->middleware('guest');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/home', [HomeController::class, 'index'])->middleware('auth');

Route::get('/collections', function () {
    return view('collections.index', [
        "title" => "Collections"
    ]);
})->middleware('auth');

Route::get('/cart', function () {
    return view('cart.index', [
        "title" => "Cart"
    ]);
})->middleware('auth');


Route::get('/aboutus', [AboutUsController::class, 'index'])->middleware('auth');

Route::get('/profile', function () {
    return view('profile.index', [
        "title" => "Profile"
    ]);
})->middleware('auth');
