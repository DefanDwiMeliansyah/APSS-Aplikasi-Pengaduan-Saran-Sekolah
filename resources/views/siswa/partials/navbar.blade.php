<nav class="siswa-navbar">
    <a href="{{ route('siswa.dashboard') }}" class="siswa-navbar__brand">APSS</a>

    @auth('siswa')
        <span class="siswa-navbar__greeting">
            Halo, {{ auth('siswa')->user()->nama }}
        </span>

        <div class="siswa-dropdown" id="siswaDropdown">
            <button class="siswa-dropdown__toggle" id="siswaDropdownToggle" aria-expanded="false">
                <div class="siswa-dropdown__avatar">
                    {{ strtoupper(substr(auth('siswa')->user()->nama, 0, 1)) }}
                </div>
                <span>Akun</span>
                <i class="bi bi-chevron-down" style="font-size:.7rem;"></i>
            </button>

            <div class="siswa-dropdown__menu" id="siswaDropdownMenu">
                <a href="{{ route('siswa.akun.edit') }}" class="siswa-dropdown__item">
                    <i class="bi bi-person"></i> Profil Saya
                </a>
                <hr class="siswa-dropdown__divider">
                <form action="{{ route('siswa.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="siswa-dropdown__item siswa-dropdown__item--danger">
                        <i class="bi bi-box-arrow-right"></i> Keluar
                    </button>
                </form>
            </div>
        </div>
    @endauth
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggle = document.getElementById('siswaDropdownToggle');
        const menu   = document.getElementById('siswaDropdownMenu');
        if (!toggle || !menu) return;

        toggle.addEventListener('click', function (e) {
            e.stopPropagation();
            const isOpen = menu.classList.toggle('open');
            toggle.setAttribute('aria-expanded', isOpen);
        });

        document.addEventListener('click', function () {
            menu.classList.remove('open');
            toggle.setAttribute('aria-expanded', 'false');
        });
    });
</script>
