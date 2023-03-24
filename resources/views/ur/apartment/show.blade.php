@extends('layouts.app')
@section('scss')
@vite(['resources/js/show.js'])
@endsection
@section('content')
<div class="d-none">
    <input type="text" id="latitude" value="{{ $apartment->latitude }}">
    <input type="text" id="longitude" value="{{ $apartment->longitude }}">
</div>
@if (session('message'))
<div id="popup_message" class="d-none" data-type="{{ session('alert-type') }}" data-message="{{ session('message') }}"></div>
@endif

<div class="container img-container p-5 my-4 ">
    <h1 class="m-4 text-md-center">{{ $apartment->title }}</h1>
    <div class="row p-5">
        <div class="col-lg-6 col-md-12">
            <img src="{{ asset('storage/' . $apartment->cover_image) }}" class="card-img-top img-fluid" alt="{{ $apartment->title }}">
        </div>
        <div class="col-lg-6">
            <div class="row">
                <div class="col-sm-6">
                    <img src="{{ asset('storage/' . $apartment->cover_image) }}" class="card-img-top " alt="{{ $apartment->title }}">
                </div>
                <div class="col-sm-6">
                    <img src="{{ asset('storage/' . $apartment->cover_image) }}" class="card-img-top img-fluid" alt="{{ $apartment->title }}">
                </div>
                <div class="col-sm-6">
                    <img src="{{ asset('storage/' . $apartment->cover_image) }}" class="card-img-top img-fluid" alt="{{ $apartment->title }}">
                </div>
                <div class="col-sm-6">
                    <img src="{{ asset('storage/' . $apartment->cover_image) }}" class="card-img-top img-fluid" alt="{{ $apartment->title }}">

                </div>
            </div>
        </div>
    </div>
    <div class=" container info p-3">
        <div class="row px-2">
            <h3 class="my-2">Info appartamento</h3>
            <div class="col-lg-6  col-md-6 col-sm-12">
                <p>Numero di stanze: {{ $apartment->rooms }}</p>
                <p>Numero di letti: {{ $apartment->beds }}</p>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <p>Numero di bagni: {{ $apartment->bathrooms }}</p>
                <p>Dimensioni: {{ $apartment->square_meters }} mq</p>
            </div>
        </div>
    </div>
    <div class="services p-3 my-3">
        <div class="container">
            <div class="row px-2">
                <h3 class="my-2">Servizi offerti</h3>
                @foreach ($apartment->services as $service)
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <span class="icon m-1 fs-4">
                        {!! $service->icon !!} &nbsp {{ $service->type }}
                    </span>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="container location">
        <h3 class="d-inline-block my-3">Si trova in </h3>
        <div class="row">
            <div class="col-lg-12">
                <span class="fs-5"> {{ $apartment->address }}</span>
                <div class="map my-2" id="map">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
@vite(['resources/js/mapShow.js','resources/js/popupDelete.js'])
@endsection