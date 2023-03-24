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
                <div class="col  text-light">
                    <h1 class="heading fw-bold ">
                        Easiest way to find your dream home <i class="fa-regular fa-paper-plane"></i>
                    </h1>
                    <form action="{{ route('apartments.index') }}" method="GET" id="formFilter" class="narrow-w form-search d-flex align-items-center mb-3 ps-3  mt-5 justify-content-around" data-aos="fade-up" data-aos-delay="200">
                        <div id="searchBox" class="w-100" style="margin-bottom: 12px;"></div>
                        <div class="d-none">
                            <input type="text" id="latitude" name="latitude">
                            <input type="text" id="longitude" name="longitude">
                        </div>
                        <button type="submit" class="btn btn-success ms-2">Search</button>
                    </form>
                    <p id="mexErrore" class="text-center text-danger fs-1 m-0 d-none">Selezionare dal menu a tendina</p>
                </div>
            </div>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" style="height: 550px;">
                <img src="{{ asset('storage/img/cover_img/cover_image-1.jpg') }}" class=" jumbo-img " alt="...">
            </div>
            <div class="carousel-item" style="height: 550px;">
                <img src="{{ asset('storage/img/cover_img/cover_image-2.jpg') }}" class="jumbo-img" alt="...">
            </div>
            <div class="carousel-item" style="height: 550px;">
                <img src="{{ asset('storage/img/cover_img/cover_image-3.jpg') }}" class="jumbo-img" alt="...">
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
            <h2 class="font-weight-bold heading fw-bold" style="color:rgb(0, 85, 85) ">
                Popular Properties
            </h2>
        </div>
        <div class="col-lg-3 col-sm-3 div-wrap-button-properties">

            <a href="{{ route('apartments.index') }}" class="btn text-white custom-button rounded-5" style="background-color:rgb(0, 85, 85)">View all properties</a>

        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="swiper mySwiper position-relative">
                <div class="swiper-wrapper">
                    {{-- single-card --}}

                  

                    @foreach ($apartments as $apartment)
                    <div class=" swiper-slide">
                        <div class="flex-column" id="myCarousel">
                            
                            <div href="property-single.html" class="img img-box">
                                <img src="{{ asset('storage/' . $apartment->cover_image) }}" class="card-img-top property-img" style=" height:250px ; border-radius:2rem; object-fit: cover; object-position: ; " alt="{{ $apartment->title }}">
                            </div>
                            <div class="flex-column mt-3">
                                <div class="mb-3">
                                    <div class="mt-2" style="height: 70px ">
                                        <h6 class="d-block mb-2 fw-bold">{{ $apartment->title }}</h6>
                                        <p class="city d-block fw-light mb-1"> {{ $apartment->address }}</p>
                                    </div>
                                    <div class="d-flex mt-2">
                                        <p class="me-3" style=""><i class="fa-solid fa-house"></i>
                                            {{ $apartment->rooms }}</span>
                                        <p class=""><i class="fa-solid fa-bed"></i> {{ $apartment->beds }}
                                            </span>
                                    </div>
                                    <div class="mt-2">
                                        <a href="{{ route('apartments.show', $apartment->slug) }}" class="details-button">
                                            See details </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                <div class="swiper-button-next arrow"></div>
                <div class="swiper-button-prev arrow"></div>
            </div>
        </div>

    </div>
</div>
{{-- banner propreties --}}
<div class="bg-color p-4">
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-12">
                <h1 class="mb-3 fw-bold text-white text-center">
                    Why people choose us
                </h1>
            </div>
            <div class="col-lg-3 col-md-6 mt-3 col-sm-12 wrap-cards-propreties ">
                <div class="card border-0  " style="width: 18rem;">
                    <div class="card-body text-center">
                        <div class="icon mb-4">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <h5 class="card-subtitle mb-2">Quality 1</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime harum iste
                            quidem aperiam dolor explicabo ab officia dolore ipsa rem unde fugit autem cum, nobis alias
                            corporis voluptate quasi? Rerum!</p>
                        <a href="#" class="link-about-us ">About Us</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mt-3 col-sm-12 wrap-cards-propreties ">
                <div class="card border-0  " style="width: 18rem;">
                    <div class="card-body text-center">
                        <div class="icon mb-4">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <h5 class="card-subtitle mb-2">Quality 2</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime harum iste
                            quidem aperiam dolor explicabo ab officia dolore ipsa rem unde fugit autem cum, nobis alias
                            corporis voluptate quasi? Rerum!</p>
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
                        <h5 class="card-subtitle mb-2">Quality 3</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime harum iste
                            quidem aperiam dolor explicabo ab officia dolore ipsa rem unde fugit autem cum, nobis alias
                            corporis voluptate quasi? Rerum!</p>
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
                        <h5 class="card-subtitle mb-2">Quality 4</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime harum iste
                            quidem aperiam dolor explicabo ab officia dolore ipsa rem unde fugit autem cum, nobis alias
                            corporis voluptate quasi? Rerum!</p>
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
                    What people say about us
                </h1>
                <p class="">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam enim pariatur similique debitis vel
                    nisi qui reprehenderit totam? Quod maiores.
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
                                Wonderful experience
                            </span>
                            <p class="mt-2">
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dicta quas quos facilis,
                                fugiat deleniti sed impedit. Aut illum, architecto corporis blanditiis voluptatum sit
                                voluptatem iste debitis sint nobis iusto, sapiente accusamus atque iure harum nisi!
                                Iusto nihil amet dolorum nemo?
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
                                Wonderful experience
                            </span>
                            <p class="mt-2">
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dicta quas quos facilis,
                                fugiat deleniti sed impedit. Aut illum, architecto corporis blanditiis voluptatum sit
                                voluptatem iste debitis sint nobis iusto, sapiente accusamus atque iure harum nisi!
                                Iusto nihil amet dolorum nemo?
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
                                Wonderful experience
                            </span>
                            <p class="mt-2">
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dicta quas quos facilis,
                                fugiat deleniti sed impedit. Aut illum, architecto corporis blanditiis voluptatum sit
                                voluptatem iste debitis sint nobis iusto, sapiente accusamus atque iure harum nisi!
                                Iusto nihil amet dolorum nemo?
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
@vite(['resources/js/sliderCard.js','resources/js/searchFilter'])
@endsection