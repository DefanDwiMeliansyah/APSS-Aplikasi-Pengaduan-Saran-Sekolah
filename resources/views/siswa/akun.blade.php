@extends('layouts.siswa')
@section('title', 'Profil Saya')

@section('content')

@if (session('success'))
    <div class="alert-success-s">
        <i class="bi bi-check-circle"></i> {{ session('success') }}
    </div>
@endif

<div style="max-width:480px;">
    <div class="page-card">
        <div class="page-card__header">
            <h1 class="page-card__title">Profil Saya</h1>
        </div>
        <div class="page-card__body">
            <form action="{{ route('siswa.akun.update') }}" method="POST">
                @csrf
                @method('PUT')

                <div style="margin-bottom:1rem;">
                    <label class="siswa-label">NIS</label>
                    <x-input name="nis" :value="$siswa->nis" />
                </div>

                <div style="margin-bottom:1rem;">
                    <label class="siswa-label">Nama Lengkap</label>
                    <x-input name="nama" :value="$siswa->nama" />
                </div>

                <div style="margin-bottom:1.5rem;">
                    <label class="siswa-label">Kelas</label>
                    <x-input name="kelas" :value="$siswa->kelas" />
                </div>

                <button type="submit" class="btn-primary-s">
                    <i class="bi bi-save"></i> Simpan Perubahan
                </button>
            </form>
        </div>
    </div>
</div>

@endsection
