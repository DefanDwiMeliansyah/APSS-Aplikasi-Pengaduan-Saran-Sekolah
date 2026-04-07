@extends('layouts.auth')
@section('title', 'Masuk Siswa')

{{-- Panel kiri --}}
@section('auth-left')
<div class="auth-panel-left">
    <div class="auth-panel-left__brand">APSS</div>

    <div>
        <p class="auth-panel-left__quote">
            Suaramu penting<br>untuk sekolah kita.
        </p>
        <p class="auth-panel-left__sub">
            Masuk dan sampaikan laporan fasilitas sekolah
            dengan mudah. Kami pastikan setiap laporan ditindaklanjuti.
        </p>
    </div>

    <div class="auth-panel-left__badges">
        <div class="auth-badge">
            <i class="bi bi-pencil-square"></i>
            <span>Buat laporan & aspirasi </span>
        </div>
        <div class="auth-badge">
            <i class="bi bi-activity"></i>
            <span>Pantau status laporan</span>
        </div>
    </div>
</div>
@endsection

{{-- Form --}}
@section('content')
<h1 class="auth-form-box__title">Selamat Datang</h1>
<p class="auth-form-box__subtitle">Masuk dengan NIS kamu untuk mulai melaporkan.</p>

@if ($errors->has('auth'))
    <div style="background:#fef2f2;border:1px solid #fca5a5;border-radius:8px;padding:.75rem 1rem;margin-bottom:1.25rem;font-size:.85rem;color:#dc2626;">
        <i class="bi bi-exclamation-circle me-1"></i>
        {{ $errors->first('auth') }}
    </div>
@endif

<form method="POST" action="{{ route('siswa.login') }}">
    @csrf

    {{-- NIS --}}
    <div class="auth-field">
        <label for="nis">NIS (Nomor Induk Siswa)</label>
        <div class="field-wrap">
            <i class="bi bi-person field-icon"></i>
            <input
                type="text"
                id="nis"
                name="nis"
                placeholder="Masukkan NIS kamu"
                value="{{ old('nis') }}"
                class="{{ $errors->has('nis') ? 'is-invalid' : '' }}"
                autocomplete="username">
        </div>
        @error('nis')
            <div class="field-error">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="auth-btn">
        Masuk
    </button>
</form>

<p class="auth-alt-link">
    Belum punya akun? <a href="{{ route('siswa.register') }}">Daftar sekarang</a>
</p>
@endsection
