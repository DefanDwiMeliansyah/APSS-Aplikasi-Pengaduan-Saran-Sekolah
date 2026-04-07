@extends('layouts.admin')
@section('title', 'Kategori')
@section('page-title', 'Kategori')

@section('content')

@if (session('success'))
    <div class="alert-success-inline">
        <i class="bi bi-check-circle"></i> {{ session('success') }}
    </div>
@endif

<div class="panel-card">
    <div class="panel-card__header">
        <h2 class="panel-card__title">Daftar Kategori</h2>
        <a href="{{ route('admin.kategori.create') }}" class="btn-teal">
            <i class="bi bi-plus"></i> Tambah Kategori
        </a>
    </div>

    <div class="panel-card__body--flush">
        <table class="admin-table">
            <thead>
                <tr>
                    <th style="width:60px;">No</th>
                    <th>Nama Kategori</th>
                    <th style="width:160px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($kategori as $item)
                <tr>
                    <td style="color:var(--gray-400);font-size:.8rem;">{{ $loop->iteration }}</td>
                    <td style="font-weight:500;">{{ $item->nama_kategori }}</td>
                    <td>
                        <div style="display:flex;gap:.375rem;">
                            <a href="{{ route('admin.kategori.edit', $item->id) }}"
                               class="btn-sm-action btn-sm-action--warning">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <form action="{{ route('admin.kategori.destroy', $item->id) }}"
                                  method="POST" style="display:inline;"
                                  onsubmit="return confirm('Hapus kategori ini?')">
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
                        Belum ada kategori
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="panel-card__footer">
        {{ $kategori->links() }}
    </div>
</div>

@endsection