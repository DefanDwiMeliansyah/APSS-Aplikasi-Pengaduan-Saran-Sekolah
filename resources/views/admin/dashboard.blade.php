@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')

{{-- Stat Cards --}}
<div class="row g-3 mb-4">
    <div class="col-6 col-lg-3">
        <div class="stat-card">
            <div class="stat-card__icon stat-card__icon--teal">
                <i class="bi bi-people"></i>
            </div>
            <div>
                <div class="stat-card__value">{{ $totalSiswa ?? 0 }}</div>
                <div class="stat-card__label">Total Siswa</div>
            </div>
        </div>
    </div>

    <div class="col-6 col-lg-3">
        <div class="stat-card">
            <div class="stat-card__icon stat-card__icon--blue">
                <i class="bi bi-clipboard-list"></i>
            </div>
            <div>
                <div class="stat-card__value">{{ $totalLaporan ?? 0 }}</div>
                <div class="stat-card__label">Total Laporan</div>
            </div>
        </div>
    </div>

    <div class="col-6 col-lg-3">
        <div class="stat-card">
            <div class="stat-card__icon stat-card__icon--amber">
                <i class="bi bi-hourglass-split"></i>
            </div>
            <div>
                <div class="stat-card__value">{{ $laporanProses ?? 0 }}</div>
                <div class="stat-card__label">Diproses</div>
            </div>
        </div>
    </div>

    <div class="col-6 col-lg-3">
        <div class="stat-card">
            <div class="stat-card__icon stat-card__icon--green">
                <i class="bi bi-check-circle"></i>
            </div>
            <div>
                <div class="stat-card__value">{{ $laporanSelesai ?? 0 }}</div>
                <div class="stat-card__label">Selesai</div>
            </div>
        </div>
    </div>
</div>

{{-- Tabel laporan terbaru --}}
@include('admin.list-laporan')

@endsection
