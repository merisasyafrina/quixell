@extends('layouts.main')

@section('content')

<div class="container" style="margin-bottom: 80px;padding: unset;">
    <div class="row row-cols-2 row-cols-md-4 g-2 g-md-3">
        @foreach ($collections as $collection)
        <div class="col">
            <div class="p-3">
                <a href="/collections/{{ $collection->id }}" style="text-decoration: none; color: unset;">
                    <img style="width: 100%; height: 350px; object-fit: cover;" src="{{ $collection->photo }}" alt="Collection Image">
                    <div class="mt-3" style="display: flex; flex-direction: column; align-items: flex-start;">
                        <h6 style="margin: unset"><strong>{{ $collection->name }}</strong></h6>
                        <p style="margin: unset">Rp. {{ number_format($collection->price, 0, '.', ',') }}</p>
                    </div>
                </a>
            </div>
        </div>
        @endforeach
    </div>

    <div class="mt-3" style="display: flex; justify-content: center;">
        {{ $collections->links() }}
    </div>
</div>

@endsection