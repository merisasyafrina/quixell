@extends('layouts.main')

@section('content')

<div class="row">
    <div class="col">
        <h3>SIGN IN</h3>
        <p>Welcome back! Sign in for faster checkout.</p>

        <form>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"><strong>*E-mail</strong></label>
                <input type="email" class="form-control" id="exampleFormControlInput1">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"><strong>*Password</strong></label>
                <input type="password" class="form-control" id="exampleFormControlInput1">
            </div>

            <div class="mb-3">
                <button type="button" class="btn btn-dark">SIGN IN</button>
                <a href="/register" class="btn btn-link">Click here to register</a>
            </div>
        </form>

    </div>
    <div class="col">
        <h3>NEW CUSTOMER</h3>
        <a href="/register" type="button" class="btn btn-light">Register</a>
    </div>
</div>

@endsection