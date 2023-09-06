@extends('layouts.main')

@section('content')

<h3>REGISTER</h3>
<p>Enter following details here</p>
<p>Hi, to provide a more secure and pleasant fashion experience we ask you to use a valid email address to register.
    <br>
    If you need help, feel free to get in touch with us at 1500123 or at customer@quixell.com.
</p>

<form action="">
    <div class="row gx-5">
        <div class="col">
            <div class="mb-3">
                <label for="firstname" class="form-label"><strong>*First Name</strong></label>
                <input type="firstname" name="firstname" class="form-control" id="firstname" autofocus required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label"><strong>*E-mail</strong></label>
                <input type="email" name="email" class="form-control" id="email" autofocus required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label"><strong>*Password</strong></label>
                <input type="password" name="password" class="form-control" id="password" autofocus required>
            </div>
        </div>
        <div class="col">
            <div class="mb-3">
                <label for="lastname" class="form-label"><strong>*Last Name</strong></label>
                <input type="lastname" name="lastname" class="form-control" id="lastname" autofocus required>
            </div>

            <label for="gender" class="form-label"><strong>*Gender</strong></label>
            <div class="mt-1 mb-4">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                    <label class="form-check-label" for="inlineRadio1">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                    <label class="form-check-label" for="inlineRadio2">Female</label>
                </div>
            </div>

            <div class="mb-3">
                <label for="confirmpassword" class="form-label"><strong>*Confirm Password</strong></label>
                <input type="confirmpassword" name="confirmpassword" class="form-control" id="confirmpassword" autofocus required>
            </div>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-dark">JOIN US</button>
            <a href="/login" class="btn btn-link" style="color: black;">Click here to log in</a>
        </div>
    </div>
</form>

@endsection