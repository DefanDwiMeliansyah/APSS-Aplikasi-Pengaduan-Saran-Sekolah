@extends('layouts.siswa')
@section('title', 'Detail Laporan')

@section('content')
<div class="page-card">
    <div class="page-card__header">
        <h1 class="page-card__title">Detail Laporan</h1>

        {{-- Status badge --}}
        @php
            $st  = $laporan->aspirasi?->status ?? 'menunggu';
            $cls = match($st) {
                'selesai' => 'badge-s--selesai',
                'proses'  => 'badge-s--proses',
                default   => 'badge-s--menunggu',
            };
            $label = match($st) { 'selesai' => 'Selesai', 'proses' => 'Diproses', default => 'Menunggu' };
        @endphp
        <span class="badge-s {{ $cls }}">{{ $label }}</span>
    </div>

    <div class="page-card__body">
        <div class="row" style="display:flex;flex-wrap:wrap;gap:1.5rem;">

            {{-- Info laporan --}}
            <div style="flex:1;min-width:260px;">
                <div class="detail-item">
                    <div class="detail-item__label">Kategori</div>
                    <div class="detail-item__value">{{ $laporan->kategori->nama_kategori ?? '-' }}</div>
                </div>
                <div class="detail-item">
                    <div class="detail-item__label">Lokasi Kejadian</div>
                    <div class="detail-item__value">{{ $laporan->lokasi }}</div>
                </div>
                <div class="detail-item">
                    <div class="detail-item__label">Keterangan</div>
                    <div class="detail-item__value">{{ $laporan->ket }}</div>
                </div>
                <div class="detail-item">
                    <div class="detail-item__label">Tanggal & Waktu Laporan</div>
                    <div class="detail-item__value">{{ $laporan->created_at->format('d M Y H:i') }} WIB</div>
                </div>
            </div>

            {{-- Status & aksi --}}
            <div style="flex:1;min-width:220px;">
                @include('siswa.laporan.tanggapan')
                @if ($laporan->aspirasi?->status === 'selesai')
                    @include('siswa.laporan.feedback')
                @endif
            </div>
        </div>

        <div style="margin-top:1.25rem;padding-top:1rem;border-top:1px solid var(--gray-100);">
            <a href="{{ route('siswa.dashboard') }}" class="btn-secondary-s">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
</div>
@endsection