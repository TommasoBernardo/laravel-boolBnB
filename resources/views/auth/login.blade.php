@extends('layouts.app')

@section('content')
{{-- <div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-4 row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4 row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<div class="container-fluid" id="wrapper">
    <div class="row">
        <div class="col-lg-8 d-none d-lg-block background-image"></div>
        <div class="col-lg-4">
            <div class="login-form">
                <div class=" rounded-3 text-black">
                    <div class="row g-0">
                      
                        <div class=" p-md-5 mx-md-4">
          
                          <div class="text-center">
                            <img src="{{asset('storage/img/BoolBnB-logo.png')}}"
                              style="width: 185px;" alt="logo">
                            <h4 class="my-3 pb-1">Accedi</h4>
                          </div>
          
                          <form method="POST" action="{{ route('login') }}"> 
                            @csrf

                            <div class="form-outline mb-4">
                                <label class="form-label" for="form2Example11">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    placeholder="Inserisci la tua email" value="{{ old('email') }}" required autocomplete="email" name="email" autofocus />

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>
          
                            <div class=" mb-4">
                                <label class="form-label" for="form2Example22">Password</label>
                                <input type="password" id="form2Example22" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Inserisci la tua password" required autocomplete="current-password"/>

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
          
                            <div class="text-center pt-1 mb-5 pb-1">
                              <button type="submit" class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="button">Accedi</button>
                            </div>
          
                            <div class="text-center pb-4">
                              <p class="mb-0 me-2">Non hai un account? Creane uno!</p>
                              <a href="{{ route('register') }}" class="btn btn-outline-danger mt-3">Crea account</a>
                            </div>
          
                          </form>
          
                        </div>
                      
                    </div>
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection
