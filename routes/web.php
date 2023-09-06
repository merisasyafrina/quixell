<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CollectionsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ProfileController;

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

Route::get('/collections', [CollectionsController::class, 'index'])->middleware('auth');
Route::get('/collections/{id}', [CollectionsController::class, 'show'])->middleware('auth')->name('collections.detail');

Route::get('/cart', [CartController::class, 'index'])->middleware('auth')->name('cart.index');
Route::delete('/cart/{id}', [CartController::class, 'destroy'])->middleware('auth')->name('cart.destroy');

Route::get('/aboutus', [AboutUsController::class, 'index'])->middleware('auth');

Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth');
Route::put('/profile', [ProfileController::class, 'update'])->middleware('auth');