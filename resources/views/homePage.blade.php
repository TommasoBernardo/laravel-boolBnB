@extends('layouts.app')
@section('content')
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
           <div class="carousel-inner">
             <div class="carousel-item active"  style="height:800px ;" >
               <img src="{{ asset('storage/img/cover_img/cover_image-1.jpg')}}" class="d-block w-100" class="img-fluid"  style="object-position: center;  "   alt="...">  
             </div>
             <div class="carousel-item"  style="height:800px ;"  >
               <img src="{{ asset('storage/img/cover_img/cover_image-2.jpg')}}" class="d-block w-100" class="img-fluid"  style="object-position: center;  "   alt="..."> 
             </div>
             <div class="carousel-item"  style="height:800px ;"  >
               <img src="{{ asset('storage/img/cover_img/cover_image-3.jpg')}}" class="d-block w-100" class="img-fluid"  style="object-position:center ; "   alt="..."> 
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
    <div class="container">
        <div class="row mb-5 align-items-center">
            <div class="col-lg-9 col-sm-3 ">
                <h2 class="font-weight-bold text-success heading">
                    Popular Properties
                </h2>
            </div>
            <div class="col-lg-3 col-sm-3 d-flex  justify-content-end">
                <div>
                    <a href="#" target="_blank" class="btn btn-success text-white rounded-5 ">View all properties</a>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach ($apartments as $apartment)
                <div class="col-lg-4 col-sm-1 col-md-6">
                    <div class="card-custom" id="myCarousel">
                        <div href="property-single.html" class="img">
                            <img src="{{ asset('storage/' . $apartment->cover_image) }}" class="card-img-top"
                                style=" height:250px ; border-radius:2rem; " alt="{{ $apartment->title }}">
                        </div>
                        <div class="property-content">
                            <div class="price mb-1">
                                <p>
                                </p>
                            </div>
                            <div class="mb-3">
                                <span class="d-block mb-2">{{ $apartment->title }}</span>
                                <span class="city d-block mb-1">{{ $apartment->address }}</span>
                                <div class="specs d-flex mb-2">
                                    <span class="d-block d-flex align-items-center me-3">
                                        <span class="caption">Stanze: {{ $apartment->rooms }}</span>
                                    </span>
                                    <span class="d-block d-flex align-items-center">
                                        <span class="caption">Numeri letti {{ $apartment->beds }}</span>
                                    </span>
                                </div>
                                <div class="">
                                    <a href="property-single.html" class="btn btn-outline-success rounded-5 ">See
                                        details</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>
    </div>
    </body>
@endsection
@section('script')
    @vite(['resources/js/sliderHomepage.js'])
@endsection
