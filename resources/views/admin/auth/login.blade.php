@extends('layouts.auth')
@section('title', 'Login Admin')

{{-- Panel kiri --}}
@section('auth-left')
<div class="auth-panel-left">
    <div class="auth-panel-left__brand">APSS</div>

    <div>
        <p class="auth-panel-left__quote">
            Panel Manajemen<br>Pengaduan Sekolah.
        </p>
        <p class="auth-panel-left__sub">
            Kelola seluruh laporan dan saran dari siswa
            secara terpusat, efisien, dan real-time.
        </p>
    </div>

    <div class="auth-panel-left__badges">
        <div class="auth-badge">
            <i class="bi bi-clipboard-data"></i>
            <span>Pantau semua laporan masuk</span>
        </div>
        <div class="auth-badge">
            <i class="bi bi-person-check"></i>
            <span>Akses khusus administrator</span>
        </div>
    </div>
</div>
@endsection

{{-- Form --}}
@section('content')
<h1 class="auth-form-box__title">Admin Login</h1>
<p class="auth-form-box__subtitle">Masuk ke panel administrasi APSS.</p>

@if ($errors->has('auth'))
    <div style="background:#fef2f2;border:1px solid #fca5a5;border-radius:8px;padding:.75rem 1rem;margin-bottom:1.25rem;font-size:.85rem;color:#dc2626;">
        <i class="bi bi-exclamation-circle me-1"></i>
        {{ $errors->first('auth') }}
    </div>
@endif

<form method="POST" action="{{ route('admin.login') }}">
    @csrf

    {{-- Username --}}
    <div class="auth-field">
        <label for="username">Username</label>
        <div class="field-wrap">
            <i class="bi bi-person field-icon"></i>
            <input
                type="text"
                id="username"
                name="username"
                placeholder="Masukkan username"
                value="{{ old('username') }}"
                class="{{ $errors->has('username') ? 'is-invalid' : '' }}"
                autocomplete="username">
        </div>
        @error('username')
            <div class="field-error">{{ $message }}</div>
        @enderror
    </div>

    {{-- Password --}}
    <div class="auth-field">
        <label for="password">Password</label>
        <div class="field-wrap">
            <i class="bi bi-lock field-icon"></i>
            <input
                type="password"
                id="password"
                name="password"
                placeholder="Masukkan password"
                class="{{ $errors->has('password') ? 'is-invalid' : '' }}"
                autocomplete="current-password">
            <button type="button" class="toggle-pw" id="toggle-pw" aria-label="Tampilkan password">
                <i class="bi bi-eye" id="icon-password"></i>
            </button>
        </div>
        @error('password')
            <div class="field-error">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="auth-btn">
        Masuk ke Panel Admin
    </button>
</form>
@endsection

@push('js')
<script>
    document.getElementById('toggle-pw').addEventListener('click', function () {
        const pw   = document.getElementById('password');
        const icon = document.getElementById('icon-password');
        const isHidden = pw.type === 'password';
        pw.type = isHidden ? 'text' : 'password';
        icon.classList.toggle('bi-eye',       !isHidden);
        icon.classList.toggle('bi-eye-slash',  isHidden);
    });
</script>
@endpush
