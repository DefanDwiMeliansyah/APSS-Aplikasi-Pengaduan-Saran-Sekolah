@extends('layouts.main')

@push('css')
<style>
    :root {
        --teal-50:  #f0fdfa;
        --teal-100: #ccfbf1;
        --teal-600: #0d9488;
        --teal-700: #0f766e;
        --teal-800: #115e59;
        --gray-100: #f3f4f6;
        --gray-200: #e5e7eb;
        --gray-400: #9ca3af;
        --gray-500: #6b7280;
        --gray-600: #4b5563;
        --gray-700: #374151;
        --gray-900: #111827;
    }

    body { background: var(--gray-100); }

    /* ── Auth wrapper ── */
    .auth-page {
        min-height: 100vh;
        display: flex;
        align-items: stretch;
    }

    /* ── Left panel (decorative) ── */
    .auth-panel-left {
        display: none;
        flex: 0 0 420px;
        background: var(--teal-700);
        background-image:
            radial-gradient(circle at 20% 80%, rgba(255,255,255,.07) 0%, transparent 50%),
            radial-gradient(circle at 80% 20%, rgba(255,255,255,.05) 0%, transparent 50%);
        padding: 3rem;
        flex-direction: column;
        justify-content: space-between;
        color: #fff;
        position: relative;
        overflow: hidden;
    }
    .auth-panel-left::before {
        content: '';
        position: absolute;
        bottom: -80px;
        left: -80px;
        width: 320px;
        height: 320px;
        border-radius: 50%;
        background: rgba(255,255,255,.05);
        pointer-events: none;
    }
    @media (min-width: 960px) {
        .auth-panel-left { display: flex; }
    }
    .auth-panel-left__brand {
        font-size: 1.5rem;
        font-weight: 800;
        letter-spacing: -.04em;
    }
    .auth-panel-left__quote {
        font-size: 1.35rem;
        font-weight: 700;
        line-height: 1.4;
        letter-spacing: -.02em;
        margin-bottom: .75rem;
    }
    .auth-panel-left__sub {
        font-size: .875rem;
        opacity: .75;
        line-height: 1.65;
    }
    .auth-panel-left__badges {
        display: flex;
        flex-direction: column;
        gap: .75rem;
    }
    .auth-badge {
        display: flex;
        align-items: center;
        gap: .75rem;
        background: rgba(255,255,255,.1);
        border-radius: 10px;
        padding: .75rem 1rem;
        font-size: .85rem;
    }
    .auth-badge i { font-size: 1.1rem; opacity: .9; }

    /* ── Right panel (form) ── */
    .auth-panel-right {
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 2rem 1.5rem;
        background: #fff;
    }
    .auth-form-box {
        width: 100%;
        max-width: 400px;
    }
    .auth-form-box__back {
        display: inline-flex;
        align-items: center;
        gap: .375rem;
        font-size: .82rem;
        color: var(--gray-400);
        text-decoration: none;
        margin-bottom: 2rem;
        transition: color .2s;
    }
    .auth-form-box__back:hover { color: var(--teal-700); }
    .auth-form-box__title {
        font-size: 1.625rem;
        font-weight: 800;
        color: var(--gray-900);
        letter-spacing: -.04em;
        margin-bottom: .375rem;
    }
    .auth-form-box__subtitle {
        font-size: .875rem;
        color: var(--gray-400);
        margin-bottom: 2rem;
        line-height: 1.55;
    }

    /* ── Form fields ── */
    .auth-field {
        margin-bottom: 1.125rem;
    }
    .auth-field label {
        display: block;
        font-size: .8rem;
        font-weight: 600;
        color: var(--gray-600);
        margin-bottom: .4rem;
        letter-spacing: .01em;
    }
    .auth-field .field-wrap {
        position: relative;
    }
    .auth-field .field-icon {
        position: absolute;
        left: .875rem;
        top: 50%;
        transform: translateY(-50%);
        color: var(--gray-400);
        font-size: .95rem;
        pointer-events: none;
    }
    .auth-field input {
        width: 100%;
        border: 1.5px solid var(--gray-200);
        border-radius: 9px;
        padding: .7rem 1rem .7rem 2.75rem;
        font-size: .9rem;
        color: var(--gray-700);
        background: #fff;
        outline: none;
        transition: border-color .2s, box-shadow .2s;
        font-family: 'Inter', sans-serif;
    }
    .auth-field input:focus {
        border-color: var(--teal-600);
        box-shadow: 0 0 0 3px rgba(13,148,136,.12);
    }
    .auth-field input.is-invalid {
        border-color: #ef4444;
    }
    .auth-field input.is-invalid:focus {
        box-shadow: 0 0 0 3px rgba(239,68,68,.12);
    }
    .auth-field .toggle-pw {
        position: absolute;
        right: .875rem;
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        padding: 0;
        color: var(--gray-400);
        cursor: pointer;
        font-size: .95rem;
        line-height: 1;
        transition: color .2s;
    }
    .auth-field .toggle-pw:hover { color: var(--teal-700); }
    .auth-field .field-error {
        font-size: .78rem;
        color: #ef4444;
        margin-top: .3rem;
    }

    /* ── Submit button ── */
    .auth-btn {
        width: 100%;
        background: var(--teal-700);
        color: #fff;
        border: none;
        border-radius: 9px;
        padding: .75rem;
        font-size: .9375rem;
        font-weight: 700;
        font-family: 'Inter', sans-serif;
        cursor: pointer;
        transition: background .2s, transform .15s;
        margin-top: .375rem;
    }
    .auth-btn:hover {
        background: var(--teal-800);
        transform: translateY(-1px);
    }

    /* ── Bottom link ── */
    .auth-alt-link {
        text-align: center;
        font-size: .85rem;
        color: var(--gray-500);
        margin-top: 1.25rem;
    }
    .auth-alt-link a {
        color: var(--teal-700);
        font-weight: 600;
        text-decoration: none;
    }
    .auth-alt-link a:hover { text-decoration: underline; }

    /* ── Divider ── */
    .auth-divider {
        border: none;
        border-top: 1px solid var(--gray-200);
        margin: 1.5rem 0;
    }
</style>
@endpush

@section('body')
<div class="auth-page">
    @yield('auth-left')
    <div class="auth-panel-right">
        <div class="auth-form-box">
            <a href="{{ route('welcome') }}" class="auth-form-box__back">
                <i class="bi bi-arrow-left"></i> Kembali ke Beranda
            </a>
            @yield('content')
        </div>
    </div>
</div>
@endsection