@extends('layouts.app')
@section('scss')
@vite(['resources/js/apartments.js'])
@endsection
@section('content')
<div class="container">
    <form action="{{ route('apartments.index') }}" id='formFilter' method="GET">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6 mt-3 ">
                <div id="searchBox"></div>
                <p id="mexErrore" class="text-center text-danger fs-5 m-0 d-none">Please select a street from the drop
                    down menu
                </p>
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
                                <input placeholder="Filter by number of beds" class="input-field" type="text" name="beds" min="0" id="beds">
                                <label for="input-field" class="input-label">Number of beds</label>
                                <span class="input-highlight"></span>
                            </div>

                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="input-container">
                                <input placeholder="Filter by number of rooms" class="input-field" type="text" name="rooms" min="0" id="rooms">
                                <label for="input-field" class="input-label">Number of rooms</label>
                                <span class="input-highlight"></span>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="input-container">
                                <select class="select-menu" name="distanceKm" id="distanceKm">
                                    <option value="" selected disabled>Filter by distance</option>
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
                            <p class="fs-6 text-secondary"> Filter by services</p>
                            <div class="services d-flex justify-content-around">
                                <div class="row">
                                    @foreach ($services as $service)
                                    <div class=" col-lg-2 col-8 col-md-4 col-sm-6 ">
                                        <input type="checkbox" class="form-check-input myCheckbox" name="services[]" value="{{ $service->id }}">
                                        <label class="form-check-label mr-3"> {{ $service->type }} </label>
                                    </div>
                                    @endforeach
                                </div>
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
    @if ($apartments->isEmpty())
    <div class="mt-3 text-center" style="height: 360px;">
        <h1 class="fw-bold">There are no results for your search</h1>
    </div>
    @endif
    <div class="row ">
        @foreach ($apartments as $apartment)
        <div class="col-lg-4 col-md-6 col-sm-12 mb-3 justify-content-sm-center ">
            <div id="my-card" class="card mt-5" style=" height: 35rem;">
                <img src="{{ asset('storage/' . $apartment->cover_image) }}" class="card-img-top img-fluid fix-img" style="height: 18rem;" alt="{{ $apartment->title }}">
                <div class="card-body">
                    <div class="" style=" height: 6rem;">
                        <h5 class="card-text my-title fw-bold"> {{ $apartment->title }}</h5>
                        <p class="card-text lead"> {{ $apartment->address }}</p>
                    </div>
                    <div class="d-flex mb-4">
                        <p class="card-text me-3">{{ $apartment->rooms }} <i class="fa-solid fa-house" style="color: #005555 "></i> </p>
                        <p class="card-text"> {{ $apartment->beds }} <i class="fa-solid fa-bed" style="color: #005555 "></i> </p>
                        @if(isset($apartment->distance))<p class="card-text ms-3"> Distance: {{$apartment->distance}} Km </p>@endif
                    </div>
                    <div class=" d-flex justify-content-center div-button-icon">
                        <a href="{{ route('apartments.show', $apartment->slug) }}" class="btn placeholder-glow  btn-green" id="border" style="padding: .5rem 1.5rem">Show more details </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<div class="prev-next d-flex justify-content-center">
    {{ $apartments->links() }}
</div>
@endsection

@section('script')
@vite(['resources/js/searchFilter.js'])
@endsection