@extends('layouts.app')
@section('scss')
@vite(['resources/js/show.js','resources/js/show-slider.js'])
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
<div class="container-fluid return-arrow sticky-lg-top sticky-md-top sticky-sm-top mt-3 ">
    <div class="row">
        <div class="col-2">
            <div class="wrapper-return-arrow position-absolute">
                <a href="{{ route('apartments.index') }}" class="btn fw-bold my-4 ms-2" style="padding: .6rem 1.2rem; font-size: 1.1rem ">
                    <i class="fa-solid fa-arrow-left fs-1" style="color: #125655;"></i> </a>
            </div>
        </div>
    </div>
</div>
<div class="container mt-5">
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
</div>
<div class="container">
    <div class="row justify-content-end mt-5">
        <div class="col-lg-6 col-md-9 col-sm-11">
            <h2 class="fw-bold mt-5">The apartment is located : {{ $apartment->address }}</h2>
        </div>
        <div class="col-lg-6 col-md-3 col-sm-1 d-flex justify-content-end">
            <div class="circle">
                <img src="https://i.pravatar.cc/100" class="img-fluid my-users d-md-none d-sm-none d-lg-block" alt="">
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

        </div>
    </div>
</div>
<div class="bg-color-div-email">
    <div class="container">
        <div class="row" style="padding-top: 5rem; padding-bottom: 3rem">
            <div class="col-lg-6 col-md-12 mb-5">
                <div class="my-maps" id="map" style="height: 550px">
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 mb-5 mt-4">
                <div class="mb-4 ">
                    <h3 class="fw-bold text-center" style="color: rgb(255, 202, 44)">
                        Send a message
                    </h3>
                </div>
                <form action="{{ route('lead.store', $apartment->slug) }}" method="POST" class="d-flex justify-content-center ">
                    @csrf
                    <div class="wrap-send-email w-75">
                        <div class="mb-3  fw-bold">
                            <label for="name" class="form-label {{ $errors->has('name') ? 'is-invalid' : '' }}">Enter your name there
                            </label>
                            <input type="text" name="name" class="form-control input-email-user" maxlength="150" minlength="3" value="@if (Auth::check() and Auth::user()->name) {{ Auth::user()->name }} @endif" id="name" placeholder="">
                            @if ($errors->has('name'))
                            <div class="alert alert-danger mt-3">
                                @foreach ($errors->get('name') as $error)
                                {{ $error }}
                                @endforeach
                            </div>
                            @endif
                        </div>
                        <div class="mb-3 fw-bold">
                            <label for="email-user" class="form-label {{ $errors->has('email') ? 'is-invalid' : '' }}">Enter yours
                                email * </label>
                            <input type="email" name="email" class="form-control input-email-user" id="email-user" maxlength="255" required value="@if (Auth::check()) {{ Auth::user()->email }} @endif" placeholder="">
                            @if ($errors->has('email'))
                            <div class="alert alert-danger mt-3">
                                @foreach ($errors->get('email') as $error)
                                {{ $error }}
                                @endforeach
                            </div>
                            @endif
                        </div>
                        <div class="mb-3  fw-bold">
                            <label for="phone_number" class="form-label {{ $errors->has('phone_number') ? 'is-invalid' : '' }}">Enter your
                                phone number </label>
                            <input type="number" name="phone_number" class="form-control input-email-user" id="phone_number" placeholder="">
                            @if ($errors->has('phone_number'))
                            <div class="alert alert-danger mt-3">
                                @foreach ($errors->get('phone_number') as $error)
                                {{ $error }}
                                @endforeach
                            </div>
                            @endif
                        </div>
                        <div class="mb-3  fw-bold">
                            <label for="text-user" class="form-label {{ $errors->has('message') ? 'is-invalid' : '' }}">Enter your
                                message
                                * </label>
                            <textarea name="message" class="form-control input-email-user" id="text-user" rows="6" minlength="5" required></textarea>
                            @if ($errors->has('message'))
                            <div class="alert alert-danger mt-3">
                                @foreach ($errors->get('message') as $error)
                                {{ $error }}
                                @endforeach
                            </div>
                            @endif
                        </div>
                        <div class="wrap-button-send-email text-center  mt-2">
                            <button type="submit" class="btn btn-warning fw-bold text-light" style="padding: .8rem 2rem; font-size: 1.1rem"> Send message </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
</div>
</div>
@endsection


@section('script')
@vite(['resources/js/mapShow.js', 'resources/js/popupDelete.js'])
@endsection