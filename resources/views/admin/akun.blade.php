@extends('layouts.admin')
@section('title', 'Pengaturan Akun')
@section('page-title', 'Pengaturan Akun')

@section('content')

@if (session('success'))
    <div class="alert-success-inline">
        <i class="bi bi-check-circle"></i> {{ session('success') }}
    </div>
@endif

<div class="row g-3">
    {{-- Profil --}}
    <div class="col-md-5">
        <div class="panel-card">
            <div class="panel-card__header">
                <h2 class="panel-card__title">Profil Admin</h2>
            </div>
            <div class="panel-card__body">
                <form method="POST" action="{{ route('admin.akun') }}">
                    @csrf
                    <div style="margin-bottom:1rem;">
                        <label class="admin-label">Nama</label>
                        <x-input name="nama" placeholder="Nama" :value="$admin->nama" />
                    </div>
                    <div style="margin-bottom:1.25rem;">
                        <label class="admin-label">Username</label>
                        <x-input name="username" placeholder="Username" :value="$admin->username" />
                    </div>
                    <button type="submit" class="btn-teal">
                        <i class="bi bi-save"></i> Simpan Perubahan
                    </button>
                </form>
            </div>
        </div>
    </div>

    {{-- Password --}}
    <div class="col-md-5">
        <div class="panel-card">
            <div class="panel-card__header">
                <h2 class="panel-card__title">Ganti Password</h2>
            </div>
            <div class="panel-card__body">
                <form method="POST" action="{{ route('admin.akun.password') }}">
                    @csrf
                    <div style="margin-bottom:1rem;">
                        <label class="admin-label">Password Lama</label>
                        <x-input type="password" name="password_lama" placeholder="Password Lama" />
                    </div>
                    <div style="margin-bottom:1rem;">
                        <label class="admin-label">Password Baru</label>
                        <x-input type="password" name="password_baru" placeholder="Password Baru" />
                    </div>
                    <div style="margin-bottom:1.25rem;">
                        <label class="admin-label">Konfirmasi Password Baru</label>
                        <x-input type="password" name="password_baru_confirmation" placeholder="Konfirmasi Password Baru" />
                    </div>
                    <button type="submit" class="btn-outline-gray">
                        <i class="bi bi-key"></i> Ganti Password
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
