@extends('layouts.siswa')
@section('title', 'Buat Laporan Pengaduan')

@section('content')
<div style="max-width:520px;">
    <div class="page-card">
        <div class="page-card__header">
            <h1 class="page-card__title">Buat Laporan Pengaduan</h1>
        </div>
        <div class="page-card__body">
            <form action="{{ route('siswa.laporan.store') }}" method="POST">
                @csrf

                {{-- Kategori --}}
                <div style="margin-bottom:1rem;">
                    <label class="siswa-label">Kategori</label>
                    <x-select label="Kategori" name="kategori_id"
                        :options="$kategori" label-field="nama_kategori" />
                </div>

                {{-- Lokasi --}}
                <div style="margin-bottom:1rem;">
                    <label class="siswa-label">Lokasi Kejadian</label>
                    <x-input label="Lokasi Kejadian" name="lokasi"
                        placeholder="Contoh: Ruang Kelas X RPL A" />
                </div>

                {{-- Keterangan --}}
                <div style="margin-bottom:1.5rem;">
                    <label class="siswa-label">Keterangan</label>
                    <x-textarea label="Keterangan" name="ket"
                        placeholder="Masukkan keterangan..." rows="5" />
                </div>

                <div style="display:flex;gap:.5rem;">
                    <button type="submit" class="btn-primary-s">
                        <i class="bi bi-send"></i> Kirim Laporan
                    </button>
                    <a href="{{ route('siswa.dashboard') }}" class="btn-secondary-s">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
