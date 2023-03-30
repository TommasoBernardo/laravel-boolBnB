@extends('layouts.app')


@section('content')
    @include('ur.apartment.shared.formCreateEdit', [
        'route' => 'apartment.update',
        'methodRoute' => 'PATCH',
        'bottone' => 'Edit',
    ])
@endsection

@section('script')
    @vite(['resources/js/searchBox.js'])
@endsection
