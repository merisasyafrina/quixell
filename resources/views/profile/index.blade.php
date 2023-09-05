@extends('layouts.main')

@section('content')

<h4>Profile</h4>

<form action="/logout" method="post">
    @csrf
    <button type="submit" class="btn btn-dark">LOGOUT</button>
</form>


@endsection