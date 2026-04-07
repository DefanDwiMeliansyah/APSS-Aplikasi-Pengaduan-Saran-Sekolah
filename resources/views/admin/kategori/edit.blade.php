@extends('layouts.admin')
@section('title', 'Edit Kategori')
@section('page-title', 'Edit Kategori')

@section('content')
<div class="row">
    <div class="col-md-5">
        <div class="panel-card">
            <div class="panel-card__header">
                <h2 class="panel-card__title">Edit Kategori</h2>
            </div>
            <div class="panel-card__body">
                <form action="{{ route('admin.kategori.update', $kategori->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div style="margin-bottom:1rem;">
                        <label class="admin-label">Nama Kategori</label>
                        <x-input name="nama_kategori" :value="$kategori->nama_kategori" placeholder="Nama Kategori" />
                    </div>
                    <div style="display:flex;gap:.5rem;">
                        <button type="submit" class="btn-teal">
                            <i class="bi bi-save"></i> Update
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