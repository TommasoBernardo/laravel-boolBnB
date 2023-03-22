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
            <div class="search-box-hero d-flex justify-content-center align-items-center ">
                <div class="row">
                    <div class="col text-light" >
                        <h1 class="heading fw-bold " >
                            Easiest way to find your dream home <i class="fa-regular fa-paper-plane"></i>
                        </h1>
                        {{-- <form action="#" class="narrow-w form-search d-flex align-items-stretch mb-3 ps-3  mt-5"
                            data-aos="fade-up" data-aos-delay="200">
                            <input type="text" class="form-control px-4" placeholder="es. New York" />
                            <button type="submit" class="btn btn-outline-success ms-2">Search</button>
                        </form> --}}
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
    <div class="container mb-5">
        <div class="row mb-5 align-items-center">
            <div class="col-lg-9 col-sm-3 ">
                <h2 class="font-weight-bold heading fw-bold" style="color:rgb(0, 85, 85) " >
                    Popular Properties
                </h2>
            </div>
            <div class="col-lg-3 col-sm-3 d-flex  justify-content-end">
                <div class="">
                    <a href="{{route('apartments.index') }}" class="btn text-white custom-button rounded-5" style="background-color:rgb(0, 85, 85)">View all properties</a>
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
                                                <a href="{{route('apartments.show', $apartment->slug ) }}"class="btn btn-outline-success rounded-5 "> See details </a>
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
    {{-- banner propreties --}}
    <div class="bg-color p-4">
        <div class="container mt-5 mb-5">
            <div class="row">
               <div class="col-lg-3 col-md-6 mt-3 col-sm-12 wrap-cards-propreties ">
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
               <div class="col-lg-3 col-md-6 mt-3 col-sm-12 wrap-cards-propreties ">
                <div class="card border-0  " style="width: 18rem;">
                    <div class="card-body text-center">
                     <div class="icon mb-4">
                        <i class="fa-solid fa-building-user"></i>
                     </div>
                      <h5 class="card-subtitle mb-2">Propreties on Sales</h5>
                      <p class="card-text">Our real estate properties are carefully selected and offer excellent quality, providing our clients with comfortable and stylish living spaces that meet their specific needs and preferences. </p>
                      <a href="#" class="link-about-us ">About Us</a>
                    </div>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6 mt-3 col-sm-12 wrap-cards-propreties ">
                <div class="card border-0  " style="width: 18rem;">
                    <div class="card-body text-center">
                     <div class="icon mb-4">
                        <i class="fa-solid fa-user"></i></i>
                     </div>
                      <h5 class="card-subtitle mb-2">Real Estate Agent</h5>
                      <p class="card-text">Our real estate properties are carefully selected and offer excellent quality, providing our clients with comfortable and stylish living spaces that meet their specific needs and preferences. </p>
                      <a href="#" class="link-about-us ">About Us</a>
                    </div>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6 mt-3 col-sm-12 wrap-cards-propreties ">
                <div class="card border-0  " style="width: 18rem;">
                    <div class="card-body text-center">
                     <div class="icon mb-4">
                        <i class="fa-solid fa-house-circle-check"></i></i>
                     </div>
                      <h5 class="card-subtitle mb-2">House for Sale</h5>
                      <p class="card-text">Our real estate properties are carefully selected and offer excellent quality, providing our clients with comfortable and stylish living spaces that meet their specific needs and preferences. </p>
                      <a href="#" class="link-about-us ">About Us</a>
                    </div>
                  </div>
               </div>
            </div>
        </div>
    </div>

    {{-- section cards Our agents --}}
    <section>
        <div class="container">
            <div class="row mt-5">
                <div class="col text-center">
                    <h1 class="mb-3 fw-bold" style="color:rgb(0, 85, 85) ;">
                        Our Agents 
                    </h1>
                    <p class="">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam enim pariatur similique debitis vel nisi qui reprehenderit totam? Quod maiores. 
                    </p>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-4 col-md-4 col-sm-12 card-agent">
                    <div class="card border-0 text-center p-3 ">
                        <div class="img-profile mb-3">
                            <img src="https://i.pravatar.cc/100" alt="" srcset="">
                        </div>
                        <div class="wrap-content">
                            <div class="content mb-5">
                                <h4>
                                    James Doe
                                </h4>
                                <span style="color: gray">
                                    Real Estate Agent
                                </span>
                                <p class="mt-2">
                                    A great manager is a skilled communicator who is able to clearly and effectively convey their ideas and expectations to their team. They are also good listeners, open to feedback and able to understand and respond to their team members' concerns and needs. 
                                </p>
                            </div>
                            <div class="mb-5 d-flex justify-content-center">
                                <ul class="icon d-flex">
                                    <li class="icon-circle-wrap m-2">
                                        <i class="fa-brands fa-twitter"></i>
                                    </li>
                                    <li class="icon-circle-wrap m-2">
                                        <i class="fa-brands fa-facebook-f"></i>
                                    </li>
                                    <li class="icon-circle-wrap m-2">
                                        <i class="fa-brands fa-linkedin-in"></i>
                                    </li>
                                    <li class="icon-circle-wrap m-2 ">
                                        <i class="fa-brands fa-instagram"></i>
                                    </li>
                                </ul>  
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4  col-sm-12 card-agent">
                    <div class="card border-0 text-center p-3">
                        <div class="img-profile mb-3">
                            <img src="https://i.pravatar.cc/100" alt="" srcset="">
                        </div>
                        <div class="wrap-content">
                            <div class="content mb-5">
                                <h4>
                                    Jean Smith
                                </h4>
                                <span style="color: gray">
                                    Real Estate Agent
                                </span>
                                <p class="mt-2">
                                    A great manager is also a strategic thinker who is able to anticipate potential problems and devise effective solutions. They are able to make well-informed decisions based on data and analysis, and are able to adapt and pivot when necessary to keep their team on track and moving towards success.  
                                </p>
                            </div>
                            <div class="mb-5 d-flex justify-content-center">
                                <ul class="icon d-flex">
                                    <li class="icon-circle-wrap m-2">
                                        <i class="fa-brands fa-twitter"></i>
                                    </li>
                                    <li class="icon-circle-wrap m-2">
                                        <i class="fa-brands fa-facebook-f"></i>
                                    </li>
                                    <li class="icon-circle-wrap m-2">
                                        <i class="fa-brands fa-linkedin-in"></i>
                                    </li>
                                    <li class="icon-circle-wrap m-2">
                                        <i class="fa-brands fa-instagram"></i>
                                    </li>

                                </ul>  
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4  col-sm-12 card-agent">
                    <div class="card border-0 text-center p-3">
                        <div class="img-profile mb-3">
                            <img src="https://i.pravatar.cc/100" alt="" srcset="">
                        </div>
                        <div class="wrap-content">
                            <div class="content mb-5">
                                <h4>
                                    Alicia Huston
                                </h4>
                                <span style="color: gray">
                                    Real Estate Agent
                                </span>
                                <p class="mt-2">
                                    A great manager is also a strategic thinker who is able to anticipate potential problems and devise effective solutions. They are able to make well-informed decisions based on data and analysis, and are able to adapt and pivot when necessary to keep their team on track and moving towards success. 
                                </p>
                            </div>
                            <div class="mb-5 d-flex justify-content-center">
                                <ul class="icon d-flex">
                                    <li class="icon-circle-wrap m-2">
                                        <i class="fa-brands fa-twitter"></i>
                                    </li>
                                    <li class="icon-circle-wrap m-2">
                                        <i class="fa-brands fa-facebook-f"></i>
                                    </li>
                                    <li class="icon-circle-wrap m-2">
                                        <i class="fa-brands fa-linkedin-in"></i>
                                    </li>
                                    <li class="icon-circle-wrap m-2">
                                        <i class="fa-brands fa-instagram"></i>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
@section('script')
    @vite(['resources/js/sliderCard.js'])
@endsection
