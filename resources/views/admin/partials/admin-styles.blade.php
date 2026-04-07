<style>
/* ── CSS Variables ── */
:root {
    --sidebar-w: 240px;
    --topbar-h:  60px;
    --teal-50:   #f0fdfa;
    --teal-100:  #ccfbf1;
    --teal-600:  #0d9488;
    --teal-700:  #0f766e;
    --teal-800:  #115e59;
    --gray-50:   #f9fafb;
    --gray-100:  #f3f4f6;
    --gray-200:  #e5e7eb;
    --gray-300:  #d1d5db;
    --gray-400:  #9ca3af;
    --gray-500:  #6b7280;
    --gray-600:  #4b5563;
    --gray-700:  #374151;
    --gray-800:  #1f2937;
    --gray-900:  #111827;
}

* { box-sizing: border-box; }
body {
    background: var(--gray-50);
    color: var(--gray-700);
    margin: 0;
}

/* ── Layout wrapper ── */
.admin-wrap {
    display: flex;
    min-height: 100vh;
}

/* ── Sidebar ── */
.admin-sidebar {
    width: var(--sidebar-w);
    background: var(--teal-700);
    border-right: none;
    display: flex;
    flex-direction: column;
    position: fixed;
    top: 0;
    left: 0;
    height: 100vh;
    z-index: 200;
    transition: transform .25s ease;
}
.sidebar-brand {
    display: flex;
    align-items: center;
    gap: .625rem;
    padding: 1.125rem 1.25rem;
    border-bottom: 1px solid rgba(255,255,255,.12);
    text-decoration: none;
}
.sidebar-brand__logo {
    width: 32px;
    height: 32px;
    border-radius: 8px;
    background: rgba(255,255,255,.18);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    font-size: .875rem;
    font-weight: 800;
    flex-shrink: 0;
}
.sidebar-brand__name {
    font-size: .9375rem;
    font-weight: 800;
    color: #fff;
    letter-spacing: -.02em;
}
.sidebar-brand__role {
    font-size: .7rem;
    color: rgba(255,255,255,.6);
    font-weight: 500;
}

