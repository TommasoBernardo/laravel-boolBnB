@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card" style="width: 18rem;">
            <img src="{{ asset('storage/' . $apartment->cover_image) }}" class="card-img-top" alt="{{ $apartment->title }}">
            <div class="card-body">
                <h5 class="card-title">{{ $apartment->title }}</h5>
                <p class="card-text">Si trova in: {{ $apartment->address }}</p>
                <p class="card-text">Numero di stanze: {{ $apartment->rooms }}</p>
                <p class="card-text">Numero di letti: {{ $apartment->beds }}</p>
                <p class="card-text">Numero di bagni: {{ $apartment->bathrooms }}</p>
                <p class="card-text">Servizi disponibili:
                    @foreach ($apartment->services as $service)
                        {{ $service->type }}
                    @endforeach
                </p>
                <p class="card-text">Dimensioni: {{ $apartment->square_meters }}</p>
                <a href="#" class="btn btn-primary">Entra</a>
            </div>
        </div>
    </div>
@endsection
