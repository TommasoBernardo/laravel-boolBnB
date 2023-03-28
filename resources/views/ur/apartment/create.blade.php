@extends('layouts.app')


@section('content')

@include('ur.apartment.shared.formCreateEdit', ["route" => 'apartment.store', 'methodRoute' => 'POST', "bottone" => 'Save new apartment'])

@endsection

@section('script')

@vite(['resources/js/searchBox.js'])

@endsection