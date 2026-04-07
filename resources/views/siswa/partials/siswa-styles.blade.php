<style>
    :root {
        --teal-50:  #f0fdfa;
        --teal-100: #ccfbf1;
        --teal-600: #0d9488;
        --teal-700: #0f766e;
        --teal-800: #115e59;
        --gray-50:  #f9fafb;
        --gray-100: #f3f4f6;
        --gray-200: #e5e7eb;
        --gray-300: #d1d5db;
        --gray-400: #9ca3af;
        --gray-500: #6b7280;
        --gray-600: #4b5563;
        --gray-700: #374151;
        --gray-800: #1f2937;
        --gray-900: #111827;
    }

    * { box-sizing: border-box; }

    body {
        background: var(--gray-50);
        color: var(--gray-700);
        margin: 0;
    }

    /* ── Navbar siswa ── */
    .siswa-navbar {
        background: var(--teal-700);
        height: 60px;
        display: flex;
        align-items: center;
        padding: 0 1.5rem;
        position: sticky;
        top: 0;
        z-index: 100;
        box-shadow: 0 2px 8px rgba(15,118,110,.25);
    }
    .siswa-navbar__brand {
        font-size: 1.125rem;
        font-weight: 800;
        color: #fff;
        text-decoration: none;
        letter-spacing: -.03em;
        margin-right: auto;
    }
    .siswa-navbar__brand:hover { color: rgba(255,255,255,.85); }

    /* Greeting badge */
    .siswa-navbar__greeting {
        font-size: .82rem;
        color: rgba(255,255,255,.75);
        margin-right: 1.25rem;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 180px;
    }
    @media (max-width: 480px) {
        .siswa-navbar__greeting { display: none; }
    }

    /* Dropdown profile */
    .siswa-dropdown {
        position: relative;
    }
    .siswa-dropdown__toggle {
        display: flex;
        align-items: center;
        gap: .5rem;
        background: rgba(255,255,255,.15);
        border: none;
        border-radius: 999px;
        padding: .35rem .75rem .35rem .35rem;
        cursor: pointer;
        transition: background .2s;
        color: #fff;
        font-family: 'Inter', sans-serif;
        font-size: .82rem;
        font-weight: 600;
    }
    .siswa-dropdown__toggle:hover { background: rgba(255,255,255,.22); }
    .siswa-dropdown__avatar {
        width: 28px;
        height: 28px;
        border-radius: 50%;
        background: rgba(255,255,255,.25);
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: .75rem;
        font-weight: 700;
        flex-shrink: 0;
    }
    .siswa-dropdown__menu {
        position: absolute;
        right: 0;
        top: calc(100% + .5rem);
        background: #fff;
        border: 1px solid var(--gray-200);
        border-radius: 10px;
        box-shadow: 0 8px 24px rgba(0,0,0,.1);
        min-width: 180px;
        z-index: 200;
        overflow: hidden;
        display: none;
    }
    .siswa-dropdown__menu.open { display: block; }
    .siswa-dropdown__item {
        display: flex;
        align-items: center;
        gap: .625rem;
        padding: .7rem 1rem;
        font-size: .85rem;
        color: var(--gray-600);
        text-decoration: none;
        transition: background .15s;
        border: none;
        background: none;
        width: 100%;
        cursor: pointer;
        font-family: 'Inter', sans-serif;
    }
    .siswa-dropdown__item:hover { background: var(--gray-50); color: var(--gray-800); }
    .siswa-dropdown__divider {
        border: none;
        border-top: 1px solid var(--gray-100);
        margin: .25rem 0;
    }
    .siswa-dropdown__item--danger { color: #dc2626; }
    .siswa-dropdown__item--danger:hover { background: #fef2f2; color: #dc2626; }

    /* ── Page wrapper ── */
    .siswa-page {
        max-width: 900px;
        margin: 0 auto;
        padding: 1.5rem 1rem;
    }

    /* ── Panel card ── */
    .page-card {
        background: #fff;
        border: 1px solid var(--gray-200);
        border-radius: 12px;
        overflow: hidden;
    }
    .page-card__header {
        padding: 1rem 1.25rem;
        border-bottom: 1px solid var(--gray-100);
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: .5rem;
    }
    .page-card__title {
        font-size: .9375rem;
        font-weight: 700;
        color: var(--gray-800);
        margin: 0;
    }
    .page-card__body { padding: 1.25rem; }
    .page-card__body--flush { padding: 0; }
    .page-card__footer {
        padding: .75rem 1.25rem;
        border-top: 1px solid var(--gray-100);
        background: var(--gray-50);
    }

    /* ── Table ── */
    .siswa-table {
        width: 100%;
        border-collapse: collapse;
        font-size: .875rem;
    }
    .siswa-table thead th {
        background: var(--gray-50);
        color: var(--gray-500);
        font-size: .72rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .06em;
        padding: .75rem 1rem;
        border-bottom: 1px solid var(--gray-200);
        white-space: nowrap;
    }
    .siswa-table tbody td {
        padding: .9rem 1rem;
        border-bottom: 1px solid var(--gray-100);
        color: var(--gray-700);
        vertical-align: top;
    }
    .siswa-table tbody tr:last-child td { border-bottom: none; }
    .siswa-table tbody tr { transition: background .12s; }
    .siswa-table tbody tr:hover { background: var(--gray-50); }

    /* ── Badges ── */
    .badge-s {
        display: inline-block;
        font-size: .72rem;
        font-weight: 600;
        padding: .25rem .625rem;
        border-radius: 999px;
        white-space: nowrap;
    }
    .badge-s--selesai { background: #dcfce7; color: #166534; }
    .badge-s--proses  { background: #fef9c3; color: #854d0e; }
    .badge-s--menunggu { background: var(--gray-100); color: var(--gray-500); }

    /* ── Buttons ── */
    .btn-primary-s {
        background: var(--teal-700);
        color: #fff;
        border: none;
        border-radius: 8px;
        padding: .5rem 1.125rem;
        font-size: .875rem;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: .375rem;
        text-decoration: none;
        cursor: pointer;
        transition: background .2s, transform .15s;
        font-family: 'Inter', sans-serif;
    }
    .btn-primary-s:hover { background: var(--teal-800); color: #fff; transform: translateY(-1px); }

    .btn-secondary-s {
        background: #fff;
        color: var(--gray-600);
        border: 1.5px solid var(--gray-200);
        border-radius: 8px;
        padding: .5rem 1.125rem;
        font-size: .875rem;
        font-weight: 500;
        display: inline-flex;
        align-items: center;
        gap: .375rem;
        text-decoration: none;
        cursor: pointer;
        transition: border-color .2s;
        font-family: 'Inter', sans-serif;
    }
    .btn-secondary-s:hover { border-color: var(--gray-400); color: var(--gray-800); }

    .btn-sm-s {
        display: inline-flex;
        align-items: center;
        gap: .3rem;
        font-size: .78rem;
        font-weight: 600;
        padding: .3rem .7rem;
        border-radius: 6px;
        text-decoration: none;
        border: none;
        cursor: pointer;
        font-family: 'Inter', sans-serif;
    }
    .btn-sm-s--view { background: var(--teal-50); color: var(--teal-700); }
    .btn-sm-s--view:hover { background: var(--teal-100); color: var(--teal-800); }
    .btn-sm-s--danger { background: #fef2f2; color: #dc2626; }
    .btn-sm-s--danger:hover { background: #fee2e2; }

    /* ── Alert ── */
    .alert-success-s {
        background: #f0fdf4;
        border: 1px solid #bbf7d0;
        border-radius: 8px;
        padding: .75rem 1rem;
        font-size: .85rem;
        color: #166534;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: .5rem;
    }

    /* ── Form ── */
    .siswa-label {
        display: block;
        font-size: .8rem;
        font-weight: 600;
        color: var(--gray-600);
        margin-bottom: .375rem;
    }
    .siswa-input, .siswa-select, .siswa-textarea {
        width: 100%;
        border: 1.5px solid var(--gray-200);
        border-radius: 8px;
        padding: .6rem .875rem;
        font-size: .875rem;
        color: var(--gray-700);
        background: #fff;
        outline: none;
        transition: border-color .2s, box-shadow .2s;
        font-family: 'Inter', sans-serif;
    }
    .siswa-textarea { resize: vertical; }
    .siswa-input:focus, .siswa-select:focus, .siswa-textarea:focus {
        border-color: var(--teal-600);
        box-shadow: 0 0 0 3px rgba(13,148,136,.1);
    }

    /* Detail item */
    .detail-item { margin-bottom: 1.25rem; }
    .detail-item__label {
        font-size: .72rem;
        font-weight: 700;
        color: var(--gray-400);
        text-transform: uppercase;
        letter-spacing: .06em;
        margin-bottom: .3rem;
    }
    .detail-item__value {
        font-size: .9rem;
        color: var(--gray-700);
        line-height: 1.6;
    }

    /* Radio feedback */
    .feedback-options { display: flex; flex-direction: column; gap: .625rem; }
    .feedback-option {
        display: flex;
        align-items: center;
        gap: .625rem;
        padding: .625rem .875rem;
        border: 1.5px solid var(--gray-200);
        border-radius: 8px;
        cursor: pointer;
        transition: border-color .2s, background .2s;
        font-size: .875rem;
        color: var(--gray-700);
    }
    .feedback-option:has(input:checked) {
        border-color: var(--teal-600);
        background: var(--teal-50);
        color: var(--teal-700);
    }
    .feedback-option input { accent-color: var(--teal-700); }
</style>
