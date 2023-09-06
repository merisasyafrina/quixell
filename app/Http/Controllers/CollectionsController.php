<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Collections;
use App\Models\Cart;

class CollectionsController extends Controller
{
    public function index()
    {
        $collections = Collections::paginate(8);

        return view('collections.index', [
            'title' => 'Collections',
            'collections' => $collections,
        ]);
    }

    public function show($id)
    {
        $collection = Collections::findOrFail($id);

        return view('collections.detail', [
            'title' => 'Collection Details',
            'collection' => $collection,
        ]);
    }

    public function addToBag(Request $request, $id)
    {
        $collection = Collections::findOrFail($id);

        $existingCart = Cart::where('user_id', auth()->user()->id)
            ->where('collection_id', $collection->id)
            ->first();

        if ($existingCart) {
            $existingCart->increment('quantity', 1);
            $existingCart->update(['total_price' => $existingCart->quantity * $collection->price]);
        } else {
            $cart = new Cart();
            $cart->user_id = auth()->user()->id;
            $cart->collection_id = $collection->id;
            $cart->quantity = 1;
            $cart->total_price = $collection->price;
            $cart->checkout_status = false;
            $cart->save();
        }

        // Redirect to the 'cart.index' route with a success message
        return redirect()->route('cart.index');
    }
}
