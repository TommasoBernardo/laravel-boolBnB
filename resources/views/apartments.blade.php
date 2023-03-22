@extends('layouts.app')
@section('scss')
    @vite(['resources/js/apartments.js'])
@endsection
@section('content')
    <div class="container">
        <form action="{{ route('apartments.index') }}" method="GET">
            <div class="row">
                <div class="col-6 mt-3">
                    <label for="searchBox">Indirizzo:</label>
                    <div id="searchBox"></div>
                    <div class="d-none">
                        <input type="text" id="address" name="address">
                        <input type="text" id="latitude" name="latitude">
                        <input type="text" id="longitude" name="longitude">
                    </div>
                </div>
                <div class="col-6 mt-3">
                    <div class="row">
                        <div class="col-6">
                            <label for="rooms">Numero stanze:</label>
                            <input type="number" name="rooms" id="rooms">
                        </div>
                        <div class="col-6">
                            <label for="beds">Numero letti:</label>
                            <input type="number" name="beds" id="beds">
                        </div>
                        <div class="col-6">
                            <label for="distanceKm">Inserisci distanza in Km:</label>
                            <select name="distanceKm" id="distanceKm">
                                <option value="20">20Km</option>
                                <option value="40">40Km</option>
                                <option value="60">60Km</option>
                                <option value="80">80Km</option>
                                <option value="100">100Km</option>
                            </select>
                        </div>
                        <div class="col-6">
                            @foreach ($services as $service)
                                <input type="checkbox" class="form-check-input" name="services[]"
                                    value="{{ $service->id }}">
                                <label class="form-check-label"> {{ $service->type }} </label>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-primary mt-3">search</button>
                </div>
            </div>
        </form>
        <div class="mt-3 text-center">
            <h1 class="fw-bold">
                All Apartments
            </h1>
        </div>
        <div class="row ">
            @foreach ($apartmentsIndex as $apartment)
                <div class="col-lg-4 col-md-6 col-sm-12 mb-3 justify-content-sm-center ">
                    <div id="my-card" class="card mt-5" style=" height: 34rem;">
                        <img src="{{ asset('storage/' . $apartment->cover_image) }}" class="card-img-top img-fluid "
                            style="height: 18rem;" alt="{{ $apartment->title }}">
                        <div class="card-body">
                            <p class="card-text"> {{ $apartment->address }}</p>
                            <p class="card-text my-title fw-bold"> {{ $apartment->title }}</p>

                            <p class="card-text">{{ $apartment->rooms }} : rooms
                            </p>
                            <p class="card-text"> {{ $apartment->beds }} : beds</p>
                            <a href="{{ route('apartments.show', $apartment->slug) }}"
                                class="btn placeholder-glow  btn-green" id="border">Show more </a>


                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    {{ $apartmentsIndex->links() }}
    </div>
@endsection

@section('script')
    @vite(['resources/js/searchFilter.js'])
@endsection
