@extends('layouts.main')

@section('content')

<div class="row g-0">
    <div class="col-3">
        <img style="width: 100%; height: 500px; object-fit: cover;" src="https://images.unsplash.com/photo-1603400521630-9f2de124b33b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=3687&q=80" alt="Collection Image">
    </div>
    <div class="col-9" style="background-color: white;">
        <div style="display: flex;justify-content: flex-end;margin: 10px;">
            <button type="submit" class="btn btn-link" style="color: black;padding: 0;display: flex;justify-content: center;">Delete</button>
        </div>
        <div style="margin-left:100px;margin-top:150px;">
            <h1>Alea Long Dress</h1>
            <h5 style="font-weight: 400;">Rp. 2,900,000</h5>
            <div class="mt-4">
                <input type="button" value="-" class="button-minus border bg-dark text-white icon-shape icon-sm mx-1 " data-field="quantity">
                <input type="number" step="1" max="10" value="1" name="quantity" class="quantity-field border-0 text-center">
                <input type="button" value="+" class="button-plus border bg-dark text-white icon-shape icon-sm" data-field="quantity">
            </div>
        </div>
    </div>
</div>

<div class="row g-0" style="margin-top:70px;">
    <div class="col-3">
    </div>
    <div class="col-9">
        <h3 style="font-weight: 500;"><strong>Total:</strong> Rp. 2,900,000</h3>
    </div>
</div>
<div style="display: flex;justify-content: flex-end;">
    <button type="submit" class="btn btn-lg btn-dark" style="width:30%">CHECK OUT</button>
</div>

@endsection