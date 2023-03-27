@extends('layouts.app')
@section('scss')
@vite(['resources/js/apartments.js'])
@endsection
@section('content')
<div class="container">
    <form action="{{ route('apartments.index') }}" id='formFilter' method="GET">
        <div class="row justify-content-center">
            <div class="col-6 mt-3 ">
                <div id="searchBox"></div>
                <p id="mexErrore" class="text-center text-danger fs-1 m-0 d-none">Selezionare una via dal menu a tendina</p>
                <div class="d-none">
                    <input type="text" id="latitude" name="latitude">
                    <input type="text" id="longitude" name="longitude">
                </div>
            </div>
            <div class="container">

            </div>
            <div class="row">
                <div class="col-12 mt-3">
                    <div class="row list-filter">
                        <div class="col-lg-4 col-md-6 col">
                            <div class="input-container">
                                <input placeholder="Filtra per numero di letti" class="input-field" type="text" name="beds" min="0">
                                <label for="input-field" class="input-label">Numero di letti</label>
                                <span class="input-highlight"></span>
                            </div>

                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="input-container">
                                <input placeholder="Filtra per numero di stanze" class="input-field" type="text" name="rooms" min="0">
                                <label for="input-field" class="input-label">Numero di stanze</label>
                                <span class="input-highlight"></span>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="input-container">
                                <select class="select-menu" name="distanceKm" id="distanceKm">
                                    <option value="" selected disabled>Filtra per distanza</option>
                                    <option value="2">2Km</option>
                                    <option value="4">4Km</option>
                                    <option value="6">6Km</option>
                                    <option value="8">8Km</option>
                                    <option value="10">10Km</option>
                                    <option value="20">20Km</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 d-flex justify-content-evenly flex-column">
                            <p class="fs-6 text-secondary"> Filtra per servizi</p>
                            <div class="services d-flex justify-content-around">
                                @foreach ($services as $service)
                                <input type="checkbox" class="form-check-input" name="services[]" value="{{ $service->id }}">
                                <label class="form-check-label mr-3"> {{ $service->type }} </label>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 text-center">
                <button type="submit" class="btn  mt-3 search-button">Search</button>
            </div>
        </div>

    </form>
    @if($apartmentsIndex->isEmpty())
    <div class="mt-3 text-center" style="height: 360px;">
        <h1 class="fw-bold">
            Non ci sono risultati per la tua ricerca
        </h1>
    </div>
    @endif
    <div class="row ">
        @foreach ($apartmentsIndex as $apartment)
        <div class="col-lg-4 col-md-6 col-sm-12 mb-3 justify-content-sm-center ">
            <div id="my-card" class="card mt-5" style=" height: 34rem;">
                <img src="{{ asset('storage/' . $apartment->cover_image) }}" class="card-img-top img-fluid fix-img" style="height: 18rem;" alt="{{ $apartment->title }}">
                <div class="card-body">
                    <p class="card-text lead"> {{ $apartment->address }}</p>
                    <p class="card-text my-title fw-bold"> {{ $apartment->title }}</p>

                    <p class="card-text"><strong>Rooms: </strong> {{ $apartment->rooms }}
                    </p>
                    <p class="card-text"><strong>Beds: </strong> {{ $apartment->beds }}</p>
                    <a href="{{ route('apartments.show', $apartment->slug) }}" class="btn placeholder-glow  btn-green" id="border">Show more </a>
                    </p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<div class="prev-next d-flex justify-content-center">
    {{ $apartmentsIndex->links() }}
</div>
@endsection

@section('script')
@vite(['resources/js/searchFilter.js'])
@endsection