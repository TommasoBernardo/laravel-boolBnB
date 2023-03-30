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
                <p class="m-0">Rooms available: <strong>{{ $apartment->rooms }}</strong></p>
                <p>Beds available: <strong>{{ $apartment->beds }}</strong></p>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 fs-5">
                <p class="m-0">Bathrooms available: <strong>{{ $apartment->bathrooms }}</strong></p>
                <p>Sizes: <strong>{{ $apartment->square_meters }} m<sup>2</sup> </strong></p>
            </div>
        </div>
    </div>
    {{-- Servizi --}}
    <div class="container services">
        <div class="row ">
            <h3 class="my-2">Services offered:</h3>
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

<div class="container mb-5 text-center">
    <h1 class="my-5">Sponsor Plans</h1>
    <div class="row d-flex justify-content-center">
        @foreach ($sponsors as $sponsor)
        <div class="col-lg-4 p-5  text-center">
            <div class="princing-item">
                <div class="pricing-divider">
                    <h3 class="text-light">{{ $sponsor->name }}</h3>
                    <h5 class="my-0 display-4 text-light font-weight-normal mb-3"><span class="h1">$</span>
                        {{ $sponsor->price }}
                    </h5>
                    <svg class='pricing-divider-img blue' enable-background='new 0 0 300 100' height='100px' id='Layer_1' preserveAspectRatio='none' version='1.1' viewBox='0 0 300 100' width='300px' x='0px' xml:space='preserve' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns='http://www.w3.org/2000/svg' y='0px'>
                        <path class='deco-layer deco-layer--2' d='M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729
            c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z' fill='#FFFFFF' opacity='0.6'></path>
                        <path class='deco-layer deco-layer--3' d='M43.415,98.342c0,0,48.283-68.927,109.133-68.927c65.886,0,97.983,67.914,97.983,67.914v3.716
            H42.401L43.415,98.342z' fill='#FFFFFF' opacity='0.7'></path>
                        <path class='deco-layer deco-layer--4' d='M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428
            c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z' fill='#FFFFFF'></path>
                    </svg>
                </div>
                <div class="card-body bg-white mt-0 shadow p-4">
                    <ul class="list-unstyled mb-5 position-relative">
                        @if ($sponsor->duration === '24:00:00')
                        <li class="fs-4"><b>24h</b> Sponsorship</li>
                        @elseif ($sponsor->duration === '72:00:00')
                        <li class="fs-4"><b>72h</b> Sponsorship</li>
                        @elseif ($sponsor->duration === '144:00:00')
                        <li class="fs-4"><b>144h</b> Sponsorship</li>
                        @endif
                    </ul>
                    <button type="button" id="pay-btn" class="btn btn-lg  btn-custom " data-bs-toggle="modal" data-bs-target="#staticBackdrop">Pay</button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Payment</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="braintree-box" class="braintree-box">
                    <div id="dropin-container"></div>
                    <form action="{{ route('pay.sponsor', $apartment->slug) }}" method="post" class="text-center">
                        @csrf
                        <input type="text" name="sponsor_id" id="sponsor_id" class="d-none" readonly>
                        <button id="submit-button" class="button button--small button--green mb-5">Purchase</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<canvas id="viewsChart" class="mb-5"></canvas>
<script>
    var chartData = <?php echo $chartData; ?>;
    var ctx = document.getElementById('viewsChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: chartData,
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    precision: 0,
                }
            }
        }
    });
</script>



@endsection
@section('script')


@vite(['resources/js/mapShow.js', 'resources/js/popupDelete.js', 'resources/js/payment.js', 'resources/js/show-slider.js'])
@endsection