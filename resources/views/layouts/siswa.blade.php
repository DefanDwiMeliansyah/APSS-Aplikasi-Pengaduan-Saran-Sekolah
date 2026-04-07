@extends('layouts.main')

@push('css')
    @include('siswa.partials.siswa-styles')
@endpush

@section('body')
    @include('siswa.partials.navbar')

    <div class="siswa-page">
        @yield('content')
    </div>
@endsection