<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Aspirasi;
use App\Models\Kategori;
use App\Models\LaporanPengaduan;
use App\Models\Lokasi;
use App\Models\Siswa;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // ── Admin ────────────────────────────────────────────────────────────
        $admin = Admin::factory()->create([
            'nama'     => 'Administrator',
            'username' => 'admin',
        ]);

        // ── Kategori ─────────────────────────────────────────────────────────
        $kategoriList = [
            'Kerusakan Fasilitas',
            'Kebersihan & Sanitasi',
            'Peralatan Kelas',
            'Jaringan & Komputer',
            'Keamanan & Keselamatan',
        ];
        $kategori = collect($kategoriList)->map(fn($nama) =>
            Kategori::create(['nama_kategori' => $nama])
        );

        // ── Siswa (12 siswa, 4 per kelas) ────────────────────────────────────
        $siswaData = [
            // XII PPLG A
            ['nis' => '232410145', 'nama' => 'Abdurrahman Haqi Muttaqin', 'kelas' => 'XII PPLG A', 'password' => 'password'],
            ['nis' => '232410146', 'nama' => 'Adelia Amanda Pratiwi',     'kelas' => 'XII PPLG A', 'password' => 'password'],
            ['nis' => '232410147', 'nama' => 'Ahmad Zaidan',               'kelas' => 'XII PPLG A', 'password' => 'password'],
            ['nis' => '232410148', 'nama' => 'Akbar Dwi Pebriansyah',     'kelas' => 'XII PPLG A', 'password' => 'password'],
            // XII PPLG B
            ['nis' => '232410149', 'nama' => 'Al Farabi Muslim Razes',    'kelas' => 'XII PPLG B', 'password' => 'password'],
            ['nis' => '232410150', 'nama' => 'Aril Maulana',               'kelas' => 'XII PPLG B', 'password' => 'password'],
            ['nis' => '232410151', 'nama' => 'Aris Saputra',               'kelas' => 'XII PPLG B', 'password' => 'password'],
            ['nis' => '232410152', 'nama' => 'Aulia Nuraini Agustin',     'kelas' => 'XII PPLG B', 'password' => 'password'],
            // XII PPLG C
            ['nis' => '232410153', 'nama' => 'Bimasakti Bachtiar',        'kelas' => 'XII PPLG C', 'password' => 'password'],
            ['nis' => '232410154', 'nama' => 'Bunga Amelia',               'kelas' => 'XII PPLG C', 'password' => 'password'],
            ['nis' => '232410155', 'nama' => 'Defan Dwi Meliansyah',      'kelas' => 'XII PPLG C', 'password' => 'password'],
            ['nis' => '232410156', 'nama' => 'Desi Ayu Safitri',          'kelas' => 'XII PPLG C', 'password' => 'password'],
        ];
        $siswa = collect($siswaData)->map(fn($data) => Siswa::create($data));

        // ── Lokasi ───────────────────────────────────────────────────────────
        $lokasiList = [
            'LAB PPLG 1',
            'LAB PPLG 2',
            'LAB PPLG 3',
            'Ruang Kelas XII PPLG A',
            'Ruang Kelas XII PPLG B',
            'Ruang Kelas XII PPLG C',
            'Toilet Lantai 1',
            'Toilet Lantai 2',
            'Perpustakaan',
            'Kantin',
            'Mushola',
            'Ruang UKS',
        ];
        $lokasi = collect($lokasiList)->map(fn($nama) =>
            Lokasi::create(['nama_lokasi' => $nama])
        );

        // ── Laporan & Aspirasi ────────────────────────────────────────────────
        $laporanData = [
            // ── Laporan 1 ──
            [
                'siswa'    => 0,
                'kategori' => 3, // Jaringan & Komputer
                'lokasi'   => 0, // LAB PPLG 1
                'ket'      => 'Komputer nomor 5 tidak bisa menyala, sudah dicoba berkali-kali namun tetap tidak merespons saat tombol power ditekan.',
                'aspirasi' => ['status' => 'selesai', 'pesan' => 'Sudah diperbaiki, power supply diganti. Terima kasih laporannya.', 'feedback' => 5],
            ],
            // ── Laporan 2 ──
            [
                'siswa'    => 1,
                'kategori' => 0, // Kerusakan Fasilitas
                'lokasi'   => 3, // Ruang Kelas XII PPLG A
                'ket'      => 'Kipas angin di ruang kelas XII PPLG A tidak berfungsi, membuat suasana belajar tidak nyaman terutama siang hari.',
                'aspirasi' => ['status' => 'proses', 'pesan' => 'Sedang dalam proses pengecekan oleh teknisi.', 'feedback' => null],
            ],
            // ── Laporan 3 ──
            [
                'siswa'    => 2,
                'kategori' => 1, // Kebersihan & Sanitasi
                'lokasi'   => 6, // Toilet Lantai 1
                'ket'      => 'Kran air di toilet lantai 1 bocor dan air terus mengalir. Kondisi lantai menjadi licin dan berbahaya.',
                'aspirasi' => ['status' => 'selesai', 'pesan' => 'Kran sudah diganti. Mohon segera lapor jika ada masalah lagi.', 'feedback' => 4],
            ],
            // ── Laporan 4 ──
            [
                'siswa'    => 3,
                'kategori' => 2, // Peralatan Kelas
                'lokasi'   => 3, // Ruang Kelas XII PPLG A
                'ket'      => 'Papan tulis di kelas XII PPLG A sudah tidak bisa dibersihkan dengan baik, tulisan lama masih membekas meskipun sudah dihapus.',
                'aspirasi' => null,
            ],
            // ── Laporan 5 ──
            [
                'siswa'    => 4,
                'kategori' => 3, // Jaringan & Komputer
                'lokasi'   => 1, // LAB PPLG 2
                'ket'      => 'Koneksi internet di Lab PPLG 2 sangat lambat, menyulitkan proses praktikum yang membutuhkan akses internet.',
                'aspirasi' => ['status' => 'proses', 'pesan' => 'Tim IT sedang melakukan pengecekan router. Harap bersabar.', 'feedback' => null],
            ],
            // ── Laporan 6 ──
            [
                'siswa'    => 5,
                'kategori' => 0,
                'lokasi'   => 2, // LAB PPLG 3
                'ket'      => 'Lampu di Lab PPLG 3 mati sebagian, penerangan kurang memadai untuk kegiatan praktikum.',
                'aspirasi' => ['status' => 'selesai', 'pesan' => 'Lampu sudah diganti semua. Terima kasih.', 'feedback' => 5],
            ],
            // ── Laporan 7 ──
            [
                'siswa'    => 6,
                'kategori' => 1,
                'lokasi'   => 9, // Kantin
                'ket'      => 'Area kantin terlihat kotor dan bau setelah jam istirahat. Tempat sampah sudah penuh namun belum diangkat oleh petugas.',
                'aspirasi' => null,
            ],
            // ── Laporan 8 ──
            [
                'siswa'    => 7,
                'kategori' => 4, // Keamanan & Keselamatan
                'lokasi'   => 4, // Ruang Kelas XII PPLG B
                'ket'      => 'Stop kontak di dekat meja guru kelas XII PPLG B terlihat longgar dan sedikit terbuka, dikhawatirkan berbahaya.',
                'aspirasi' => ['status' => 'selesai', 'pesan' => 'Stop kontak sudah diperbaiki oleh teknisi listrik. Terima kasih sudah melapor.', 'feedback' => 5],
            ],
            // ── Laporan 9 ──
            [
                'siswa'    => 8,
                'kategori' => 2,
                'lokasi'   => 5, // Ruang Kelas XII PPLG C
                'ket'      => 'Kursi di kelas XII PPLG C banyak yang rusak, kaki kursi goyang sehingga tidak nyaman saat digunakan belajar.',
                'aspirasi' => ['status' => 'proses', 'pesan' => 'Sudah diajukan ke bagian sarana, menunggu pengadaan kursi baru.', 'feedback' => null],
            ],
            // ── Laporan 10 ──
            [
                'siswa'    => 9,
                'kategori' => 1,
                'lokasi'   => 7, // Toilet Lantai 2
                'ket'      => 'Toilet lantai 2 bau menyengat dan tidak ada sabun cuci tangan. Kondisi ini sangat tidak higienis.',
                'aspirasi' => null,
            ],
            // ── Laporan 11 ──
            [
                'siswa'    => 10,
                'kategori' => 3,
                'lokasi'   => 0, // LAB PPLG 1
                'ket'      => 'Mouse dan keyboard di beberapa komputer Lab PPLG 1 tidak berfungsi normal, ada tombol yang macet.',
                'aspirasi' => ['status' => 'selesai', 'pesan' => 'Perangkat sudah diganti. Silakan gunakan kembali.', 'feedback' => 4],
            ],
            // ── Laporan 12 ──
            [
                'siswa'    => 11,
                'kategori' => 0,
                'lokasi'   => 8, // Perpustakaan
                'ket'      => 'AC perpustakaan tidak dingin, padahal suhu di dalam sangat panas sehingga membuat tidak nyaman saat membaca.',
                'aspirasi' => ['status' => 'proses', 'pesan' => 'AC sedang dalam antrian servis. Mohon maaf atas ketidaknyamanannya.', 'feedback' => null],
            ],
            // ── Laporan 13 ──
            [
                'siswa'    => 0,
                'kategori' => 4,
                'lokasi'   => 1, // LAB PPLG 2
                'ket'      => 'Pintu Lab PPLG 2 tidak bisa dikunci dari dalam, sehingga mengganggu keamanan selama praktikum berlangsung.',
                'aspirasi' => null,
            ],
            // ── Laporan 14 ──
            [
                'siswa'    => 3,
                'kategori' => 1,
                'lokasi'   => 10, // Mushola
                'ket'      => 'Tempat wudhu di mushola alirannya kecil dan ada yang mati total. Menyulitkan siswa saat waktu sholat tiba.',
                'aspirasi' => ['status' => 'selesai', 'pesan' => 'Instalasi air sudah diperbaiki. Terima kasih atas laporannya.', 'feedback' => 3],
            ],
            // ── Laporan 15 ──
            [
                'siswa'    => 7,
                'kategori' => 2,
                'lokasi'   => 4, // Ruang Kelas XII PPLG B
                'ket'      => 'Proyektor di kelas XII PPLG B sering mati sendiri di tengah pelajaran. Sangat mengganggu proses belajar mengajar.',
                'aspirasi' => ['status' => 'proses', 'pesan' => 'Proyektor sedang dicek oleh teknisi. Sementara bisa pinjam di ruang sarana.', 'feedback' => null],
            ],
            // ── Laporan 16 ──
            [
                'siswa'    => 2,
                'kategori' => 0, // Kerusakan Fasilitas
                'lokasi'   => 11, // Ruang UKS
                'ket'      => 'Tempat tidur di UKS sudah rusak, kasurnya sudah kempes dan tidak layak digunakan untuk siswa yang sakit.',
                'aspirasi' => ['status' => 'selesai', 'pesan' => 'Kasur baru sudah diadakan. Terima kasih laporannya.', 'feedback' => 5],
            ],
            // ── Laporan 17 ──
            [
                'siswa'    => 4,
                'kategori' => 4, // Keamanan & Keselamatan
                'lokasi'   => 2, // LAB PPLG 3
                'ket'      => 'APAR (alat pemadam) di Lab PPLG 3 sudah kadaluwarsa. Perlu segera diganti untuk keamanan.',
                'aspirasi' => ['status' => 'proses', 'pesan' => 'Sudah diajukan ke bagian K3. Sedang menunggu pengadaan.', 'feedback' => null],
            ],
            // ── Laporan 18 ──
            [
                'siswa'    => 5,
                'kategori' => 3, // Jaringan & Komputer
                'lokasi'   => 0, // LAB PPLG 1
                'ket'      => 'Monitor komputer nomor 12 berkedip-kedip dan kadang mati sendiri. Mengganggu saat praktikum.',
                'aspirasi' => null,
            ],
            // ── Laporan 19 ──
            [
                'siswa'    => 6,
                'kategori' => 0, // Kerusakan Fasilitas
                'lokasi'   => 9, // Kantin
                'ket'      => 'Atap kantin bocor saat hujan, air menetes ke area makan. Sangat mengganggu siswa yang sedang istirahat.',
                'aspirasi' => ['status' => 'selesai', 'pesan' => 'Atap sudah diperbaiki oleh tukang. Terima kasih.', 'feedback' => 4],
            ],
            // ── Laporan 20 ──
            [
                'siswa'    => 8,
                'kategori' => 1, // Kebersihan & Sanitasi
                'lokasi'   => 5, // Ruang Kelas XII PPLG C
                'ket'      => 'Lantai kelas XII PPLG C kotor dan berdebu. Sapu dan pel kelas sudah rusak, perlu diganti.',
                'aspirasi' => ['status' => 'proses', 'pesan' => 'Alat kebersihan baru sedang diadakan. Harap bersabar.', 'feedback' => null],
            ],
            // ── Laporan 21 ──
            [
                'siswa'    => 9,
                'kategori' => 2, // Peralatan Kelas
                'lokasi'   => 3, // Ruang Kelas XII PPLG A
                'ket'      => 'Meja di barisan belakang kelas XII PPLG A banyak yang goyang dan catnya sudah terkelupas.',
                'aspirasi' => null,
            ],
            // ── Laporan 22 ──
            [
                'siswa'    => 10,
                'kategori' => 4, // Keamanan & Keselamatan
                'lokasi'   => 6, // Toilet Lantai 1
                'ket'      => 'Lampu toilet lantai 1 mati, sangat gelap dan berbahaya terutama saat malam hari untuk siswa yang ekskul.',
                'aspirasi' => ['status' => 'selesai', 'pesan' => 'Lampu sudah diganti dengan yang baru. Terima kasih.', 'feedback' => 5],
            ],
            // ── Laporan 23 ──
            [
                'siswa'    => 11,
                'kategori' => 3, // Jaringan & Komputer
                'lokasi'   => 2, // LAB PPLG 3
                'ket'      => 'Printer di Lab PPLG 3 paper jam terus-menerus. Sudah dicoba berkali-kali tapi tetap macet.',
                'aspirasi' => ['status' => 'proses', 'pesan' => 'Printer sedang dicek oleh teknisi. Sementara gunakan printer Lab 1.', 'feedback' => null],
            ],
            // ── Laporan 24 ──
            [
                'siswa'    => 1,
                'kategori' => 1, // Kebersihan & Sanitasi
                'lokasi'   => 10, // Mushola
                'ket'      => 'Karpet mushola sudah kotor dan berbau. Perlu dicuci atau diganti agar nyaman untuk beribadah.',
                'aspirasi' => ['status' => 'selesai', 'pesan' => 'Karpet sudah dicuci dan dijemur. Terima kasih laporannya.', 'feedback' => 4],
            ],
            // ── Laporan 25 ──
            [
                'siswa'    => 3,
                'kategori' => 0, // Kerusakan Fasilitas
                'lokasi'   => 8, // Perpustakaan
                'ket'      => 'Jendela perpustakaan retak dan tidak bisa ditutup rapat. Saat hujan, air masuk dan membasahi buku-buku.',
                'aspirasi' => null,
            ],
            // ── Laporan 26 ──
            [
                'siswa'    => 0,
                'kategori' => 2, // Peralatan Kelas
                'lokasi'   => 5, // Ruang Kelas XII PPLG C
                'ket'      => 'Speaker aktif di kelas XII PPLG C rusak, suaranya pecah. Mengganggu saat guru memutar video pembelajaran.',
                'aspirasi' => ['status' => 'selesai', 'pesan' => 'Speaker sudah diganti. Silakan gunakan kembali.', 'feedback' => 5],
            ],
            // ── Laporan 27 ──
            [
                'siswa'    => 7,
                'kategori' => 3, // Jaringan & Komputer
                'lokasi'   => 1, // LAB PPLG 2
                'ket'      => 'Kabel LAN di beberapa meja Lab PPLG 2 putus sehingga beberapa komputer tidak bisa terhubung ke jaringan.',
                'aspirasi' => ['status' => 'proses', 'pesan' => 'Kabel sudah dipesan. Estimasi pemasangan 2-3 hari.', 'feedback' => null],
            ],
            // ── Laporan 28 ──
            [
                'siswa'    => 4,
                'kategori' => 1, // Kebersihan & Sanitasi
                'lokasi'   => 7, // Toilet Lantai 2
                'ket'      => 'Wastafel toilet lantai 2 tersumbat, air menggenang dan meluber ke lantai. Perlu dibersihkan segera.',
                'aspirasi' => ['status' => 'selesai', 'pesan' => 'Saluran sudah dibersihkan oleh petugas. Terima kasih.', 'feedback' => 3],
            ],
            // ── Laporan 29 ──
            [
                'siswa'    => 6,
                'kategori' => 4, // Keamanan & Keselamatan
                'lokasi'   => 0, // LAB PPLG 1
                'ket'      => 'Kabel listrik di bawah meja Lab PPLG 1 berantakan dan ada yang terkelupas. Rawan konsleting.',
                'aspirasi' => null,
            ],
            // ── Laporan 30 ──
            [
                'siswa'    => 9,
                'kategori' => 0, // Kerusakan Fasilitas
                'lokasi'   => 4, // Ruang Kelas XII PPLG B
                'ket'      => 'Gagang pintu kelas XII PPLG B lepas, pintu sulit dibuka dan ditutup. Bisa membahayakan saat keadaan darurat.',
                'aspirasi' => ['status' => 'selesai', 'pesan' => 'Gagang pintu sudah diperbaiki. Terima kasih sudah melapor.', 'feedback' => 4],
            ],
        ];

        foreach ($laporanData as $data) {
            $laporan = LaporanPengaduan::create([
                'siswa_id'    => $siswa[$data['siswa']]->id,
                'kategori_id' => $kategori[$data['kategori']]->id,
                'lokasi_id'   => $lokasi[$data['lokasi']]->id,
                'ket'         => $data['ket'],
            ]);

            if ($data['aspirasi']) {
                Aspirasi::create([
                    'laporan_id' => $laporan->id,
                    'admin_id'   => $admin->id,
                    'status'     => $data['aspirasi']['status'],
                    'pesan'      => $data['aspirasi']['pesan'],
                    'feedback'   => $data['aspirasi']['feedback'] ?? null,
                ]);
            }
        }
    }
}
