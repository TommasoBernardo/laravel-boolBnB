<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400&display=swap" rel="stylesheet">

    <!-- tomtom -->
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.1.2-public-preview.15/services/services-web.min.js">
    </script>
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/3.1.3-public-preview.0/SearchBox-web.js">
    </script>
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.1.2-public-preview.15/services/services-web.min.js">
    </script>
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/3.1.3-public-preview.0/SearchBox-web.js">
    </script>
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.1.2-public-preview.15/services/services-web.min.js">
    </script>
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/3.1.3-public-preview.0/SearchBox-web.js">
    </script>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.2.1/chart.min.js"></script>




    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.18.0/maps/maps-web.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.18.0/maps/maps.css" />
    <script>
        (function() {
            window.SS = window.SS || {};
            SS.Require = function(callback) {
                if (typeof callback === 'function') {
                    if (window.SS && SS.EventTrack) {
                        callback();
                    } else {
                        var siteSpect = document.getElementById('siteSpectLibraries');
                        var head = document.getElementsByTagName('head')[0];
                        if (siteSpect === null && typeof head !== 'undefined') {
                            siteSpect = document.createElement('script');
                            siteSpect.type = 'text/javascript';
                            siteSpect.src = '/__ssobj/core.js+ssdomvar.js+generic-adapter.js';
                            siteSpect.async = true;
                            siteSpect.id = 'siteSpectLibraries';
                            head.appendChild(siteSpect);
                        }
                        if (window.addEventListener) {
                            siteSpect.addEventListener('load', callback, false);
                        } else {
                            siteSpect.attachEvent('onload', callback, false);
                        }
                    }
                }
            };
        })();
    </script>

    <!-- sweetAller -->
    <link href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>

    {{-- Swiper-slider --}}
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    {{-- cdn Bootstrap --}}


    {{-- font-awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://js.braintreegateway.com/web/dropin/1.36.0/js/dropin.js"></script>

    <!-- Usando Vite -->
    @vite(['resources/js/app.js', 'resources/js/backToTop-btn.js'])

    @yield('scss')



</head>

<body>
    <button type="button" class="btn btn-success btn-lg" id="btn-back-to-top">
        <i class="fas fa-arrow-up icon"></i>
    </button>

    <div id="app">

        <div class="loaded">
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm sticky-xxl-top">
                <div class="container">
                    <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                        <div class="logo_sito">
                            <img src="{{ asset('storage/img/BoolBnB-logo.png') }}" class="img-fluid" alt="">
                        </div>
                        {{-- config('app.name', 'Laravel') --}}
                    </a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item">

                                <a class="nav-link  @if (Route::current()->getName() == 'home') active @endif" href="{{ url('/') }}">{{ __('Home') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link  @if (Route::current()->getName() == 'apartments.index') active @endif" href="{{ url('/apartments') }}">{{ __('Apartments') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link  @if (Route::current()->getName() == 'about') active @endif" href="{{ url('/about') }}">{{ __('About us') }}</a>
                            </li>
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                            @endif
                            @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                    @if (!Auth::user()->name and Auth::user()->surname)
                                    {{ Auth::user()->surname }}
                                    @endif
                                    @if (!Auth::user()->name and !Auth::user()->surname)
                                    User {{ Auth::user()->id }}
                                    @endif
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('dashboard') }}">{{ __('Dashboard') }}</a>
                                    <a class="dropdown-item" href="{{ url('ur/profile') }}">{{ __('Profile') }}</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>

            <main class="">
                @yield('content')
            </main>
            {{--
        @dd(Route::currentRouteName()) --}}
            {{-- @dd(Route::current()->getPrefix()) --}}
            @if (Route::currentRouteName() != 'dashboard.index' && Route::currentRouteName() != 'apartment.index')
                <footer class="container-fluid footer">
                    <div class="container pt-3">
                        <div class="row align-items-center">
                            <div class="col-6 pe-5">
                                <a href="#"><img src="{{ asset('storage/img/BoolBnB-logo.png') }}"
                                        style="width: 120px;" alt="logo"></a>
                                <p class="mt-3 d-lg-block d-md-none d-sm-none footer-slogan">We improve your journey
                                    experience with a
                                    vast
                                    selection of
                                    comfy and
                                    welcoming apartments all over the world. Whether you're looking for a refuge in the
                                    mountains or beach house, we are here to help you finding the perfect place to relax
                                    and
                                    enjoy unbelievable adventures. <br>
                                    <strong>Your journey begins with us!</strong>
                                </p>
                            </div>
                            <div class="col-6  text-end">
                                <h4>Explore</h4>
                                <ul class="footer-menu">
                                    <li><a class="hover-color" href="{{ url('/') }}">Home</a></li>
                                    <li><a class="hover-color" href="{{ url('/apartments') }}">Apartments</a></li>
                                    <li><a class="hover-color" href="{{ url('/about') }}">About us</a></li>
                                </ul>
                            </div>
                            <div class="col-12 my-3 text-center">
                                <div class="text-center align-self-end ">
                                    <small class="">Copyright &copy;
                                        <script>
                                            document.write(new Date().getFullYear())
                                        </script><strong> BoolBnB</strong>
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            @endif

        </div>
        @yield('script')
</body>

</html>