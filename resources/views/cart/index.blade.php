@extends('layouts.main')

@section('content')

@php
$totalPrice = 0;
@endphp

@if (count($carts) > 0)
@foreach ($carts as $cart)
<div class="row g-0 mb-4">
    <div class="col-3">
        <img style="width: 100%; height: 500px; object-fit: cover;" src="{{ $cart->collection->photo }}" alt="Collection Image">
    </div>
    <div class="col-9" style="background-color: white;">
        <div style="display: flex;justify-content: flex-end;margin: 10px;">
            <form action="{{ route('cart.destroy', $cart->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-link" style="color: black;padding: 0;display: flex;justify-content: center;">Delete</button>
            </form>
        </div>
        <div style="margin-left:100px;margin-top:150px;">
            <h1>{{ $cart->collection->name }}</h1>
            <h5 style="font-weight: 400;">Rp. {{ number_format($cart->collection->price * $cart->quantity, 0, '.', ',') }}</h5>
            <div class="mt-4 d-flex">
                <form action="{{ route('cart.decrement', $cart->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="button-minus border bg-dark text-white icon-shape icon-sm mx-1 " data-field="quantity">-</button>
                </form>
                <input type="number" step="1" max="10" value="{{ $cart->quantity }}" name="quantity" class="quantity-field border-0 text-center">
                <form action="{{ route('cart.increment', $cart->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="button-plus border bg-dark text-white icon-shape icon-sm" data-field="quantity">+</button>
                </form>

            </div>
        </div>
    </div>
</div>

@php
$totalPrice += $cart->collection->price * $cart->quantity;
@endphp

@endforeach

<div class="row g-0">
    <div class="col-3">
    </div>
    <div class="col-9">
        <h3 style="font-weight: 500;"><strong>Total:</strong> Rp. {{ number_format($totalPrice, 0, '.', ',') }}</h3>
    </div>
</div>
<div style="display: flex;justify-content: flex-end; margin-bottom:100px">
    <button type="submit" class="btn btn-lg btn-dark" style="width:30%">CHECK OUT</button>
</div>
@else
<div style="display: flex;align-items: center;justify-content: center;">
    <p>Your cart is empty.</p>
</div>
@endif

@endsection