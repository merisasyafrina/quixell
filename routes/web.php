<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/login', function () {
    return view('auth.login', [
        "title" => "Login"
    ]);
});

Route::get('/register', function () {
    return view('auth.register', [
        "title" => "Register"
    ]);
});

Route::get('/home', function () {
    return view('home.index', [
        "title" => "Home"
    ]);
});

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
