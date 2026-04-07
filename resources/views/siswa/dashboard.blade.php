@extends('layouts.siswa')

@section('content')

@if (session('success'))
    <div class="alert-success-s">
        <i class="bi bi-check-circle"></i> {{ session('success') }}
    </div>
@endif

<div class="page-card">
    <div class="page-card__header">
        <h1 class="page-card__title">Laporan Saya</h1>
        <a href="{{ route('siswa.laporan.create') }}" class="btn-primary-s">
            <i class="bi bi-plus-circle"></i> Buat Pengaduan
        </a>
    </div>

    <div class="page-card__body--flush" style="overflow-x:auto;">
        @include('siswa.partials.list-dashboard')
    </div>

    <div class="page-card__footer">
        {{ $laporan->links() }}
    </div>
</div>

@endsection