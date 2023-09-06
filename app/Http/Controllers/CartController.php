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

    public function incrementQuantity($id)
    {
        $cartItem = Cart::find($id);

        if ($cartItem) {
            $cartItem->increment('quantity');
        }

        return redirect()->route('cart.index');
    }

    public function decrementQuantity($id)
    {
        $cartItem = Cart::find($id);

        if ($cartItem && $cartItem->quantity > 1) {
            $cartItem->decrement('quantity');
        }

        return redirect()->route('cart.index');
    }

    public function checkout()
    {
        $user = Auth::user();

        // Get all the user's carts
        $carts = $user->carts;

        // Loop through the carts and update checkout_status
        foreach ($carts as $cart) {
            $cart->update(['checkout_status' => true]);
        }

        // Flash a success message to the session
        session()->flash('success', 'Checkout successful.');

        // Redirect to the cart index
        return redirect()->route('cart.index');
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
