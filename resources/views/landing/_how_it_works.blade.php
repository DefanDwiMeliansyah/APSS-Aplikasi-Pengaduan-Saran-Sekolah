<style>
/* ── How It Works ── */
.how-it-works {
    padding: 5rem 0;
    background: var(--teal-50);
}
.steps {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
    max-width: 520px;
}
.step {
    display: flex;
    gap: 1.25rem;
    align-items: flex-start;
}
.step__number {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background: var(--teal-700);
    color: #fff;
    font-size: .875rem;
    font-weight: 700;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    margin-top: .1rem;
}
.step__title {
    font-size: .9375rem;
    font-weight: 700;
    color: var(--gray-800);
    margin-bottom: .25rem;
}
.step__desc {
    font-size: .85rem;
    color: var(--gray-500);
    line-height: 1.65;
    margin: 0;
}
/* Phone mockup */
.phone-mockup {
    background: #fff;
    border: 1px solid var(--gray-200);
    border-radius: 20px;
    padding: 1.25rem;
    max-width: 280px;
    margin: 0 auto;
    box-shadow: 0 16px 48px rgba(15,118,110,.1), 0 2px 8px rgba(0,0,0,.04);
}
.phone-mockup__bar {
    width: 48px;
    height: 4px;
    border-radius: 999px;
    background: var(--gray-200);
    margin: 0 auto 1.25rem;
}
.form-mock {
    background: var(--gray-50);
    border-radius: 10px;
    padding: 1rem;
}
.form-mock__label {
    font-size: .7rem;
    font-weight: 600;
    color: var(--gray-400);
    text-transform: uppercase;
    letter-spacing: .05em;
    margin-bottom: .35rem;
}
.form-mock__field {
    background: #fff;
    border: 1px solid var(--gray-200);
    border-radius: 7px;
    padding: .5rem .75rem;
    font-size: .8rem;
    color: var(--gray-600);
    margin-bottom: .75rem;
}
.form-mock__field:last-of-type { margin-bottom: 1rem; }
.form-mock__field--select {
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.form-mock__btn {
    background: var(--teal-700);
    color: #fff;
    border-radius: 7px;
    padding: .6rem;
    text-align: center;
    font-size: .8rem;
    font-weight: 600;
    width: 100%;
}
</style>

<section class="how-it-works" id="cara-kerja">
    <div class="container">
        <div class="row align-items-center g-5">
            {{-- Steps ---------------------------------------------------------------- --}}
            <div class="col-lg-6">
                <div class="section-label">Cara Kerja</div>
                <h2 class="section-title">Tiga Langkah Sederhana</h2>
                <p class="section-subtitle mb-4" style="margin-left:0;max-width:420px;">
                    Mulai lapor hanya dalam beberapa menit, tanpa proses yang rumit.
                </p>

                <div class="steps">
                    <div class="step">
                        <div class="step__number">1</div>
                        <div>
                            <div class="step__title">Daftar &amp; Masuk</div>
                            <p class="step__desc">
                                Buat akun dengan NIS kamu atau masuk jika sudah punya akun. Prosesnya cepat dan mudah.
                            </p>
                        </div>
                    </div>

                    <div class="step">
                        <div class="step__number">2</div>
                        <div>
                            <div class="step__title">Buat Laporan</div>
                            <p class="step__desc">
                                Pilih kategori masalah, isi lokasi dan keterangan, lalu kirim. Laporan langsung masuk ke admin.
                            </p>
                        </div>
                    </div>

                    <div class="step">
                        <div class="step__number">3</div>
                        <div>
                            <div class="step__title">Pantau &amp; Terima Tanggapan</div>
                            <p class="step__desc">
                                Lacak status laporan di dashboard dan terima respons resmi dari pihak sekolah.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Mock form ------------------------------------------------------------ --}}
            <div class="col-lg-6 d-flex justify-content-center">
                <div class="phone-mockup">
                    <div class="phone-mockup__bar"></div>
                    <div style="font-size:.7rem;font-weight:700;color:var(--gray-400);letter-spacing:.08em;text-transform:uppercase;margin-bottom:.875rem;">
                        Buat Laporan
                    </div>
                    <div class="form-mock">
                        <div class="form-mock__label">Kategori</div>
                        <div class="form-mock__field form-mock__field--select">
                            <span>Fasilitas &amp; Sarana</span>
                            <i class="bi bi-chevron-down" style="font-size:.7rem;color:var(--gray-400);"></i>
                        </div>
                        <div class="form-mock__label">Lokasi</div>
                        <div class="form-mock__field">Ruang Kelas X RPL A</div>
                        <div class="form-mock__label">Keterangan</div>
                        <div class="form-mock__field" style="height:56px;">Papan tulis sudah tidak bisa dihapus...</div>
                        <div class="form-mock__btn">
                            <i class="bi bi-send me-1"></i> Kirim Laporan
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
