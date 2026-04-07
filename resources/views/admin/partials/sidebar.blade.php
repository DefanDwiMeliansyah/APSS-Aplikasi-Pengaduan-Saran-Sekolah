<aside class="admin-sidebar" id="adminSidebar">
    {{-- Brand --}}
    <a href="{{ route('admin.dashboard') }}" class="sidebar-brand">
        <div class="sidebar-brand__logo">A</div>
        <div>
            <div class="sidebar-brand__name">APSS</div>
            <div class="sidebar-brand__role">Admin Panel</div>
        </div>
    </a>

    {{-- Nav --}}
    <nav class="sidebar-nav">
        <div class="sidebar-section-label">Menu</div>

        <a href="{{ route('admin.dashboard') }}"
           class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="bi bi-grid"></i>
            Dashboard
        </a>

        <a href="{{ route('admin.laporan.index') }}"
           class="sidebar-link {{ request()->routeIs('admin.laporan.*') ? 'active' : '' }}">
            <i class="bi bi-card-checklist"></i>
            Laporan &amp; Aspirasi
        </a>

        <a href="{{ route('admin.kategori.index') }}"
           class="sidebar-link {{ request()->routeIs('admin.kategori.*') ? 'active' : '' }}">
            <i class="bi bi-tag"></i>
            Kategori
        </a>

        <div class="sidebar-section-label" style="margin-top:.75rem;">Akun</div>

        <a href="{{ route('admin.akun') }}"
           class="sidebar-link {{ request()->routeIs('admin.akun') ? 'active' : '' }}">
            <i class="bi bi-gear"></i>
            Pengaturan Akun
        </a>
    </nav>

    {{-- Footer / User --}}
    <div class="sidebar-footer">
        <div class="sidebar-user">
            <div class="sidebar-user__avatar">
                {{ strtoupper(substr(auth('admin')->user()->nama ?? 'A', 0, 1)) }}
            </div>
            <div>
                <div class="sidebar-user__name">{{ auth('admin')->user()->nama }}</div>
                <div class="sidebar-user__role">Administrator</div>
            </div>
        </div>

        <form action="{{ route('admin.logout') }}" method="POST" style="margin-top:.375rem;">
            @csrf
            <button type="submit" class="sidebar-link" style="width:100%;background:none;border:none;cursor:pointer;color:#ef4444;text-align:left;">
                <i class="bi bi-box-arrow-right"></i>
                Keluar
            </button>
        </form>
    </div>
</aside>

{{-- Mobile overlay --}}
<div class="sidebar-overlay" id="sidebarOverlay"></div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const sidebar = document.getElementById('adminSidebar');
        const overlay = document.getElementById('sidebarOverlay');
        const toggle  = document.getElementById('sidebarToggle');

        function openSidebar()  { sidebar.classList.add('open');  overlay.classList.add('open'); }
        function closeSidebar() { sidebar.classList.remove('open'); overlay.classList.remove('open'); }

        if (toggle)  toggle.addEventListener('click', openSidebar);
        if (overlay) overlay.addEventListener('click', closeSidebar);

        // Tutup sidebar saat link diklik (mobile UX)
        sidebar.querySelectorAll('.sidebar-link').forEach(function (link) {
            link.addEventListener('click', function () {
                if (window.innerWidth < 769) closeSidebar();
            });
        });
    });
</script>
