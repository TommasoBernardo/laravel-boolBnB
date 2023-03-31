@extends('layouts.app')
@section('scss')
    @vite(['resources/js/home.js', 'resources/js/animation.js'])
@endsection
@section('content')
    {{-- Slider-carousel --}}
    <div class="container-carousel mb-5">
        <div id="carouselExampleSlidesOnly" class="carousel slide hero-parent" data-bs-ride="carousel">
            <div class="search-box-hero d-flex justify-content-center align-items-center ">
                <div class="row">
                    <div class="col-lg-12 col-sm-12 text-light text-center">
                        <h1 class=" jumbo-title heading fw-bold p-5">
                            Easiest way to find your dream home <i class="fa-regular fa-paper-plane"></i>
                        </h1>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 offset-lg-3 col-md-6 offset-md-3 col-sm-6 offset-sm-3">
                            <form action="{{ route('apartments.index') }}" method="GET" id="formFilter"
                                class="narrow-w form-search d-flex align-items-center mb-3 ps-3  mt-5 justify-content-around"
                                data-aos="fade-up" data-aos-delay="200">
                                <div id="searchBox" class="w-100" style="margin-bottom: 12px;"></div>
                                <div class="d-none">
                                    <input type="text" id="latitude" name="latitude">
                                    <input type="text" id="longitude" name="longitude">
                                </div>
                                <button type="submit" class="btn btn-success ms-2">Search</button>
                            </form>
                        </div>
                        <p id="mexErrore" class="text-center  alert alert-warning fs-1 m-0 d-none">Write an address into the searchbar
                        </p>
                    </div>
                </div>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active" style="height: 550px;">
                    <img src="{{ asset('storage/img/cover_img/cover_image-11.jpg') }}" class=" jumbo-img " alt="...">
                </div>
                <div class="carousel-item" style="height: 550px;">
                    <img src="{{ asset('storage/img/cover_img/cover_image-16.jpg') }}" class="jumbo-img" alt="...">
                </div>
                <div class="carousel-item" style="height: 550px;">
                    <img src="{{ asset('storage/img/cover_img/cover_image-23.jpg') }}" class="jumbo-img" alt="...">
                </div>
                <div class="carousel-item" style="height: 550px;">
                    <img src="{{ asset('storage/img/cover_img/cover_image-35.jpg') }}" class="jumbo-img" alt="...">
                </div>
            </div>
        </div>
    </div>

    {{-- Cards-slider-Popular properties --}}
    <div class="container mb-5">
        <div class="row mb-5 align-items-center">
            <div class="col-lg-9 col-md-6 col-sm-12  justify-content-sm-center ">
                <h2 class="font-weight-bold heading fw-bold popular-title" style="color:rgb(0, 85, 85) ">
                    Popular Properties
                </h2>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 div-wrap-button-properties">
                <a href="{{ route('apartments.index') }}"
                    class="btn text-white custom-button button-properties rounded-5 text-sm-center"
                    style="background-color:rgb(0, 85, 85)">View all properties</a>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="swiper mySwiper position-relative">
                    <div class="swiper-wrapper">
                        {{-- single-card --}}
                        @php $count = 0; @endphp
                        @foreach ($apartments as $apartment)
                            @php $lastActiveSponsor = null; @endphp
                            @foreach ($apartment->sponsors as $sponsor)
                                @if ($sponsor->pivot->end_date > $dateNow)
                                    @php $lastActiveSponsor = $sponsor; @endphp
                                @endif
                            @endforeach

                            @if (!is_null($lastActiveSponsor) && $apartment->visible != 0)
                                @php $count++; @endphp
                                <div class="swiper-slide my-slider">
                                    <div class="flex-column" id="myCarousel">
                                        <div href="property-single.html" class="img img-box position-relative">
                                            <img src="{{ asset('storage/' . $apartment->cover_image) }}"
                                                class="card-img-top property-img"
                                                style=" height:250px ; border-radius:2rem; object-fit: cover;    object-position: ; "
                                                alt="{{ $apartment->title }}">
                                            <span class="position-absolute badge rounded-pill text-bg-warning"
                                                style="right: 5%; top:10%; padding: .3rem .8rem"> Sponsored </span>

                                        </div>
                                        <div class="flex-column mt-3">
                                            <div class="mb-3">
                                                <div class="mt-2" style="height: 70px ">
                                                    <h6 class="d-block mb-2 fw-bold">{{ $apartment->title }}</h6>
                                                    <p class="city d-block fw-light mb-1"> {{ $apartment->address }}
                                                    </p>
                                                </div>
                                                <div class="d-flex apartment-icons">
                                                    <p class="me-3" style=""><i class="fa-solid fa-house"></i>
                                                        {{ $apartment->rooms }}</span>
                                                    <p class=""><i class="fa-solid fa-bed"></i>
                                                        {{ $apartment->beds }}
                                                        </span>
                                                </div>
                                                <div class="mt-2">
                                                    <a href="{{ route('apartments.show', $apartment->slug) }}"
                                                        class="details-button">
                                                        See details </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach

                        @if ($count == 0)
                            <p class="text-center fs-1 text-danger">Nessun appartamento in evidenza.</p>
                        @endif

                    </div>
                    <div class="swiper-button-next arrow"></div>
                    <div class="swiper-button-prev arrow"></div>
                </div>
            </div>

        </div>
    </div>
    {{-- banner propreties --}}
    <div class="ocean">
        <div class="wave wave-color-top"></div>
        <div class="wave wave-color-top"></div>
        <div class="wave wave-color-top"></div>
    </div>
    <div class="bg-color p-4 ">
        <div class="container mt-5 mb-5">
            <div class="row">
                <div class="col-12 mb-5">
                    <h1 class="mb-3 fw-bold text-white text-center">
                        Why people choose us
                    </h1>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-3">
                            <div class="our-team px-2" style="height: 460px">
                                <div class="picture">
                                    <img class="img-fluid" src="https://xsgames.co/randomusers/avatar.php?g=female">
                                </div>
                                <div class="team-content">
                                    <h3 class="name mt-1 text-dark fw-bold">Michelle Miller</h3>
                                    <p class="title text-justified">Michelle is a guides writer from Northern Ireland who
                                        likes screaming at her TV. Often at horror movies.</p>
                                </div>
                                <ul class="social">
                                    <li><i class="fa-brands fa-facebook"></i>
                                    </li>
                                    <li><i class="fa-brands fa-twitter"></i></li>
                                    <li><i class="fa-brands fa-instagram"></i></li>
                                    <li><i class="fa-brands fa-linkedin"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-3">
                            <div class="our-team  px-2" style="height: 460px">
                                <div class="picture">
                                    <img class="img-fluid" src="https://xsgames.co/randomusers/avatar.php?g=male">
                                </div>
                                <div class="team-content">
                                    <h3 class="name mt-1 text-dark fw-bold">Justin Ramos</h3>
                                    <p class="title text-justified">I am a nature travel lover: whether it's a jungle, a
                                        volcano crater, a coral reef, a mountain ridge or a desert</p>
                                </div>
                                <ul class="social">
                                    <li><i class=" my-i fa-brands fa-facebook"></i></li>
                                    <li><i class=" my-i fa-brands fa-twitter"></i></li>
                                    <li><i class=" my-i fa-brands fa-instagram"></i></li>
                                    <li><i class=" my-i fa-brands fa-linkedin"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-3">
                            <div class="our-team px-2" style="height: 500px">
                                <div class="picture">
                                    <img class="img-fluid" src="https://i.pravatar.cc/300">
                                </div>
                                <div class="team-content">
                                    <h3 class="name mt-1 text-dark fw-bold">Sam Knott</h3>
                                    <p class="title text-justified">For years I have been using every free moment to
                                        travel/run away and immerse myself as much as possible in local cultures.</p>
                                </div>
                                <ul class="social">
                                    <li><i class=" my-i fa-brands fa-facebook"></i></li>
                                    <li><i class=" my-i fa-brands fa-twitter"></i></li>
                                    <li><i class=" my-i fa-brands fa-instagram"></i></li>
                                    <li><i class=" my-i fa-brands fa-linkedin"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class=" col-sm-6 col-md-6 col-lg-3">
                            <div class="our-team px-2" style="height: 460px">
                                <div class="picture">
                                    <img class="img-fluid" src="https://i.pravatar.cc/150?img=60">
                                </div>
                                <div class="team-content">
                                    <h3 class="name mt-1 text-dark fw-bold">Taylor Huntley</h3>
                                    <p class="title text-justified">I've been wandering around Sub-Saharan Africa and
                                        Vietnam for years and now I can't wait to explore the world with you!</p>
                                </div>
                                <ul class="social">
                                    <li><i class=" my-i fa-brands fa-facebook"></i></li>
                                    <li><i class=" my-i fa-brands fa-twitter"></i></li>
                                    <li><i class=" my-i fa-brands fa-instagram"></i></li>
                                    <li><i class=" my-i fa-brands fa-linkedin"></i></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ocean-rotate ocean">
        <div class="wave wave-color-bottom"></div>
        <div class="wave wave-color-bottom "></div>
        <div class="wave wave-color-bottom "></div>
    </div>

    {{-- section cards Our agents --}}
    <section>
        <div class="container mb-5">
            <div class="row mt-5 p-3">
                <div class="col text-center">
                    <h1 class="mb-3 fw-bold" style="color:rgb(0, 85, 85) ;">
                        What people say about us
                    </h1>
                    <p class="">
                        Our mission is to create a world where people can belong through healthy travel that is local,
                        authentic, diverse, inclusive and sustainable.
                    </p>
                </div>
            </div>
            <div class="row mt-5 p-1">
                <div class="col-lg-4 col-md-12 col-sm-12 card-agent mb-4">
                    <div class="card border-0 text-center p-3 card-container about-card">
                        <div class="img-profile mb-3">
                            <img src="https://i.pravatar.cc/150?img=33" alt="" srcset="">
                        </div>
                        <div class="wrap-content">
                            <div class="content ">
                                <h4 class="fw-bold">
                                    James Doe
                                </h4>
                                <span style="color: gray">
                                    Wonderful experience
                                </span>
                                <p class="mt-4 text-justified">
                                    I absolutely loved my stay at this fabulous BoolBnB property. The hosts were so kind
                                    and
                                    accommodating, they truly made me feel welcome. The house was sparkling clean and
                                    provided all the amenities I could need. Would definitely recommend staying here!
                                </p>
                            </div>
                            <div class="mt-5 d-flex justify-content-center">
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
                <div class="col-lg-4 col-md-12  col-sm-12 card-agent mb-4">
                    <div class="card border-0 text-center p-3 card-container about-card">
                        <div class="img-profile mb-3">
                            <img src="https://i.pravatar.cc/100" alt="" srcset="">
                        </div>
                        <div class="wrap-content">
                            <div class="content ">
                                <h4 class="fw-bold">
                                    Andrea Smith
                                </h4>
                                <span style="color: gray">
                                    Great customer service
                                </span>
                                <p class="mt-4 text-justified">
                                    I had a wonderful experience staying at this BoolBnB. The apartment was clean and
                                    spacious, and the host was incredibly responsive and helpful with any questions I
                                    had. Everything was exactly as described and check-in/check-out were super smooth.
                                </p>
                            </div>
                            <div class="mt-5 d-flex justify-content-center">
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
                <div class="col-lg-4 col-md-12  col-sm-12 card-agent mb-4">
                    <div class="card border-0 text-center p-3 card-container about-card">
                        <div class="img-profile mb-3">
                            <img src="https://i.pravatar.cc/150?img=31" alt="" srcset="">
                        </div>
                        <div class="wrap-content">
                            <div class="content" ">
                                    <h4 class="fw-bold">
                                        Alicia Huston
                                    </h4>
                                    <span style="color: gray">
                                        BoolBnB has made traveling
                                    </span>
                                    <p class="mt-4 text-justified">
                                        We've been using BoolBnB for 10 years now, and this company is supreme. Compared to the
                                        competition,they are in a different category.When you host, you know to the penny what
                                        you're going to pay.When you rent, the same is true. Definitely the best service
                                    </p>
                                </div>
                                <div class="mt-5 d-flex justify-content-center">
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
    @vite(['resources/js/sliderCard.js', 'resources/js/searchFilter.js'])
@endsection
