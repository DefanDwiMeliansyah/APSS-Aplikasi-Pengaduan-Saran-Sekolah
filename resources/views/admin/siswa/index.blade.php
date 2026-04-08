@extends('layouts.admin')
@section('title', 'Data Siswa')
@section('page-title', 'Data Siswa')

@section('content')

@if (session('success'))
    <div class="alert-success-inline">
        <i class="bi bi-check-circle"></i> {{ session('success') }}
    </div>
@endif

<div class="panel-card">
    <div class="panel-card__header">
        <h2 class="panel-card__title">Daftar Akun Siswa</h2>
        <div style="display:flex; gap:1rem;">
            <form action="{{ route('admin.siswa.index') }}" method="GET" style="display:flex; gap:0.5rem;">
                <input type="text" name="search" placeholder="Cari NIS atau Nama..." style="padding:.5rem; border:1px solid var(--gray-200); border-radius:.375rem;" value="{{ request('search') }}">
                <button type="submit" class="btn-teal">
                    <i class="bi bi-search"></i>
                </button>
            </form>
            <a href="{{ route('admin.siswa.create') }}" class="btn-teal">
                <i class="bi bi-plus"></i> Tambah Siswa
            </a>
        </div>
    </div>

    <div class="panel-card__body--flush">
        <table class="admin-table">
            <thead>
                <tr>
                    <th style="width:60px;">No</th>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th style="width:160px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($siswa as $item)
                <tr>
                    <td style="color:var(--gray-400);font-size:.8rem;">{{ $loop->iteration + $siswa->firstItem() - 1 }}</td>
                    <td style="font-weight:500;">{{ $item->nis }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->kelas }}</td>
                    <td>
                        <div style="display:flex;gap:.375rem;">
                            <a href="{{ route('admin.siswa.edit', $item->id) }}"
                               class="btn-sm-action btn-sm-action--warning">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <form action="{{ route('admin.siswa.destroy', $item->id) }}"
                                  method="POST" style="display:inline;"
                                  onsubmit="return confirm('Hapus profil siswa ini?')">
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
                    <td colspan="5"
                        style="text-align:center;padding:2.5rem;color:var(--gray-400);">
                        Belum ada data siswa
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="panel-card__footer">
        {{ $siswa->links() }}
    </div>
</div>

@endsection
