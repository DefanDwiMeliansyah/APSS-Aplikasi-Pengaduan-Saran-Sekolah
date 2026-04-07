<header class="admin-topbar">
    <div class="d-flex align-items-center gap-3">
        <button class="topbar-sidebar-toggle" id="sidebarToggle" aria-label="Buka sidebar">
            <i class="bi bi-list"></i>
        </button>
        <span class="topbar-title">@yield('page-title', 'Dashboard')</span>
    </div>

    <div class="topbar-right">
        <span style="font-size:.8rem;color:var(--gray-400);">
            {{ now()->translatedFormat('d M Y') }}
        </span>
    </div>
</header>
