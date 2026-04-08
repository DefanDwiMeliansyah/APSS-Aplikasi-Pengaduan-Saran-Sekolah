@extends('layouts.auth')
@section('title', 'Daftar Siswa')

{{-- Panel kiri --}}
@section('auth-left')
<div class="auth-panel-left">
    <div class="auth-panel-left__brand">APSS</div>

    <div>
        <p class="auth-panel-left__quote">
            Bergabung dan<br>jadikan sekolah<br>lebih baik.
        </p>
        <p class="auth-panel-left__sub">
            Daftarkan dirimu dalam hitungan detik dan
            mulai berkontribusi untuk perbaikan fasilitas sekolah.
        </p>
    </div>

    <div class="auth-panel-left__badges">
        <div class="auth-badge">
            <i class="bi bi-pencil-square"></i>
            <span>Lapor masalah fasilitas dengan mudah</span>
        </div>
        <div class="auth-badge">
            <i class="bi bi-chat-left-dots"></i>
            <span>Terima tanggapan langsung dari admin</span>
        </div>
    </div>
</div>
@endsection

{{-- Form --}}
@section('content')
<h1 class="auth-form-box__title">Buat Akun</h1>
<p class="auth-form-box__subtitle">Isi data diri kamu untuk mendaftar sebagai siswa.</p>

<form method="POST" action="{{ route('siswa.register') }}">
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
                value="{{ old('nis', $nis ?? '') }}"
                class="{{ $errors->has('nis') ? 'is-invalid' : '' }}"
                autocomplete="off">
        </div>
        @error('nis')
            <div class="field-error">{{ $message }}</div>
        @enderror
    </div>

    {{-- Nama --}}
    <div class="auth-field">
        <label for="nama">Nama Lengkap</label>
        <div class="field-wrap">
            <i class="bi bi-card-text field-icon"></i>
            <input
                type="text"
                id="nama"
                name="nama"
                placeholder="Tulis nama lengkap kamu"
                value="{{ old('nama') }}"
                class="{{ $errors->has('nama') ? 'is-invalid' : '' }}"
                autocomplete="name">
        </div>
        @error('nama')
            <div class="field-error">{{ $message }}</div>
        @enderror
    </div>

    {{-- Kelas --}}
    <div class="auth-field">
        <label for="kelas">Kelas</label>
        <div class="field-wrap">
            <i class="bi bi-mortarboard field-icon"></i>
            <input
                type="text"
                id="kelas"
                name="kelas"
                placeholder="Contoh: X PPLG 2"
                value="{{ old('kelas') }}"
                class="{{ $errors->has('kelas') ? 'is-invalid' : '' }}"
                autocomplete="off">
        </div>
        @error('kelas')
            <div class="field-error">{{ $message }}</div>
        @enderror
    </div>

    {{-- Password --}}
    <div class="auth-field" style="margin-top:1.25rem;">
        <label for="password">Password</label>
        <div class="field-wrap">
            <i class="bi bi-lock field-icon"></i>
            <input
                type="password"
                id="password"
                name="password"
                placeholder="Buat password (min. 6 karakter)"
                class="{{ $errors->has('password') ? 'is-invalid' : '' }}"
                autocomplete="new-password">
        </div>
        @error('password')
            <div class="field-error">{{ $message }}</div>
        @enderror
    </div>

    {{-- Konfirmasi Password --}}
    <div class="auth-field" style="margin-top:1.25rem;">
        <label for="password_confirmation">Konfirmasi Password</label>
        <div class="field-wrap">
            <i class="bi bi-lock-fill field-icon"></i>
            <input
                type="password"
                id="password_confirmation"
                name="password_confirmation"
                placeholder="Ulangi password"
                autocomplete="new-password">
        </div>
    </div>

    <button type="submit" class="auth-btn" style="margin-top:1.5rem;">
        Buat Akun
    </button>
</form>

<p class="auth-alt-link">
    Sudah punya akun? <a href="{{ route('siswa.login') }}">Masuk di sini</a>
</p>
@endsection
