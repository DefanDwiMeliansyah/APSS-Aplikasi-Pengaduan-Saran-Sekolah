@extends('layouts.admin')
@section('title', 'Laporan & Aspirasi')
@section('page-title', 'Laporan & Aspirasi')

@section('content')

@if (session('success'))
    <div class="alert-success-inline">
        <i class="bi bi-check-circle"></i> {{ session('success') }}
    </div>
@endif

<div class="panel-card">
    {{-- Filter bar --}}
    <div class="panel-card__header">
        <h2 class="panel-card__title">Daftar Laporan</h2>
        <form method="GET" action="{{ route('admin.laporan.index') }}" style="display:flex;gap:.5rem;align-items:center;flex-wrap:wrap;">
            <select name="status" class="admin-select" style="width:auto;" onchange="this.form.submit()">
                <option value="">Semua Status</option>
                <option value="belum" {{ request('status') === 'belum'   ? 'selected' : '' }}>Belum Diproses</option>
                <option value="proses" {{ request('status') === 'proses' ? 'selected' : '' }}>Proses</option>
                <option value="selesai" {{ request('status') === 'selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
            @if(request('status'))
                <a href="{{ route('admin.laporan.index') }}" class="btn-outline-gray" style="padding:.45rem .875rem;font-size:.82rem;">
                    Reset
                </a>
            @endif
        </form>
    </div>

    {{-- Table --}}
    <div class="panel-card__body--flush table-responsive">
        @include('admin.laporan.list')
    </div>

    {{-- Pagination --}}
    <div class="panel-card__footer">
        {{ $laporan->links() }}
    </div>
</div>

@endsection