@extends('layouts.app')

@section('content')

<div class="container-fluid" id="wrapper">
    <div class="row d-flex align-items-center">
        <div class="col-lg-6 p-5">
            <div class="text-center">
                <img src="{{asset('storage/img/BoolBnB-logo.png')}}" style="width: 140px;" alt="logo">
                <h4 class="my-4 pb-1">Registrati</h4>
            </div>
            <form method="POST" id="formRegister" action="{{ route('register') }}">
                @csrf
                <div class="mb-4 row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control  @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" minlength="3" maxlength="255">

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="mb-4 row">
                    <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Cognome') }}</label>

                    <div class="col-md-6">
                        <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" minlength="3" maxlength="150">

                        @error('surname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="mb-4 row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo Email *') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required minlength="8" maxlength="255">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="mb-4 row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password *') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required minlength="8">


                        <span class="invalid-feedback" id="errorMex" role="alert">
                            <strong> Password diversa </strong>
                        </span>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="mb-4 row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Conferma Password *') }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>
                </div>

                <script>
                    const form = document.getElementById('formRegister')

                    form.addEventListener('submit', (event) => {
                        const password = document.getElementById('password').value
                        const passwordConferma = document.getElementById('password-confirm').value

                        if (password != passwordConferma) {
                            event.preventDefault()
                            const mexErrore = document.getElementById('errorMex').classList.add('d-block')
                        }

                    })

                    document.getElementById('password-confirm').addEventListener('click', () => {
                        document.getElementById('errorMex').classList.remove('d-block')
                    })
                </script>

                <div class="mb-4 row">
                    <label for="date_of_birth" class="col-md-4 col-form-label text-md-right">{{ __('Data di nascita') }}</label>

                    <div class="col-md-6">
                        <input id="date_of_birth" type="date" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{ old('date_of_birth') }}">

                        @error('date_of_birth')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="mb-4 row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Registrati') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-6 d-none d-lg-block background-image-2"></div>
    </div>
</div>
@endsection