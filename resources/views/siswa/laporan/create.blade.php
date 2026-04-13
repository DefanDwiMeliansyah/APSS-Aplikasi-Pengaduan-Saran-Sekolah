@extends('layouts.siswa')
@section('title', 'Buat Laporan Pengaduan')

@section('content')
<div style="max-width:520px;">
    <div class="page-card">
        <div class="page-card__header">
            <h1 class="page-card__title">Buat Laporan Pengaduan</h1>
        </div>
        <div class="page-card__body">
            <form action="{{ route('siswa.laporan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Kategori --}}
                <div style="margin-bottom:1rem;">
                    <label class="siswa-label">Kategori</label>
                    <x-searchable-select name="kategori_id"
                        :options="$kategori" label-field="nama_kategori"
                        placeholder="Ketik untuk mencari kategori..." />
                </div>

                {{-- Lokasi --}}
                <div style="margin-bottom:1rem;">
                    <label class="siswa-label">Lokasi Kejadian</label>
                    <x-searchable-select name="lokasi_id"
                        :options="$lokasi" label-field="nama_lokasi"
                        placeholder="Ketik untuk mencari lokasi..." />
                </div>

                {{-- Keterangan --}}
                <div style="margin-bottom:1rem;">
                    <label class="siswa-label">Keterangan</label>
                    <x-textarea label="Keterangan" name="ket"
                        placeholder="Masukkan keterangan..." rows="5" />
                </div>

                {{-- Foto Pengaduan --}}
                <div style="margin-bottom:1.5rem;">
                    <label class="siswa-label">Foto (Opsional)</label>
                    <input type="file" name="foto_pengaduan" accept="image/jpeg,image/png,image/jpg" style="display:block;width:100%;padding:0.5rem;border:1px solid var(--gray-200);border-radius:0.375rem;font-size:0.875rem;">
                    <small style="color:var(--gray-500);font-size:0.75rem;margin-top:0.25rem;display:block;">Maksimal ukuran 2MB (JPG, JPEG, PNG)</small>
                    @error('foto_pengaduan')
                        <div style="color:var(--danger);font-size:.875rem;margin-top:.25rem;">{{ $message }}</div>
                    @enderror
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
