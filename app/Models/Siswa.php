<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Siswa extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\SiswaFactory> */
    use HasFactory, Notifiable;

    protected $fillable = [
        'nis',
        'nama',
        'kelas',
    ];

    protected $hidden = [
        'remember_me',
    ];

    protected function nama(): Attribute
    {
        return Attribute::make(
            set: fn($value) => ucwords(strtolower(trim($value)))
        );
    }

    protected function kelas(): Attribute
    {
        return Attribute::make(
            set: fn($value) => strtoupper(trim($value))
        );
    }

    public function laporan()
    {
        return $this->hasMany(LaporanPengaduan::class);
    }
}
