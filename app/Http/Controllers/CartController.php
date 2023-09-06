<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Cart;


class CartController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $carts = $user->carts->where('checkout_status', false);

        return view('cart.index', [
            'title' => 'Cart',
            'carts' => $carts,
        ]);
    }

    public function destroy($id)
    {
        $cart = Cart::find($id);

        if (!$cart) {
            return redirect()->route('cart.index')->with('error', 'Cart item not found.');
        }

        if ($cart->user_id !== auth()->user()->id) {
            return redirect()->route('cart.index')->with('error', 'You do not have permission to delete this cart item.');
        }

        $cart->delete();

        return redirect()->route('cart.index')->with('success', 'Cart item deleted successfully.');
    }
}
