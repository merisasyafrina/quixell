@extends('layouts.main')

@section('content')

<h3>REGISTER</h3>
<p>Enter following details here</p>
<p>Hi, to provide a more secure and pleasant fashion experience we ask you to use a valid email address to register.
    <br>
    If you need help, feel free to get in touch with us at 1500123 or at customer@quixell.com.
</p>

<form action="/register" method="post">
    @csrf
    <div class="row gx-5">
        <div class="col">
            <div class="mb-3">
                <label for="first_name" class="form-label"><strong>*First Name</strong></label>
                <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" id="first_name" value="{{ old('first_name') }}" autofocus>
                @error('first_name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label"><strong>*E-mail</strong></label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email') }}" autofocus>
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label"><strong>*Password</strong></label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" autofocus>
                @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col">
            <div class="mb-3">
                <label for="last_name" class="form-label"><strong>*Last Name</strong></label>
                <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" id="last_name" value="{{ old('last_name') }}" autofocus>
                @error('last_name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <label for="gender" class="form-label"><strong>*Gender</strong></label>
            <div class="mt-1 mb-4">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="gender" value="male" required>
                    <label class="form-check-label" for="gender">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="gender" value="female" required>
                    <label class="form-check-label" for="gender">Female</label>
                </div>
            </div>

            <div class="mb-3">
                <label for="confirm_password" class="form-label"><strong>*Confirm Password</strong></label>
                <input type="password" name="password_confirmation" class="form-control @error('confirm_password') is-invalid @enderror" id="confirm_password" autofocus>
                @error('confirm_password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-dark">JOIN US</button>
            <a href="/login" class="btn btn-link" style="color: black;">Click here to log in</a>
        </div>
    </div>
</form>

@endsection