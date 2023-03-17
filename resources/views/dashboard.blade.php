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

            <div class="text-center mt-4">
                <a href="#" class="btn btn-primary">Create item</a>
            </div>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Address</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($apartments as $apartment )
                  <tr>
                    <th scope="row">{{ $apartment->title }}</th>
                    <td>{{ $apartment->address }}</td>
                    <td>
                        <a href="{{route('apartment.show', $apartment->slug)}}" class="btn btn-primary">Show</a>
                        <a href="#" class="btn btn-success">Edit</a>
                        <form action="" method="post" class="d-inline-block">
                         @csrf
                         @method('delete')   
                            <a href="#" class="btn btn-danger">Delete</a>
                        </form>
                    </td>
                  </tr>
                  @endforeach  
  
                </tbody>
              </table>

        </div>
    </div>
</div>
@endsection
