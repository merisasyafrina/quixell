@extends('layouts.main')

@section('content')

<div class="row gx-5">
    <div class="col">
        <h3>SIGN IN</h3>
        <p>Welcome back! Sign in for faster checkout.</p>

        <form action="/login" method="post">
            @csrf

            @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @if(session()->has('loginError'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('loginError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif


            <div class="mb-3">
                <label for="email" class="form-label"><strong>*E-mail</strong></label>
                <input type="email" name="email" class="form-control" id="email" autofocus required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label"><strong>*Password</strong></label>
                <input type="password" name="password" class="form-control" id="password" required>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-dark">SIGN IN</button>
                <a href="/register" class="btn btn-link" style="color: black;">Click here to register</a>
            </div>
        </form>

    </div>
    <div class="col login__newcust">
        <h3>NEW CUSTOMER</h3>
        <a href="/register" type="button" class="btn btn-light mt-4" style="border-color: black;">REGISTER</a>
    </div>
</div>

@endsection