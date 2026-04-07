<style>
/* ── Features ── */
.features {
    padding: 5rem 0;
    background: #fff;
}
.section-label {
    font-size: .78rem;
    font-weight: 700;
    color: var(--teal-600);
    letter-spacing: .1em;
    text-transform: uppercase;
    margin-bottom: .5rem;
}
.section-title {
    font-size: clamp(1.5rem, 3vw, 2rem);
    font-weight: 800;
    color: var(--gray-900);
    letter-spacing: -.03em;
    line-height: 1.25;
    margin-bottom: .75rem;
}
.section-subtitle {
    font-size: 1rem;
    color: var(--gray-500);
    max-width: 500px;
    margin: 0 auto;
    line-height: 1.7;
}
.feature-card {
    background: var(--gray-50);
    border: 1px solid var(--gray-100);
    border-radius: 14px;
    padding: 1.75rem;
    height: 100%;
    transition: box-shadow .25s, transform .25s, border-color .25s;
}
.feature-card:hover {
    box-shadow: 0 8px 24px rgba(15,118,110,.1);
    transform: translateY(-3px);
    border-color: var(--teal-200);
}
.feature-card__icon {
    width: 48px;
    height: 48px;
    border-radius: 12px;
    background: var(--teal-700);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    font-size: 1.25rem;
    margin-bottom: 1.25rem;
}
.feature-card__title {
    font-size: 1rem;
    font-weight: 700;
    color: var(--gray-800);
    margin-bottom: .5rem;
}
.feature-card__desc {
    font-size: .875rem;
    color: var(--gray-500);
    line-height: 1.65;
    margin: 0;
}
</style>

<section class="features" id="fitur">
    <div class="container">
        <div class="text-center mb-5">
            <div class="section-label">Fitur Unggulan</div>
            <h2 class="section-title">Semua yang Kamu Butuhkan</h2>
            <p class="section-subtitle">
                Dirancang sederhana agar siswa dapat melapor dengan cepat
                dan admin dapat menindaklanjuti secara efisien.
            </p>
        </div>

        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="feature-card">
                    <div class="feature-card__icon">
                        <i class="bi bi-pencil-square"></i>
                    </div>
                    <div class="feature-card__title">Lapor dengan Mudah</div>
                    <p class="feature-card__desc">
                        Isi form pengaduan dalam hitungan detik.
                        Pilih kategori, tulis keterangan, dan kirim.
                    </p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="feature-card">
                    <div class="feature-card__icon">
                        <i class="bi bi-activity"></i>
                    </div>
                    <div class="feature-card__title">Pantau Status</div>
                    <p class="feature-card__desc">
                        Lacak perkembangan laporanmu secara real-time —
                        dari baru masuk hingga selesai ditangani.
                    </p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="feature-card">
                    <div class="feature-card__icon">
                        <i class="bi bi-chat-left-dots"></i>
                    </div>
                    <div class="feature-card__title">Terima Tanggapan</div>
                    <p class="feature-card__desc">
                        Admin memberikan respons dan pembaruan langsung
                        melalui sistem, tanpa perlu menemui petugas.
                    </p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="feature-card">
                    <div class="feature-card__icon">
                        <i class="bi bi-shield-check"></i>
                    </div>
                    <div class="feature-card__title">Data Aman</div>
                    <p class="feature-card__desc">
                        Laporan hanya bisa diakses oleh pelapor dan
                        admin sekolah. Privasi terjaga sepenuhnya.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
