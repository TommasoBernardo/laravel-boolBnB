@extends('layouts.app')
@section('scss')
    @vite(['resources/js/show.js'])
@endsection
@section('content')
    <div class="container mt-5">
        <h1 class="fw-bold text-center mb-5">{{ $apartment->title }}</h1>
        <div class="row ">
            <div class="col-lg-6 col-md-12 col-sm-12 border-md-0">
                <div class="my-dimension">
                    <img src="{{ asset('storage/' . $apartment->cover_image) }}"
                        class=" img-fluid my-img "alt="{{ $apartment->title }}">
                </div>
            </div>

            <div class="col-6 ">
                <div class="row ">
                    <div class="col-lg-6 my-square d-sm-none d-md-none d-lg-block "></div>
                    <div class="col-lg-6  my-square d-sm-none d-md-none top-right d-lg-block"></div>
                    <div class="col-lg-6 my-square d-sm-none d-md-none d-lg-block"></div>
                    <div class="col-lg-6   my-square bottom-right d-lg-block d-sm-none d-md-none "></div>
                </div>
            </div>
        </div>
        <div class="row justify-content-end mt-5">
            <div class="col-lg-6 col-md-9 col-sm-11">
                <h2 class="fw-bold mt-5">The apartment is located : {{ $apartment->address }}</h2>
            </div>
            <div class="col-lg-6 col-md-3 col-sm-1 d-flex justify-content-end">
                <div class="circle">
                    <img src="https://i.pravatar.cc/100" class="img-fluid my-users d-md-none d-sm-none d-lg-block"
                        alt="">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 col-sm-12 text-secondary mb-3">
                <span class="ms-2">{{ $apartment->rooms }} room/s </span>
                <span class="ms-2">{{ $apartment->beds }} bed/s </span>
                <span class="ms-2">{{ $apartment->bathrooms }} bathroom/s</span>
                <span class="ms-2"> {{ $apartment->square_meters }} square meters</span>
            </div>
            <hr>

            <div class="row">
                <div class="col-12 mb-3">
                    <h3 class="fw-bold">
                        services included:
                    </h3>
                </div>
            </div>
            <div class="row px-2">
                @foreach ($apartment->services as $service)
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 mb-3">
                        <span class="icon m-1 fs-4">
                            {!! $service->icon !!} &nbsp {{ $service->type }}
                        </span>
                    </div>
                @endforeach
                <hr>
            </div>
            <h3 class="fw-bold mt-5">
                Your position:
            </h3>
            <div class="row">
                <div class="col-12 mb-3">
                    <div class="my-maps"></div>
                </div>
            </div>
        </div>



    </div>
@endsection
