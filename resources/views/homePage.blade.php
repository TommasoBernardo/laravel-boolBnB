@extends('layouts.app')
@section('scss')
@vite(['resources/js/home.js'])
@endsection
@section('content')
    {{-- Slider-carousel --}}
    <div class="container-carousel mb-5">
        <div id="carouselExampleIndicators" class="carousel slide hero-parent" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
                <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
                <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
            </ol>
            <div class="search-box-hero d-flex justify-content-center align-items-center">
                <div class="row">
                    <div class="col text-light text-center">
                        <h1 class="heading fw-bold ">
                            Easiest way to find your dream home
                        </h1>
                        <form action="#" class="narrow-w form-search d-flex align-items-stretch mb-3 ps-3  mt-5"
                            data-aos="fade-up" data-aos-delay="200">
                            <input type="text" class="form-control px-4" placeholder="es. New York" />
                            <button type="submit" class="btn btn-outline-success ms-2">Search</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active" style="height:800px ;">
                    <img src="{{ asset('storage/img/cover_img/cover_image-1.jpg') }}" class="d-block w-100"
                        class="img-fluid" style="object-position: center;  " alt="...">
                </div>
                <div class="carousel-item" style="height:800px ;">
                    <img src="{{ asset('storage/img/cover_img/cover_image-2.jpg') }}" class="d-block w-100"
                        class="img-fluid" style="object-position: center;  " alt="...">
                </div>
                <div class="carousel-item" style="height:800px ;">
                    <img src="{{ asset('storage/img/cover_img/cover_image-3.jpg') }}" class="d-block w-100"
                        class="img-fluid" style="object-position:center ; " alt="...">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </a>
        </div>
    </div>
    {{-- Cards-slider-Popular properties --}}
    <div class="container">
        <div class="row mb-5 align-items-center">
            <div class="col-lg-9 col-sm-3 ">
                <h2 class="font-weight-bold text-success heading fw-bold">
                    Popular Properties
                </h2>
            </div>
            <div class="col-lg-3 col-sm-3 d-flex  justify-content-end">
                <div>
                    <a href="#" target="_blank" class="btn btn-success text-white rounded-5 ">View all properties</a>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        {{-- single-card --}}
                        @foreach ($apartments as $apartment)
                            <div class=" swiper-slide">
                                <div class="flex-column" id="myCarousel">
                                    <div href="property-single.html" class="img">
                                        <img src="{{ asset('storage/' . $apartment->cover_image) }}" class="card-img-top"
                                            style=" height:250px ; border-radius:2rem; " alt="{{ $apartment->title }}">
                                    </div>
                                    <div class="flex-column mt-3">
                                        <div class="mb-3">
                                            <div class="mt-2" style="height: 70px " >
                                                <h6 class="d-block mb-2 fw-bold">{{ $apartment->title }}</h6>
                                                <p class="city d-block fw-light mb-1"> {{ $apartment->address }}</p>
                                            </div>
                                            <div class="d-flex mt-2" >
                                                <p class="me-3" style="" ><i class="fa-solid fa-house"></i>   {{ $apartment->rooms }}</span>
                                                <p class=""><i class="fa-solid fa-bed"></i> {{ $apartment->beds }} </span>
                                            </div>
                                            <div class="mt-2" >
                                                <a href="" class="btn btn-outline-success rounded-5 "> See details </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>

        </div>
    </div>
    <div class="bg-color p-4">
        <div class="container">
            <div class="row justify-center">
               @for ($i = 0; $i < 4; $i++)
               <div class="col-lg-3 col-md-6 mt-3 col-sm-1">
                   <div class="card border-0  " style="width: 18rem;">
                       <div class="card-body text-center">
                        <div class="icon mb-4">
                            <i class="fa-solid fa-building"></i>
                        </div>
                         <h5 class="card-subtitle mb-2">Our properties</h5>
                         <p class="card-text">Our real estate properties are carefully selected and offer excellent quality, providing our clients with comfortable and stylish living spaces that meet their specific needs and preferences. </p>
                         <a href="#" class="link-about-us ">About Us</a>
                       </div>
                     </div>
               </div>
                   
               @endfor
                {{-- <div class="col-lg-3 col-md-6 mt-3  col-sm-1 ">
                    <div class="card border-0" style="width: 18rem;">
                        <div class="card-body text-center">
                         <div class="img">
                            <img src="" alt="" srcset="">
                         </div>
                          <h6 class="card-subtitle mb-2">Our properties</h6>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <a href="#" class="text-decoration-none ">Another link</a>
                        </div>
                      </div>
                </div>
                <div class="col-lg-3 col-md-6 mt-3  col-sm-1">
                    <div class="card border-0" style="width: 18rem;">
                        <div class="card-body text-center">
                         <div class="img">
                            <img src="" alt="" srcset="">
                         </div>
                          <h6 class="card-subtitle mb-2">Our properties</h6>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <a href="#" class="text-decoration-none ">Another link</a>
                        </div>
                      </div>
                </div>
                <div class="col-lg-3 col-md-6 mt-3  col-sm-1">
                    <div class="card border-0" style="width: 18rem;">
                        <div class="card-body text-center">
                         <div class="img">
                            <img src="" alt="" srcset="">
                         </div>
                          <h6 class="card-subtitle mb-2">Our properties</h6>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <a href="#" class="text-decoration-none ">Another link</a>
                        </div>
                      </div>
                </div> --}}
            </div>
        </div>
    </div>
@endsection
@section('script')
    @vite(['resources/js/sliderCard.js'])
@endsection
