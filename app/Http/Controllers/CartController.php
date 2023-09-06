<?php

namespace App\Http\Controllers;

use App\Models\Cart;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::all();

        return view('cart.index', [
            'title' => 'Cart',
            'carts' => $carts,
        ]);
    }
}
