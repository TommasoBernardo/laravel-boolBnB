@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">
        {{ __('Dashboard') }}
    </h2>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('User Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <div class="card w-50 mt-3">
                        <div class="card-body">
                          <h5 class="card-title"> Welcome  {{Auth::user()->name }}  {{Auth::user()->surname }} </h5>
                          <p class="card-text"> Your email:  {{Auth::user()->email }}</p>
                          <p class="card-text"> Your date of birth:  {{Auth::user()->date_of_birth }}</p>
                        </div>
                      </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
