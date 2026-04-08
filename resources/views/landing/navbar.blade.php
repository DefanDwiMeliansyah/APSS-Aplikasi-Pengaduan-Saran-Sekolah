<style>
.landing-nav {
    position: sticky;
    top: 0;
    z-index: 100;
    background: rgba(255,255,255,0.92);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    border-bottom: 1px solid #e5e7eb;
    padding: .875rem 0;
    transition: box-shadow .2s;
}
.landing-nav.scrolled {
    box-shadow: 0 2px 16px rgba(15,118,110,.08);
}
.landing-nav__brand {
    font-size: 1.25rem;
    font-weight: 800;
    color: var(--teal-700);
    text-decoration: none;
    letter-spacing: -.5px;
}
.landing-nav__brand:hover { color: var(--teal-800); }
.landing-nav__links {
    display: flex;
    align-items: center;
    gap: 2rem;
    list-style: none;
    margin: 0;
    padding: 0;
}
.landing-nav__links a {
    font-size: .9rem;
    font-weight: 500;
    color: var(--gray-600);
    text-decoration: none;
    transition: color .2s;
}
.landing-nav__links a:hover { color: var(--teal-700); }
.landing-nav__actions {
    display: flex;
    align-items: center;
    gap: .75rem;
}
@media (max-width: 768px) {
    .landing-nav__links { display: none; }
}
</style>

<nav class="landing-nav" id="landing-navbar">
    <div class="container d-flex align-items-center justify-content-between">
        <a href="{{ route('welcome') }}" class="landing-nav__brand">
            APSS
        </a>

        <ul class="landing-nav__links">
            <li><a href="#fitur">Fitur</a></li>
            <li><a href="#cara-kerja">Cara Kerja</a></li>
        </ul>

        <div class="landing-nav__actions">
            @auth('siswa')
                <a href="{{ route('siswa.dashboard') }}" class="btn-teal" style="padding:.5rem 1.25rem;font-size:.875rem;">
                    Dashboard
                </a>
            @else
                <a href="{{ route('siswa.login') }}" class="btn-outline-teal" style="padding:.5rem 1.25rem;font-size:.875rem;">
                    Masuk Siswa
                </a>
                <a href="{{ route('admin.login') }}" class="btn-teal" style="padding:.5rem 1.25rem;font-size:.875rem;">
                    Masuk Admin
                </a>
            @endauth
        </div>
    </div>
</nav>

<script>
    const nav = document.getElementById('landing-navbar');
    window.addEventListener('scroll', () => {
        nav.classList.toggle('scrolled', window.scrollY > 20);
    });
</script>
