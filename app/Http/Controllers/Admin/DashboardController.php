<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LaporanPengaduan;
use App\Models\Siswa;

class DashboardController extends Controller
{
    public function index()
    {
        $totalSiswa = Siswa::count();
        $totalLaporan = LaporanPengaduan::count();

        $laporanProses = LaporanPengaduan::whereHas('aspirasi', function ($q) {
            $q->where('status', 'proses');
        })->count();

        $laporanSelesai = LaporanPengaduan::whereHas('aspirasi', function ($q) {
            $q->where('status', 'selesai');
        })->count();

        $laporanTerbaru = LaporanPengaduan::with(['siswa', 'kategori', 'aspirasi'])
            ->latest()
            ->take(5)
            ->get();

        $laporanTrending = LaporanPengaduan::select('kategori_id', 'lokasi_id', \Illuminate\Support\Facades\DB::raw('COUNT(*) as total'))
            ->with('kategori', 'lokasi')
            ->groupBy('kategori_id', 'lokasi_id')
            ->orderByDesc('total')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalSiswa',
            'totalLaporan',
            'laporanProses',
            'laporanSelesai',
            'laporanTerbaru',
            'laporanTrending'
        ));
    }
}