/* Nav links */
.sidebar-nav {
    flex: 1;
    padding: .75rem .75rem;
    overflow-y: auto;
}
.sidebar-section-label {
    font-size: .68rem;
    font-weight: 700;
    color: rgba(255,255,255,.5);
    letter-spacing: .08em;
    text-transform: uppercase;
    padding: .5rem .5rem .25rem;
    margin-top: .25rem;
}
.sidebar-link {
    display: flex;
    align-items: center;
    gap: .625rem;
    padding: .55rem .75rem;
    border-radius: 8px;
    text-decoration: none;
    color: rgba(255,255,255,.8);
    font-size: .875rem;
    font-weight: 500;
    transition: background .15s, color .15s;
    margin-bottom: .125rem;
}
.sidebar-link i { font-size: 1rem; width: 18px; text-align: center; flex-shrink: 0; }
.sidebar-link:hover {
    background: rgba(255,255,255,.12);
    color: #fff;
}
.sidebar-link.active {
    background: rgba(255,255,255,.18);
    color: #fff;
    font-weight: 600;
}
.sidebar-link.active i { color: #fff; }

/* Footer sidebar */
.sidebar-footer {
    border-top: 1px solid rgba(255,255,255,.12);
    padding: .75rem;
}
.sidebar-user {
    display: flex;
    align-items: center;
    gap: .625rem;
    padding: .5rem .5rem;
}
.sidebar-user__avatar {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    background: rgba(255,255,255,.2);
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: .8rem;
    font-weight: 700;
    flex-shrink: 0;
}
.sidebar-user__name {
    font-size: .8375rem;
    font-weight: 600;
    color: #fff;
    line-height: 1.2;
}
.sidebar-user__role {
    font-size: .7rem;
    color: rgba(255,255,255,.55);
}

/* ── Main area ── */
.admin-main {
    margin-left: var(--sidebar-w);
    flex: 1;
    display: flex;
    flex-direction: column;
    min-width: 0;
}

/* ── Topbar ── */
.admin-topbar {
    height: var(--topbar-h);
    background: #fff;
    border-bottom: 1px solid var(--gray-200);
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 1.5rem;
    position: sticky;
    top: 0;
    z-index: 100;
}
.topbar-title {
    font-size: .9375rem;
    font-weight: 700;
    color: var(--gray-800);
}
.topbar-right {
    display: flex;
    align-items: center;
    gap: .75rem;
}
.topbar-sidebar-toggle {
    display: none;
    background: none;
    border: none;
    font-size: 1.2rem;
    color: var(--gray-500);
    cursor: pointer;
    padding: .25rem;
    border-radius: 6px;
    transition: background .15s;
}
.topbar-sidebar-toggle:hover { background: var(--gray-100); }

/* ── Page content ── */
.admin-content {
    padding: 1.5rem;
    flex: 1;
}

/* ── Admin Cards & Tables (global) ── */
.panel-card {
    background: #fff;
    border: 1px solid var(--gray-200);
    border-radius: 12px;
    overflow: hidden;
}
.panel-card__header {
    padding: 1rem 1.25rem;
    border-bottom: 1px solid var(--gray-100);
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: .5rem;
}
.panel-card__title {
    font-size: .9rem;
    font-weight: 700;
    color: var(--gray-800);
    margin: 0;
}
.panel-card__body { padding: 1.25rem; }
.panel-card__body--flush { padding: 0; }
.panel-card__footer {
    padding: .75rem 1.25rem;
    border-top: 1px solid var(--gray-100);
    background: var(--gray-50);
}

/* Stat cards */
.stat-card {
    background: #fff;
    border: 1px solid var(--gray-200);
    border-radius: 12px;
    padding: 1.25rem;
    display: flex;
    align-items: center;
    gap: 1rem;
}
.stat-card__icon {
    width: 44px;
    height: 44px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.1rem;
    flex-shrink: 0;
}
.stat-card__icon--teal   { background: var(--teal-50);  color: var(--teal-700); }
.stat-card__icon--blue   { background: #eff6ff; color: #2563eb; }
.stat-card__icon--amber  { background: #fffbeb; color: #d97706; }
.stat-card__icon--green  { background: #f0fdf4; color: #16a34a; }
.stat-card__value { font-size: 1.625rem; font-weight: 800; color: var(--gray-900); line-height: 1; }
.stat-card__label { font-size: .78rem; color: var(--gray-400); margin-top: .2rem; }

/* Tables */
.admin-table {
    width: 100%;
    border-collapse: collapse;
    font-size: .875rem;
}
.admin-table thead th {
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
.admin-table tbody td {
    padding: .875rem 1rem;
    border-bottom: 1px solid var(--gray-100);
    color: var(--gray-700);
    vertical-align: middle;
}
.admin-table tbody tr:last-child td { border-bottom: none; }
.admin-table tbody tr { transition: background .12s; }
.admin-table tbody tr:hover { background: var(--gray-50); }

/* Badges */
.badge-status {
    display: inline-block;
    font-size: .72rem;
    font-weight: 600;
    padding: .25rem .625rem;
    border-radius: 999px;
    white-space: nowrap;
}
.badge-status--selesai  { background: #dcfce7; color: #166534; }
.badge-status--proses   { background: #fef9c3; color: #854d0e; }
.badge-status--belum    { background: var(--gray-100); color: var(--gray-500); }

/* Buttons */
.btn-teal {
    background: var(--teal-700);
    color: #fff;
    border: none;
    border-radius: 8px;
    padding: .5rem 1rem;
    font-size: .875rem;
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: .35rem;
    cursor: pointer;
    transition: background .2s, transform .15s;
    font-family: 'Inter', sans-serif;
}
.btn-teal:hover     { background: var(--teal-800); color: #fff; transform: translateY(-1px); }
.btn-outline-gray {
    background: #fff;
    color: var(--gray-600);
    border: 1.5px solid var(--gray-200);
    border-radius: 8px;
    padding: .5rem 1rem;
    font-size: .875rem;
    font-weight: 500;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: .35rem;
    cursor: pointer;
    transition: border-color .2s, color .2s;
    font-family: 'Inter', sans-serif;
}
.btn-outline-gray:hover { border-color: var(--gray-400); color: var(--gray-800); }
.btn-sm-action {
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
    transition: opacity .15s;
    font-family: 'Inter', sans-serif;
}
.btn-sm-action:hover { opacity: .82; }
.btn-sm-action--primary { background: var(--teal-50); color: var(--teal-700); }
.btn-sm-action--warning { background: #fffbeb; color: #b45309; }
.btn-sm-action--danger  { background: #fef2f2; color: #dc2626; }

/* Page heading */
.page-heading { margin-bottom: 1.25rem; }
.page-heading__title {
    font-size: 1.25rem;
    font-weight: 800;
    color: var(--gray-900);
    letter-spacing: -.03em;
}
.page-heading__breadcrumb {
    font-size: .8rem;
    color: var(--gray-400);
}
.page-heading__breadcrumb a { color: var(--teal-700); text-decoration: none; }

/* Alert */
.alert-success-inline {
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

/* Form controls inside admin */
.admin-label {
    display: block;
    font-size: .8rem;
    font-weight: 600;
    color: var(--gray-600);
    margin-bottom: .375rem;
}
.admin-input, .admin-select {
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
.admin-input:focus, .admin-select:focus {
    border-color: var(--teal-600);
    box-shadow: 0 0 0 3px rgba(13,148,136,.1);
}

/* Mobile responsive */
@media (max-width: 768px) {
    .admin-sidebar {
        transform: translateX(calc(-1 * var(--sidebar-w)));
    }
    .admin-sidebar.open {
        transform: translateX(0);
        box-shadow: 4px 0 24px rgba(0,0,0,.12);
    }
    .admin-main { margin-left: 0; }
    .topbar-sidebar-toggle { display: flex; }
    .admin-content { padding: 1rem; }
}

/* Overlay mobile */
.sidebar-overlay {
    display: none;
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,.35);
    z-index: 199;
}
.sidebar-overlay.open { display: block; }
</style>
