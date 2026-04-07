@extends('layouts.main')

@push('css')
    @include('admin.partials.admin-styles')
@endpush

@section('body')
<div class="admin-wrap">
    {{-- Sidebar --}}
    @include('admin.partials.sidebar')

    {{-- Main area --}}
    <div class="admin-main">
        @include('admin.partials.topbar')

        <main class="admin-content">
            @yield('content')
        </main>
    </div>
</div>
@endsection