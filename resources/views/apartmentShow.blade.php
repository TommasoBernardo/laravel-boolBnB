@extends('layouts.app')
@section('scss')
    @vite(['resources/js/show.js'])
@endsection
@section('content')
    <div class="d-none">
        <input type="text" id="latitude" value="{{ $apartment->latitude }}">
        <input type="text" id="longitude" value="{{ $apartment->longitude }}">
    </div>
    <div class="container mt-5">
        <h1 class="fw-bold text-center mb-5">{{ $apartment->title }}</h1>
        <div class="row ">
            <div class="col-lg-6 col-md-12 col-sm-12 border-md-0">
                <div class="my-dimension">
                    <img src="{{ asset('storage/' . $apartment->cover_image) }}" class=" img-fluid my-img "
                        alt="{{ $apartment->title }}">
                </div>
            </div>

            <div class="col-6 ">
                <div class="row ">
                    <div class="col-lg-6 my-square d-sm-none d-md-none d-lg-block "></div>
                    <div class="col-lg-6  my-square d-sm-none d-md-none top-right d-lg-block"></div>
                    <div class="col-lg-6 my-square d-sm-none d-md-none d-lg-block"></div>
                    <div class="col-lg-6   my-square bottom-right d-lg-block d-sm-none d-md-none "></div>
                </div>
            </div>
        </div>
        <div class="row justify-content-end mt-5">
            <div class="col-lg-6 col-md-9 col-sm-11">
                <h2 class="fw-bold mt-5">The apartment is located : {{ $apartment->address }}</h2>
            </div>
            <div class="col-lg-6 col-md-3 col-sm-1 d-flex justify-content-end">
                <div class="circle">
                    <img src="https://i.pravatar.cc/100" class="img-fluid my-users d-md-none d-sm-none d-lg-block"
                        alt="">
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
            <hr>
        </div>
    </div>    
</div>
    <div class="bg-color-div-email" >
        <div class="container">
            <div class="row" style="padding-top: 5rem; padding-bottom: 3rem" >
                <div class="col-lg-6 col-md-12 mb-5">
                    <div class="my-maps" id="map" style="height: 550px" >
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 mb-5 mt-4" >
                    <div class="mb-4 ">
                        <h3 class="fw-bold text-center" style="color: rgb(255, 202, 44)">
                            Send a email 
                        </h3>
                    </div> 
                    <form action="" class="d-flex justify-content-center ">
                        <div class="wrap-send-email w-85 ">
                            <div class="mb-3  fw-bold">
                                <label for="" class="form-label">Inserisci li tuo nome </label>
                                <input type="text" class="form-control input-email-user" id="" placeholder="luca">
                            </div>
                            <div class="mb-3 fw-bold">
                                <label for="email-user" class="form-label">Inserisci la tua email *  </label>
                                <input type="email" class="form-control input-email-user" id="" placeholder="youemail@example.com">
                            </div>
                            <div class="mb-3  fw-bold">
                                <label for="" class="form-label">Inserisci li tuo numero di telefono </label>
                                <input type="number" class="form-control input-email-user" id="" placeholder="123456">
                            </div>
                            <div class="mb-3  fw-bold">
                                <label for="text-user" class="form-label">Facci sapere la tua esperienza, scrivici qualcosa! *  </label>
                                <textarea class="form-control input-email-user" id="text-user" rows="2"></textarea>
                            </div>
                            <div class="wrap-button-send-email text-center mt-2">
                                <button class="btn btn-warning" style="padding: .8rem 2rem; font-size: 1.1rem" > Send email <i class="fa-solid fa-paper-plane"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
{{-- <section class="bg-color-div-email ">
    <form action="">
        <div class="container mt-5">
            <div class="row justify-content-center p-5">
               <div class="col-lg-6 col-md-12 col-sm-1">
                    <div class="mb-3 text-light fw-bold">
                        <label for="" class="form-label">Inserisci li tuo nome  <i class="fa-solid fa-user icon-send-email"></i></label>
                        <input type="text" class="form-control input-email-user" id="" placeholder="luca">
                    </div>
                    <div class="mb-3 text-light fw-bold">
                        <label for="email-user" class="form-label">Inserisci la tua email <i class="fa-solid fa-envelope-circle-check icon-send-email"></i> </label>
                        <input type="email" class="form-control input-email-user" id="" placeholder="youemail@example.com">
                    </div>
                    <div class="mb-3 text-light fw-bold">
                        <label for="" class="form-label">Inserisci li tuo numero di telefono <i class="fa-solid fa-phone icon-send-email"></i> </label>
                        <input type="number" class="form-control input-email-user" id="" placeholder="123456">
                    </div>
                    <div class="mb-3 text-light fw-bold">
                        <label for="text-user" class="form-label">Facci sapere la tua esperienza, scrivici qualcosa! <i class="fa-solid fa-comment icon-send-email"></i></label>
                        <textarea class="form-control input-email-user" id="text-user" rows="3"></textarea>
                    </div>
                    <div class="wrap-button-send-email">
                        <button class="btn btn-warning"><i class="fa-solid fa-paper-plane"></i></button>
                    </div>
                </div> 
            </div>
        </div>
    </form>
</section> --}}
@endsection


@section('script')
    @vite(['resources/js/mapShow.js'])
@endsection
