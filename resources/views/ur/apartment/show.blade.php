@extends('layouts.app')
@section('scss')
@vite(['resources/js/show.js'])
@endsection

@section('content')
@if (session('message'))
<div id="popup_message" class="d-none" data-type="{{ session('alert-type') }}" data-message="{{ session('message') }}">
</div>
@endif
<div class="d-none">
    <input type="text" id="latitude" value="{{ $apartment->latitude }}">
    <input type="text" id="longitude" value="{{ $apartment->longitude }}">
</div>
{{-- Return Arrow --}}
<div class="container-fluid return-arrow sticky-lg-top sticky-md-top sticky-sm-top mt-3 ">
    <div class="row">
        <div class="col-2">
            <div class="wrapper-return-arrow position-absolute">
                <a href="{{ route('apartment.index') }}" class="btn fw-bold  ms-2" style="padding: .6rem 1.2rem; font-size: 1.1rem ">
                    <i class="fa-solid fa-arrow-left fs-1 mt-2" style="color: #125655;"></i> </a>
            </div>
        </div>
    </div>
</div>
{{-- Slider --}}
<div class="container img-container">
    <h1 class="m-4 text-md-center text-sm-center">{{ $apartment->title }}</h1>
    <div style="--swiper-navigation-color: #ffffff; --swiper-pagination-color: #fff" class="swiper mySwiper2">
        <div class="swiper-wrapper">
            <!-- Slides -->
            <div class="swiper-slide">
                <img src="{{ asset('storage/' . $apartment->cover_image) }}" class="card-img-top img-fluid" alt="{{ $apartment->title }}">
            </div>
            @foreach ($apartment->images as $image)
            <div class="swiper-slide">
                <img src="{{ asset('storage/' . $image->path) }}" class="card-img-top img-fluid" alt="{{ $apartment->title }}">
            </div>
            @endforeach
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
    <div class="swiper-thumb mySwiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="{{ asset('storage/' . $apartment->cover_image) }}" class="card-img-top img-fluid" alt="{{ $apartment->title }}">
            </div>
            @foreach ($apartment->images as $image)
            <div class="swiper-slide">
                <img src="{{ asset('storage/' . $image->path) }}" class="card-img-top img-fluid" alt="{{ $apartment->title }}">
            </div>
            @endforeach
        </div>
    </div>
</div>
<div class="container info-wrapper d-flex mt-5">
    <div class=" container info">
        <div class="row  mt-md-0">
            <h3 class="my-2">Apartment information</h3>
            <div class="col-lg-6 col-md-12 col-sm-12 fs-5">
                <p class="m-0">Numero di stanze: {{ $apartment->rooms }}</p>
                <p>Numero di letti: {{ $apartment->beds }}</p>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 fs-5">
                <p class="m-0">Numero di bagni: {{ $apartment->bathrooms }}</p>
                <p>Dimensioni: {{ $apartment->square_meters }} mq</p>
            </div>
        </div>
    </div>
    {{-- Servizi --}}
    <div class="container services">
        <div class="row ">
            <h3 class="my-2">Offered services</h3>
            @foreach ($apartment->services as $service)
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 fs-5">
                {!! $service->icon !!}
                <p class="services d-inline">
                    &nbsp {{ $service->type }}
                </p>
            </div>
            @endforeach
        </div>
    </div>
</div>

<div class="container location mt-3 mb-5">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="d-inline-block my-2 me-2 ">Is located in</h3>
            <span class="fs-3 fw-bold"> {{ $apartment->address }}</span>
            <div class="map my-2" id="map">
            </div>
        </div>
    </div>
</div>

{{-- Payment --}}
<div class="container mb-3">
    <div class="row">
        @foreach ($sponsors as $sponsor)
        <div class="col-4">
            <h2>{{ $sponsor->name }}</h2>
            <p>{{ $sponsor->duration }}</p>
            <p>{{ $sponsor->price }}</p>
            <a id="pay-btn" class="btn btn-success">Pay</a>
        </div>
        @endforeach
    </div>

    <div id="braintree-box" class="d-none">
        <p id="cancel-payment" class="text-end m-0 text-danger fw-bold">X</p>

        <div id="dropin-container"></div>

        <form action="{{ route('pay.sponsor', $apartment->slug) }}" method="post">
            @csrf

            <input type="text" name="sponsor_id" id="sponsor_id" class="d-none">
            <button id="submit-button" class="button button--small button--green">Purchase</button>
        </form>
    </div>


</div>
</div>
@endsection
@section('script')
@vite(['resources/js/mapShow.js', 'resources/js/popupDelete.js', 'resources/js/payment.js', 'resources/js/show-slider.js'])
@endsection