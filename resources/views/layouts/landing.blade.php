@extends('layouts.main')

@push('css')
<style>
    :root {
        --teal-50:  #f0fdfa;
        --teal-100: #ccfbf1;
        --teal-200: #99f6e4;
        --teal-500: #14b8a6;
        --teal-600: #0d9488;
        --teal-700: #0f766e;
        --teal-800: #115e59;
        --teal-900: #134e4a;
        --gray-50:  #f9fafb;
        --gray-100: #f3f4f6;
        --gray-200: #e5e7eb;
        --gray-400: #9ca3af;
        --gray-500: #6b7280;
        --gray-600: #4b5563;
        --gray-700: #374151;
        --gray-900: #111827;
    }

    html { scroll-behavior: smooth; }

    body {
        background-color: #ffffff;
        color: var(--gray-700);
        line-height: 1.6;
    }

    /* ── Utility ── */
    .text-teal   { color: var(--teal-700); }
    .bg-teal     { background-color: var(--teal-700); }
    .btn-teal {
        background-color: var(--teal-700);
        color: #fff;
        border: none;
        padding: .625rem 1.5rem;
        border-radius: 8px;
        font-weight: 600;
        font-size: .9375rem;
        text-decoration: none;
        display: inline-block;
        transition: background-color .2s, transform .15s;
    }
    .btn-teal:hover {
        background-color: var(--teal-800);
        color: #fff;
        transform: translateY(-1px);
    }
    .btn-outline-teal {
        background-color: transparent;
        color: var(--teal-700);
        border: 1.5px solid var(--teal-700);
        padding: .625rem 1.5rem;
        border-radius: 8px;
        font-weight: 600;
        font-size: .9375rem;
        text-decoration: none;
        display: inline-block;
        transition: all .2s;
    }
    .btn-outline-teal:hover {
        background-color: var(--teal-700);
        color: #fff;
        transform: translateY(-1px);
    }
</style>
@endpush

@section('body')
    @include('landing._navbar')
    @yield('content')
    @include('landing._footer')
@endsection
