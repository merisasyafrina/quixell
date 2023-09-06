@extends('layouts.main')

@section('content')

<div class="row">
    <div class="col-7 d-flex flex-column justify-content-center align-items-center">
        <img style="width: 60%; height: 600px; object-fit: cover;" src="{{ $collection->photo }}" alt="Collection Image">
        <p class="mt-4">{{ $collection->description }}</p>
    </div>
    <div class="col-5" style="display: flex;flex-direction: column;justify-content: center;">
        <h1>{{ strtoupper($collection->name) }}</h1>
        <p>Rp. {{ number_format($collection->price, 0, '.', ',') }}</p>
        <form action="{{ route('collections.addToBag', ['id' => $collection->id]) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-lg btn-dark" style="width:100%">ADD TO BAG</button>
        </form>
    </div>
</div>

@endsection