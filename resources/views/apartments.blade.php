@extends('layouts.app')
@section('scss')
    @vite(['resources/js/apartments.js'])
@endsection
@section('content')
    <div class="container">
        <div class="mt-3 text-center">
            <h1 class="fw-bold">
                All Apartments
            </h1>
        </div>
        <div class="row ">
            @foreach ($apartments as $apartment)
                <div class="col-lg-4 col-md-6 col-sm-12 mb-3 justify-content-sm-center ">
                    <div id="my-card" class="card mt-5" style=" height: 34rem;">
                        <img src="{{ asset('storage/' . $apartment->cover_image) }}" class="card-img-top img-fluid "
                            style="height: 18rem;" alt="{{ $apartment->title }}">
                        <div class="card-body">
                            <p class="card-text"> {{ $apartment->address }}</p>
                            <p class="card-text my-title fw-bold"> {{ $apartment->title }}</p>

                            <p class="card-text">{{ $apartment->rooms }} : stanze
                            </p>
                            <p class="card-text"> {{ $apartment->beds }} : letti</p>
                            <a href="{{ route('apartment.show', $apartment->slug) }}"
                                class="btn placeholder-glow  btn-green" id="border">Show more </a>


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
