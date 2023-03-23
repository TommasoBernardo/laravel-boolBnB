@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div id="my-height" class="bg-dark col col-lg-2 col-md-4  d-flex flex-column justify-content-between">
                <div class="bg-dark p-2 ">
                    <ul class="nav nav-pills flex-column mt-4">
                        <li class="nav-item py-2 py-sm-0">
                            <a href="{{ route('dashboard.index') }}" class="nav-link text-white">
                                <i class="fs-5 fa fa-gauge"></i><span class="fs-5 ms-3 d-none d-sm-inline">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item py-2 py-sm-0">
                            <a href="{{ route('apartment.index') }}" class="nav-link text-white">
                                <i class="fs-5 fa fa-house"></i><span class="fs-5 ms-3 d-none d-sm-inline">Apartments</span>
                            </a>
                        </li>
                        <li class="nav-item py-2 py-sm-0">
                            <a href="#" class="nav-link text-white">
                                <i class="fs-5 fa fa-comments"></i><span
                                    class="fs-5 ms-3 d-none d-sm-inline">Messages</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col col-lg-10">
                @include('partials.dash-user-info')
            </div>


        </div>
    </div>
@endsection

@section('script')
    @vite(['resources/js/popupDelete.js'])
@endsection
