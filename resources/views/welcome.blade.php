@extends('layouts.landing')

@section('title', 'Beranda')

@section('content')
    @include('landing.hero')
    @include('landing.features')
    @include('landing.how-it-works')
@endsection