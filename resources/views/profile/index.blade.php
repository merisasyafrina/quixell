@extends('layouts.main')

@section('content')

<div>
    <h1>PROFILE</h1>
    <div class="row mt-4">
        <div class="col-4">
            <img style="width: 75%; height: 400px; object-fit: cover;" src="{{ $user->photo }}" alt="img_profile">
            <form action="/logout" method="post">
                @csrf
                <button type="submit" class="btn btn-link mt-2" style="color: black;padding: 0;display: flex;justify-content: center;width: 70%;"><strong>Log Out</strong></button>
            </form>
        </div>
        <div class="col-8">
            <form action="{{ route('profile.update') }}" method="post">
                @csrf
                @method('PUT')
                <div class="row gx-5">
                    <div class="col">
                        <div class="mb-3">
                            <label for="first_name" class="form-label"><strong>First Name</strong></label>
                            <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" id="first_name" value="{{ $user->first_name }}" autofocus>
                            @error('first_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label"><strong>E-mail</strong></label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ $user->email }}" autofocus>
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label"><strong>Password</strong></label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" autofocus>
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="file" class="form-label"><strong>Picture</strong></label>
                            <input type="file" class="form-control" aria-label="file example">
                            <div class="invalid-feedback">Example invalid form file feedback</div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="last_name" class="form-label"><strong>Last Name</strong></label>
                            <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" id="last_name" value="{{ $user->last_name }}" autofocus>
                            @error('last_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <label for="gender" class="form-label"><strong>Gender</strong></label>
                        <div class="mt-1 mb-4">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="gender_male" value="male" {{ $user->gender === 'male' ? 'checked' : '' }}>
                                <label class="form-check-label" for="gender_male">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="gender_female" value="female" {{ $user->gender === 'female' ? 'checked' : '' }}>
                                <label class="form-check-label" for="gender_female">Female</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="confirm_password" class="form-label"><strong>Confirm Password</strong></label>
                            <input type="password" name="password_confirmation" class="form-control @error('confirm_password') is-invalid @enderror" id="confirm_password" autofocus>
                            @error('confirm_password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div style="display:flex;justify-content:flex-end;margin-top:100px;">
                        <button type="submit" class="btn btn-lg btn-dark" style="width:20%;">SAVE</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



@endsection