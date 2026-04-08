@extends('layouts.admin')
@section('title', 'Edit Siswa')
@section('page-title', 'Edit Siswa')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="panel-card">
            <div class="panel-card__header">
                <h2 class="panel-card__title">Form Edit Siswa</h2>
            </div>
            <div class="panel-card__body">
                <form action="{{ route('admin.siswa.update', $siswa->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div style="margin-bottom:1rem;">
                        <label class="admin-label">NIS</label>
                        <input type="text" name="nis" class="admin-input" placeholder="Masukkan NIS" value="{{ old('nis', $siswa->nis) }}" required>
                        @error('nis')
                            <div style="color:var(--danger);font-size:.875rem;margin-top:.25rem;">{{ $message }}</div>
                        @enderror
                    </div>
                    <div style="margin-bottom:1rem;">
                        <label class="admin-label">Nama Lengkap</label>
                        <input type="text" name="nama" class="admin-input" placeholder="Masukkan Nama Siswa" value="{{ old('nama', $siswa->nama) }}" required>
                        @error('nama')
                            <div style="color:var(--danger);font-size:.875rem;margin-top:.25rem;">{{ $message }}</div>
                        @enderror
                    </div>
                    <div style="margin-bottom:1rem;">
                        <label class="admin-label">Kelas</label>
                        <input type="text" name="kelas" class="admin-input" placeholder="Contoh: XII RPL 1" value="{{ old('kelas', $siswa->kelas) }}" required>
                        @error('kelas')
                            <div style="color:var(--danger);font-size:.875rem;margin-top:.25rem;">{{ $message }}</div>
                        @enderror
                    </div>
                    <div style="margin-bottom:1.5rem;">
                        <label class="admin-label">Password</label>
                        <input type="password" name="password" class="admin-input" placeholder="Kosongkan jika tidak ingin mengubah password">
                        <small style="color:var(--gray-500);font-size:0.8rem;display:block;margin-top:0.25rem;">Isi kolom ini hanya jika ingin mengatur ulang password siswa.</small>
                        @error('password')
                            <div style="color:var(--danger);font-size:.875rem;margin-top:.25rem;">{{ $message }}</div>
                        @enderror
                    </div>
                    <div style="display:flex;gap:.5rem;">
                        <button type="submit" class="btn-teal">
                            <i class="bi bi-save"></i> Perbarui
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
