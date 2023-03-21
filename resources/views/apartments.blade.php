@extends('layouts.app')
@section('scss')
    @vite(['resources/js/apartments.js'])
@endsection
@section('content')
    <div class="container">
        <div class="mt-3">
            <h1>
                All Apartments :
            </h1>
        </div>
        <div class="row">
            @foreach ($apartments as $apartment)
                <div class="col-4">
                    <div class="card mt-5" style="width: 22rem; height: 30rem;">
                        <img src="{{ asset('storage/' . $apartment->cover_image) }}" class="card-img-top img-fluid"
                            style="height: 18rem;" alt="{{ $apartment->title }}">
                        <div class="card-body">
                            <p class="card-text">si trova a : {{ $apartment->address }}</p>
                            <p class="card-text">Numero di stanze:{{ $apartment->rooms }}
                            </p>
                            <p class="card-text">Numero di letti: {{ $apartment->beds }}</p>
                            <a href="{{ route('apartment.show', $apartment->slug) }}"
                                class="btn btn-success   btn-green">Show</a>


                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    {{ $apartments->links() }}
    </div>
@endsection
