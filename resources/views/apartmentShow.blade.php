@extends('layouts.app')
@section('scss')
    @vite(['resources/js/show.js'])
@endsection
@section('content')
    <div class="container mt-5">
        <h1 class="fw-bold text-center mb-5">{{ $apartment->title }}</h1>
        <div class="row ">
            <div class="col-6">
                <div class="my-dimension">
                    <img src="{{ asset('storage/' . $apartment->cover_image) }}"
                        class=" img-fluid h-100 "alt="{{ $apartment->title }}">
                </div>
            </div>
            <div class="col-6 ">
                <div class="row ">
                    <div class="col-6 my-square"></div>
                    <div class="col-6 my-square top-right"></div>
                    <div class="col-6 my-square"></div>
                    <div class="col-6 my-square bottom-right "></div>
                </div>
            </div>
        </div>
        <div class="row justify-content-end mt-5">
            <div class="col-6">
                <h2 class="fw-bold mt-5">L'alloggio è situato a : {{ $apartment->address }}</h2>
            </div>
            <div class="col-6 d-flex justify-content-end">
                <div class="circle"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-6 text-secondary mb-3">
                <span class="ms-2">{{ $apartment->rooms }} camera/e </span>
                <span class="ms-2">{{ $apartment->beds }} letto/i </span>
                <span class="ms-2">{{ $apartment->bathrooms }} bagno/i</span>
                <span class="ms-2"> {{ $apartment->square_meters }} metri quadri</span>
            </div>
            <hr>
        </div>



    </div>
@endsection
