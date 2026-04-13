@extends('layouts.admin')
@section('title', 'Edit Lokasi')
@section('page-title', 'Edit Lokasi')

@section('content')
<div class="row">
    <div class="col-md-5">
        <div class="panel-card">
            <div class="panel-card__header">
                <h2 class="panel-card__title">Edit Lokasi</h2>
            </div>
            <div class="panel-card__body">
                <form action="{{ route('admin.lokasi.update', $lokasi->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div style="margin-bottom:1rem;">
                        <label class="admin-label">Nama Lokasi</label>
                        <x-input name="nama_lokasi" :value="$lokasi->nama_lokasi" placeholder="Nama Lokasi" />
                    </div>
                    <div style="display:flex;gap:.5rem;">
                        <button type="submit" class="btn-teal">
                            <i class="bi bi-save"></i> Update
                        </button>
                        <a href="{{ route('admin.lokasi.index') }}" class="btn-outline-gray">
                            Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
