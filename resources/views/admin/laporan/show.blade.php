@extends('layouts.admin')
@section('title', 'Detail Laporan')
@section('page-title', 'Detail Laporan')

@section('content')

@if (session('success'))
    <div class="alert-success-inline">
        <i class="bi bi-check-circle"></i> {{ session('success') }}
    </div>
@endif

<div class="row g-3">
    {{-- Detail --}}
    <div class="col-lg-8">
        @include('admin.laporan.detil')
    </div>

    {{-- Update status --}}
    <div class="col-lg-4">
        @include('admin.laporan.form-status')
    </div>
</div>

@endsection