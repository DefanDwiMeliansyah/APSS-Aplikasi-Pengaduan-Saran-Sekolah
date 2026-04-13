@extends('layouts.admin')
@section('title', 'Lokasi')
@section('page-title', 'Lokasi')

@section('content')

@if (session('success'))
    <div class="alert-success-inline">
        <i class="bi bi-check-circle"></i> {{ session('success') }}
    </div>
@endif

<div class="panel-card">
    <div class="panel-card__header">
        <h2 class="panel-card__title">Daftar Lokasi</h2>
        <a href="{{ route('admin.lokasi.create') }}" class="btn-teal">
            <i class="bi bi-plus"></i> Tambah Lokasi
        </a>
    </div>

    <div class="panel-card__body--flush">
        <table class="admin-table">
            <thead>
                <tr>
                    <th style="width:60px;">No</th>
                    <th>Nama Lokasi</th>
                    <th style="width:160px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($lokasi as $item)
                <tr>
                    <td style="color:var(--gray-400);font-size:.8rem;">{{ $loop->iteration + ($lokasi->firstItem() - 1) }}</td>
                    <td style="font-weight:500;">{{ $item->nama_lokasi }}</td>
                    <td>
                        <div style="display:flex;gap:.375rem;">
                            <a href="{{ route('admin.lokasi.edit', $item->id) }}"
                               class="btn-sm-action btn-sm-action--warning">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <form action="{{ route('admin.lokasi.destroy', $item->id) }}"
                                  method="POST" style="display:inline;"
                                  onsubmit="return confirm('Hapus lokasi ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-sm-action btn-sm-action--danger">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3"
                        style="text-align:center;padding:2.5rem;color:var(--gray-400);">
                        Belum ada lokasi
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="panel-card__footer">
        {{ $lokasi->links() }}
    </div>
</div>

@endsection
