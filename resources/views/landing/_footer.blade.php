<style>
/* ── Footer ── */
.landing-footer {
    background: var(--gray-900);
    color: var(--gray-400);
    padding: 2.5rem 0;
}
.landing-footer__brand {
    font-size: 1.125rem;
    font-weight: 800;
    color: #fff;
    letter-spacing: -.4px;
    margin-bottom: .35rem;
}
.landing-footer__copy {
    font-size: .8rem;
    color: var(--gray-500);
    margin: 0;
}
.landing-footer__links {
    display: flex;
    gap: 1.5rem;
    list-style: none;
    margin: 0;
    padding: 0;
}
.landing-footer__links a {
    font-size: .85rem;
    color: var(--gray-500);
    text-decoration: none;
    transition: color .2s;
}
.landing-footer__links a:hover { color: var(--teal-500); }
</style>

<footer class="landing-footer">
    <div class="container d-flex flex-wrap align-items-center justify-content-between gap-3">
        <div>
            <div class="landing-footer__brand">APSS</div>
            <p class="landing-footer__copy">
                &copy; {{ date('Y') }} Aplikasi Pengaduan Sarana Sekolah
            </p>
        </div>

        <ul class="landing-footer__links">
            <li><a href="#fitur">Fitur</a></li>
            <li><a href="#cara-kerja">Cara Kerja</a></li>
            <li><a href="{{ route('siswa.login') }}">Masuk</a></li>
        </ul>
    </div>
</footer>
