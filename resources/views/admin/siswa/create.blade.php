@extends('layouts.admin')
@section('title', 'Tambah Siswa')
@section('page-title', 'Tambah Siswa')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="panel-card">
            <div class="panel-card__header">
                <h2 class="panel-card__title">Form Tambah Siswa</h2>
            </div>
            <div class="panel-card__body">
                <form action="{{ route('admin.siswa.store') }}" method="POST">
                    @csrf
                    <div style="margin-bottom:1rem;">
                        <label class="admin-label">NIS</label>
                        <input type="text" name="nis" class="admin-input" placeholder="Masukkan NIS" value="{{ old('nis') }}" required>
                        @error('nis')
                            <div style="color:var(--danger);font-size:.875rem;margin-top:.25rem;">{{ $message }}</div>
                        @enderror
                    </div>
                    <div style="margin-bottom:1rem;">
                        <label class="admin-label">Nama Lengkap</label>
                        <input type="text" name="nama" class="admin-input" placeholder="Masukkan Nama Siswa" value="{{ old('nama') }}" required>
                        @error('nama')
                            <div style="color:var(--danger);font-size:.875rem;margin-top:.25rem;">{{ $message }}</div>
                        @enderror
                    </div>
                    <div style="margin-bottom:1rem;">
                        <label class="admin-label">Kelas</label>
                        <input type="text" name="kelas" class="admin-input" placeholder="Contoh: XII RPL 1" value="{{ old('kelas') }}" required>
                        @error('kelas')
                            <div style="color:var(--danger);font-size:.875rem;margin-top:.25rem;">{{ $message }}</div>
                        @enderror
                    </div>
                    <div style="margin-bottom:1.5rem;">
                        <label class="admin-label">Password</label>
                        <input type="password" name="password" class="admin-input" placeholder="Masukkan password (minimal 6 karakter)" required>
                        @error('password')
                            <div style="color:var(--danger);font-size:.875rem;margin-top:.25rem;">{{ $message }}</div>
                        @enderror
                    </div>
                    <div style="display:flex;gap:.5rem;">
                        <button type="submit" class="btn-teal">
                            <i class="bi bi-save"></i> Simpan
                        </button>
                        <a href="{{ route('admin.siswa.index') }}" class="btn-outline-gray">
                            Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
