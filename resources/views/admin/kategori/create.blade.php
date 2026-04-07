@extends('layouts.admin')
@section('title', 'Tambah Kategori')
@section('page-title', 'Tambah Kategori')

@section('content')
<div class="row">
    <div class="col-md-5">
        <div class="panel-card">
            <div class="panel-card__header">
                <h2 class="panel-card__title">Form Tambah Kategori</h2>
            </div>
            <div class="panel-card__body">
                <form action="{{ route('admin.kategori.store') }}" method="POST">
                    @csrf
                    <div style="margin-bottom:1rem;">
                        <label class="admin-label">Nama Kategori</label>
                        <x-input name="nama_kategori" placeholder="Nama Kategori" />
                    </div>
                    <div style="display:flex;gap:.5rem;">
                        <button type="submit" class="btn-teal">
                            <i class="bi bi-save"></i> Simpan
                        </button>
                        <a href="{{ route('admin.kategori.index') }}" class="btn-outline-gray">
                            Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection