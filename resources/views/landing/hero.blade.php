<style>
/* ── Hero ── */
.hero {
    padding: 7rem 0 5rem;
    background: linear-gradient(160deg, var(--teal-50) 0%, #ffffff 55%);
    position: relative;
    overflow: hidden;
}
.hero::before {
    content: '';
    position: absolute;
    top: -120px;
    right: -120px;
    width: 480px;
    height: 480px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(20,184,166,.12) 0%, transparent 70%);
    pointer-events: none;
}
.hero__badge {
    display: inline-flex;
    align-items: center;
    gap: .4rem;
    background: var(--teal-100);
    color: var(--teal-800);
    font-size: .78rem;
    font-weight: 600;
    padding: .35rem .875rem;
    border-radius: 999px;
    margin-bottom: 1.5rem;
    letter-spacing: .02em;
}
.hero__title {
    font-size: clamp(2rem, 5vw, 3rem);
    font-weight: 800;
    color: var(--gray-900);
    line-height: 1.2;
    letter-spacing: -.03em;
    margin-bottom: 1.25rem;
}
.hero__title span {
    color: var(--teal-700);
}
.hero__subtitle {
    font-size: 1.05rem;
    color: var(--gray-500);
    max-width: 480px;
    margin-bottom: 2.25rem;
    line-height: 1.75;
}
.hero__cta {
    display: flex;
    flex-wrap: wrap;
    gap: .875rem;
    align-items: center;
    margin-bottom: 3.5rem;
}
.hero__note {
    font-size: .8rem;
    color: var(--gray-400);
    display: flex;
    align-items: center;
    gap: .35rem;
}
.hero__stats {
    display: flex;
    gap: 2.5rem;
    flex-wrap: wrap;
}
.hero__stat-value {
    font-size: 1.75rem;
    font-weight: 800;
    color: var(--gray-900);
    letter-spacing: -.05em;
    line-height: 1;
}
.hero__stat-label {
    font-size: .8rem;
    color: var(--gray-400);
    margin-top: .25rem;
}
.hero__visual {
    background: #fff;
    border: 1px solid var(--gray-200);
    border-radius: 16px;
    padding: 1.5rem;
    box-shadow: 0 8px 32px rgba(15,118,110,.08), 0 1px 4px rgba(0,0,0,.04);
}
.card-mock {
    background: var(--teal-50);
    border-radius: 10px;
    padding: 1rem 1.25rem;
    margin-bottom: .75rem;
    display: flex;
    align-items: center;
    gap: .875rem;
    transition: transform .2s;
}
.card-mock:last-child { margin-bottom: 0; }
.card-mock:hover { transform: translateX(4px); }
.card-mock__icon {
    width: 36px;
    height: 36px;
    border-radius: 8px;
    background: var(--teal-700);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    font-size: .9rem;
    flex-shrink: 0;
}
.card-mock__title {
    font-size: .85rem;
    font-weight: 600;
    color: var(--gray-700);
}
.card-mock__sub {
    font-size: .75rem;
    color: var(--gray-400);
}
.badge-status {
    font-size: .7rem;
    font-weight: 600;
    padding: .25rem .6rem;
    border-radius: 999px;
    white-space: nowrap;
    margin-left: auto;
    flex-shrink: 0;
}
.badge-status--proses {
    background: #fef9c3;
    color: #854d0e;
}
.badge-status--selesai {
    background: #dcfce7;
    color: #166534;
}
.badge-status--baru {
    background: #e0f2fe;
    color: #075985;
}
@media (max-width: 768px) {
    .hero { padding: 4rem 0 3rem; }
    .hero__visual { margin-top: 2.5rem; }
}
</style>

<section class="hero">
    <div class="container">
        <div class="row align-items-center">
            {{-- Text ----------------------------------------------------------------- --}}
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="hero__badge">
                    <i class="bi bi-patch-check-fill"></i>
                    Platform Resmi Sekolah
                </div>

                <h1 class="hero__title">
                    Laporkan Masalah<br>
                    Fasilitas <span>Sekolah</span><br>
                    dengan Mudah
                </h1>

                <p class="hero__subtitle">
                    APSS memudahkan siswa menyampaikan pengaduan
                    dan saran terkait sarana-prasarana sekolah secara digital —
                    cepat, terstruktur, dan dapat dipantau.
                </p>

                <div class="hero__cta">
                    @guest('siswa')
                        <a href="{{ route('siswa.register') }}" class="btn-teal">
                            Mulai Melapor
                        </a>
                        <a href="{{ route('siswa.login') }}" class="btn-outline-teal">
                            Sudah punya akun?
                        </a>
                    @else
                        <a href="{{ route('siswa.laporan.create') }}" class="btn-teal">
                            <i class="bi bi-plus-circle me-1"></i> Buat Laporan Baru
                        </a>
                        <a href="{{ route('siswa.dashboard') }}" class="btn-outline-teal">
                            Lihat Dashboard
                        </a>
                    @endguest
                </div>

                <div class="hero__stats">
                    <div>
                        <div class="hero__stat-value">Cepat</div>
                        <div class="hero__stat-label">Proses laporan</div>
                    </div>
                    <div>
                        <div class="hero__stat-value">Real‑time</div>
                        <div class="hero__stat-label">Pantau status</div>
                    </div>
                    <div>
                        <div class="hero__stat-value">Aman</div>
                        <div class="hero__stat-label">Data terlindungi</div>
                    </div>
                </div>
            </div>

            {{-- Visual --------------------------------------------------------------- --}}
            <div class="col-lg-5 offset-lg-1">
                <div class="hero__visual">
                    <div style="font-size:.7rem;font-weight:700;color:var(--gray-400);letter-spacing:.08em;text-transform:uppercase;margin-bottom:.875rem;">
                        Laporan Terkini
                    </div>

                    <div class="card-mock">
                        <div class="card-mock__icon"><i class="bi bi-lightbulb"></i></div>
                        <div>
                            <div class="card-mock__title">Lampu Lab Komputer Mati</div>
                            <div class="card-mock__sub">Fasilitas · Ruang Lab</div>
                        </div>
                        <span class="badge-status badge-status--proses">Diproses</span>
                    </div>

                    <div class="card-mock">
                        <div class="card-mock__icon"><i class="bi bi-droplet"></i></div>
                        <div>
                            <div class="card-mock__title">Kran Toilet Bocor</div>
                            <div class="card-mock__sub">Sanitasi · Toilet Lantai 2</div>
                        </div>
                        <span class="badge-status badge-status--selesai">Selesai</span>
                    </div>

                    <div class="card-mock">
                        <div class="card-mock__icon"><i class="bi bi-easel2"></i></div>
                        <div>
                            <div class="card-mock__title">Papan Tulis Kelas X Rusak</div>
                            <div class="card-mock__sub">Kelas · X RPL A</div>
                        </div>
                        <span class="badge-status badge-status--baru">Baru</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
