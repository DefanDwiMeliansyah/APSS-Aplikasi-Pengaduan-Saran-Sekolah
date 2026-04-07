@extends('layouts.landing')

@section('title', 'Beranda')

@section('content')
    @include('landing._hero')
    @include('landing._features')
    @include('landing._how_it_works')
@endsection