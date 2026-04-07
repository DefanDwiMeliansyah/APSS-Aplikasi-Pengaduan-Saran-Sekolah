<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Aspirasi;
use App\Models\Kategori;
use App\Models\LaporanPengaduan;
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
            ['nis' => '232410145', 'nama' => 'Abdurrahman Haqi Muttaqin', 'kelas' => 'XII PPLG A'],
            ['nis' => '232410146', 'nama' => 'Adelia Amanda Pratiwi',     'kelas' => 'XII PPLG A'],
            ['nis' => '232410147', 'nama' => 'Ahmad Zaidan',               'kelas' => 'XII PPLG A'],
            ['nis' => '232410148', 'nama' => 'Akbar Dwi Pebriansyah',     'kelas' => 'XII PPLG A'],
            // XII PPLG B
            ['nis' => '232410149', 'nama' => 'Al Farabi Muslim Razes',    'kelas' => 'XII PPLG B'],
            ['nis' => '232410150', 'nama' => 'Aril Maulana',               'kelas' => 'XII PPLG B'],
            ['nis' => '232410151', 'nama' => 'Aris Saputra',               'kelas' => 'XII PPLG B'],
            ['nis' => '232410152', 'nama' => 'Aulia Nuraini Agustin',     'kelas' => 'XII PPLG B'],
            // XII PPLG C
            ['nis' => '232410153', 'nama' => 'Bimasakti Bachtiar',        'kelas' => 'XII PPLG C'],
            ['nis' => '232410154', 'nama' => 'Bunga Amelia',               'kelas' => 'XII PPLG C'],
            ['nis' => '232410155', 'nama' => 'Defan Dwi Meliansyah',      'kelas' => 'XII PPLG C'],
            ['nis' => '232410156', 'nama' => 'Desi Ayu Safitri',          'kelas' => 'XII PPLG C'],
        ];
        $siswa = collect($siswaData)->map(fn($data) => Siswa::create($data));

        // ── Lokasi yang digunakan ─────────────────────────────────────────────
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

        // ── Laporan & Aspirasi ────────────────────────────────────────────────
        $laporanData = [
            // Laporan 1
            [
                'siswa'    => 0, // index siswa
                'kategori' => 3, // Jaringan & Komputer
                'lokasi'   => 'LAB PPLG 1',
                'ket'      => 'Komputer nomor 5 tidak bisa menyala, sudah dicoba berkali-kali namun tetap tidak merespons saat tombol power ditekan.',
                'aspirasi' => ['status' => 'selesai', 'pesan' => 'Sudah diperbaiki, power supply diganti. Terima kasih laporannya.', 'feedback' => 5],
            ],
            // Laporan 2
            [
                'siswa'    => 1,
                'kategori' => 0, // Kerusakan Fasilitas
                'lokasi'   => 'Ruang Kelas XII PPLG A',
                'ket'      => 'Kipas angin di ruang kelas XII PPLG A tidak berfungsi, membuat suasana belajar tidak nyaman terutama siang hari.',
                'aspirasi' => ['status' => 'proses', 'pesan' => 'Sedang dalam proses pengecekan oleh teknisi.', 'feedback' => null],
            ],
            // Laporan 3
            [
                'siswa'    => 2,
                'kategori' => 1, // Kebersihan & Sanitasi
                'lokasi'   => 'Toilet Lantai 1',
                'ket'      => 'Kran air di toilet lantai 1 bocor dan air terus mengalir. Kondisi lantai menjadi licin dan berbahaya.',
                'aspirasi' => ['status' => 'selesai', 'pesan' => 'Kran sudah diganti. Mohon segera lapor jika ada masalah lagi.', 'feedback' => 4],
            ],
            // Laporan 4
            [
                'siswa'    => 3,
                'kategori' => 2, // Peralatan Kelas
                'lokasi'   => 'Ruang Kelas XII PPLG A',
                'ket'      => 'Papan tulis di kelas XII PPLG A sudah tidak bisa dibersihkan dengan baik, tulisan lama masih membekas meskipun sudah dihapus.',
                'aspirasi' => null, // belum diproses
            ],
            // Laporan 5
            [
                'siswa'    => 4,
                'kategori' => 3, // Jaringan & Komputer
                'lokasi'   => 'LAB PPLG 2',
                'ket'      => 'Koneksi internet di Lab PPLG 2 sangat lambat, menyulitkan proses praktikum yang membutuhkan akses internet.',
                'aspirasi' => ['status' => 'proses', 'pesan' => 'Tim IT sedang melakukan pengecekan router. Harap bersabar.', 'feedback' => null],
            ],
            // Laporan 6
            [
                'siswa'    => 5,
                'kategori' => 0,
                'lokasi'   => 'LAB PPLG 3',
                'ket'      => 'Lampu di Lab PPLG 3 mati sebagian, penerangan kurang memadai untuk kegiatan praktikum.',
                'aspirasi' => ['status' => 'selesai', 'pesan' => 'Lampu sudah diganti semua. Terima kasih.', 'feedback' => 5],
            ],
            // Laporan 7
            [
                'siswa'    => 6,
                'kategori' => 1,
                'lokasi'   => 'Kantin',
                'ket'      => 'Area kantin terlihat kotor dan bau setelah jam istirahat. Tempat sampah sudah penuh namun belum diangkat oleh petugas.',
                'aspirasi' => null,
            ],
            // Laporan 8
            [
                'siswa'    => 7,
                'kategori' => 4, // Keamanan & Keselamatan
                'lokasi'   => 'Ruang Kelas XII PPLG B',
                'ket'      => 'Stop kontak di dekat meja guru kelas XII PPLG B terlihat longgar dan sedikit terbuka, dikhawatirkan berbahaya.',
                'aspirasi' => ['status' => 'selesai', 'pesan' => 'Stop kontak sudah diperbaiki oleh teknisi listrik. Terima kasih sudah melapor.', 'feedback' => 5],
            ],
            // Laporan 9
            [
                'siswa'    => 8,
                'kategori' => 2,
                'lokasi'   => 'Ruang Kelas XII PPLG C',
                'ket'      => 'Kursi di kelas XII PPLG C banyak yang rusak, kaki kursi goyang sehingga tidak nyaman saat digunakan belajar.',
                'aspirasi' => ['status' => 'proses', 'pesan' => 'Sudah diajukan ke bagian sarana, menunggu pengadaan kursi baru.', 'feedback' => null],
            ],
            // Laporan 10
            [
                'siswa'    => 9,
                'kategori' => 1,
                'lokasi'   => 'Toilet Lantai 2',
                'ket'      => 'Toilet lantai 2 bau menyengat dan tidak ada sabun cuci tangan. Kondisi ini sangat tidak higienis.',
                'aspirasi' => null,
            ],
            // Laporan 11
            [
                'siswa'    => 10,
                'kategori' => 3,
                'lokasi'   => 'LAB PPLG 1',
                'ket'      => 'Mouse dan keyboard di beberapa komputer Lab PPLG 1 tidak berfungsi normal, ada tombol yang macet.',
                'aspirasi' => ['status' => 'selesai', 'pesan' => 'Perangkat sudah diganti. Silakan gunakan kembali.', 'feedback' => 4],
            ],
            // Laporan 12
            [
                'siswa'    => 11,
                'kategori' => 0,
                'lokasi'   => 'Perpustakaan',
                'ket'      => 'AC perpustakaan tidak dingin, padahal suhu di dalam sangat panas sehingga membuat tidak nyaman saat membaca.',
                'aspirasi' => ['status' => 'proses', 'pesan' => 'AC sedang dalam antrian servis. Mohon maaf atas ketidaknyamanannya.', 'feedback' => null],
            ],
            // Laporan 13
            [
                'siswa'    => 0,
                'kategori' => 4,
                'lokasi'   => 'LAB PPLG 2',
                'ket'      => 'Pintu Lab PPLG 2 tidak bisa dikunci dari dalam, sehingga mengganggu keamanan selama praktikum berlangsung.',
                'aspirasi' => null,
            ],
            // Laporan 14
            [
                'siswa'    => 3,
                'kategori' => 1,
                'lokasi'   => 'Mushola',
                'ket'      => 'Tempat wudhu di mushola alirannya kecil dan ada yang mati total. Menyulitkan siswa saat waktu sholat tiba.',
                'aspirasi' => ['status' => 'selesai', 'pesan' => 'Instalasi air sudah diperbaiki. Terima kasih atas laporannya.', 'feedback' => 3],
            ],
            // Laporan 15
            [
                'siswa'    => 7,
                'kategori' => 2,
                'lokasi'   => 'Ruang Kelas XII PPLG B',
                'ket'      => 'Proyektor di kelas XII PPLG B sering mati sendiri di tengah pelajaran. Sangat mengganggu proses belajar mengajar.',
                'aspirasi' => ['status' => 'proses', 'pesan'  => 'Proyektor sedang dicek oleh teknisi. Sementara bisa pinjam di ruang sarana.', 'feedback' => null],
            ],
        ];

        foreach ($laporanData as $data) {
            $laporan = LaporanPengaduan::create([
                'siswa_id'    => $siswa[$data['siswa']]->id,
                'kategori_id' => $kategori[$data['kategori']]->id,
                'lokasi'      => $data['lokasi'],
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
