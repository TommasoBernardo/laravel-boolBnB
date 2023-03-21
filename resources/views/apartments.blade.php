@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{route('apartments.index')}}" method="GET">
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
                        @foreach($services as $service)
                        <input type="checkbox" class="form-check-input" name="services[]" value="{{$service->id}}">
                        <label class="form-check-label"> {{$service->type}} </label>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-12 text-center">
                <button type="submit" class="btn btn-primary mt-3">cerca</button>
            </div>
        </div>
    </form>
    <div class="mt-3">
        <h1 class="text-success">
            All Apartments :
        </h1>
    </div>
    <div class="row">
        @foreach ($apartmentsIndex as $apartment)
        <div class="col-3">
            <div class="card mt-5" style="width: 18rem; height: 30rem;">
                <img src="{{ asset('storage/' . $apartment->cover_image) }}" class="card-img-top" style="height: 18rem;" alt="{{ $apartment->title }}">
                <div class="card-body">
                    <p class="card-text">si trova a : {{ $apartment->address }}</p>
                    <p class="card-text">Numero di stanze: {{ $apartment->rooms }}</p>
                    <p class="card-text">Numero di letti: {{ $apartment->beds }}</p>
                    <a href="#" class="btn btn-success">Show</a>


                    </p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
</div>
@endsection

@section('script')
@vite(['resources/js/searchFilter.js'])
@endsection