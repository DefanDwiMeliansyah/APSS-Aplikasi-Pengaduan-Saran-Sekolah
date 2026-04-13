<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lokasi;
use Illuminate\Http\Request;

class LokasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lokasi = Lokasi::latest()->paginate(10);
        return view('admin.lokasi.index', compact('lokasi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.lokasi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_lokasi' => 'required|string|max:100'
        ]);

        Lokasi::create($request->all());

        return redirect()->route('admin.lokasi.index')
            ->with('success', 'Lokasi berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lokasi $lokasi)
    {
        return view('admin.lokasi.edit', compact('lokasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lokasi $lokasi)
    {
        $request->validate([
            'nama_lokasi' => 'required|string|max:100'
        ]);

        $lokasi->update($request->all());

        return redirect()->route('admin.lokasi.index')
            ->with('success', 'Lokasi berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lokasi $lokasi)
    {
        $lokasi->delete();

        return back()->with('success', 'Lokasi berhasil dihapus');
    }
}
