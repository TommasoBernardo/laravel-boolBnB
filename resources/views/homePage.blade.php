@extends('layouts.app')
@section('content')
    <div class="jumbotron p-5 mb-4 bg-light rounded-3">
        <div class="container py-5">
            <div class="hero">
                <div class="hero-slide">
                    <img src="{{ asset('storage/img/cover_img/cover_img-1.jpg') }}" alt="" srcset="">
                </div>

                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-9 text-center">
                        <h1 class="heading">
                            Easiest way to find your dream home
                        </h1>
                        <form action="#" class="narrow-w form-search d-flex align-items-stretch mb-3 mt-5"
                            data-aos="fade-up" data-aos-delay="200">
                            <input type="text" class="form-control px-4" placeholder=" New York" />
                            <button type="submit" class="btn btn-outline-success ms-2">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mb-5 align-items-center">
            <div class="col-sm-6">
                <h2 class="font-weight-bold text-success heading">
                    Popular Properties
                </h2>
            </div>
            <div class="col-lg-6 text-lg-end">
                <p>
                    <a href="#" target="_blank" class="btn btn-success text-white rounded-5 ">View all properties</a>
                </p>
            </div>
        </div>

        <div class="row">
                @foreach ($apartments as $apartment)
                <div class="col-3">
                    <div class="card-custom">
                        <div href="property-single.html" class="img">
                            <img src="{{ asset('storage/' . $apartment->cover_image) }}" class="card-img-top"  style="width:250px; height:250px ; border-radius:2rem; " alt="{{ $apartment->title }}">
                        </div>
                        <div class="property-content">
                            <div class="price mb-1">
                                <p>
                                </p>
                            </div>
                            <div class="mb-3">
                                <span class="d-block mb-2 text-black-50">{{ $apartment->title}}</span>
                                <span class="city d-block mb-1">{{ $apartment->address}}</span>
                                <div class="specs d-flex mb-2">
                                    <span class="d-block d-flex align-items-center me-3">
                                        <span class="caption">Stanze: {{ $apartment->rooms }}</span>
                                    </span>
                                    <span class="d-block d-flex align-items-center">
                                        <span class="caption">Numeri letti {{ $apartment->beds }}</span>
                                    </span>
                                </div>
                                <div class="" >
                                    <a href="property-single.html" class="btn btn-outline-success rounded-5 ">See details</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                @endforeach
        </div>
    </div>
@endsection
