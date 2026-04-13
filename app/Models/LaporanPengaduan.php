<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanPengaduan extends Model
{
/**
 * @property \App\Models\Siswa $siswa
 * @property \App\Models\Kategori|null $kategori
 * @property \App\Models\Aspirasi|null $aspirasi
 * @use HasFactory<\Database\Factories\LaporanPengaduanFactory>
 */
    use HasFactory;

    protected $fillable = [
        'siswa_id',
        'kategori_id',
        'ket',
        'lokasi_id',
        'foto_pengaduan',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class);
    }

    public function aspirasi()
    {
        return $this->hasOne(Aspirasi::class, 'laporan_id');
    }
}
