@extends('layouts.app')
@section('scss')
    @vite(['resources/js/show.js'])
@endsection
@section('content')
    <div class="container img-container p-5 my-4 ">
        <div class="container carousel">
            <div class="row">
                <h1 class="m-4 text-md-center">{{ $apartment->title }}</h1>
                <div class="col-lg-6 d-flex justify-content-center">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                                aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ asset('storage/' . $apartment->cover_image) }}" class="card-img-top "
                                    alt="{{ $apartment->title }}">
                            </div>
                            {{-- <div class="carousel-item">
                                <img src="{{ asset('storage/' . $apartment->cover_image) }}" class="card-img-top "
                                    alt="{{ $apartment->title }}">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('storage/' . $apartment->cover_image) }}" class="card-img-top "
                                    alt="{{ $apartment->title }}">
                            </div> --}}
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mt-sm-4">
                    <h3 class="my-2">Info appartamento</h3>
                    <p>Numero di stanze: {{ $apartment->rooms }}</p>
                    <p>Numero di letti: {{ $apartment->beds }}</p>
                    <p>Numero di bagni: {{ $apartment->bathrooms }}</p>
                    <p>Dimensioni: {{ $apartment->square_meters }} mq</p>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mt-sm-4">
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
                    <span class="fs-5">Via {{ $apartment->address }}</span>
                    <div class="map my-2">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
