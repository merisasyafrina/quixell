<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HomeController;

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

Route::get('/', function () {
    return view('index', [
        "title" => "Home No Auth"
    ]);
});

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/register', [RegisterController::class, 'index']);

Route::get('/home', [HomeController::class, 'index']);

Route::get('/collections', function () {
    return view('collections.index', [
        "title" => "Collections"
    ]);
});

Route::get('/cart', function () {
    return view('cart.index', [
        "title" => "Cart"
    ]);
});

Route::get('/aboutus', function () {
    return view('aboutus.index', [
        "title" => "About Us"
    ]);
});

Route::get('/profile', function () {
    return view('profile.index', [
        "title" => "Profile"
    ]);
});
