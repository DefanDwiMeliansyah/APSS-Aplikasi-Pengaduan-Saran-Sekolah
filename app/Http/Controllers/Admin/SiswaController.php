<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Siswa::query();

        if ($request->has('search') && $request->search != '') {
            $query->where('nama', 'like', '%' . $request->search . '%')
                  ->orWhere('nis', 'like', '%' . $request->search . '%');
        }

        $siswa = $query->latest()->paginate(10)->withQueryString();
        
        return view('admin.siswa.index', compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required|numeric|unique:siswas,nis',
            'nama' => 'required|string|max:255',
            'kelas' => 'required|string|max:50',
            'password' => 'required|min:6',
        ], [
            'nis.unique' => 'NIS sudah terdaftar.',
            'nis.required' => 'NIS wajib diisi.',
            'nama.required' => 'Nama wajib diisi.',
            'kelas.required' => 'Kelas wajib diisi.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 6 karakter.',
        ]);

        $data = $request->all();
        $data['password'] = \Illuminate\Support\Facades\Hash::make($request->password);
        Siswa::create($data);

        return redirect()->route('admin.siswa.index')
            ->with('success', 'Akun siswa berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswa $siswa)
    {
        return view('admin.siswa.edit', compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Siswa $siswa)
    {
        $request->validate([
            'nis' => 'required|numeric|unique:siswas,nis,' . $siswa->id,
            'nama' => 'required|string|max:255',
            'kelas' => 'required|string|max:50',
            'password' => 'nullable|min:6',
        ], [
            'nis.unique' => 'NIS sudah terdaftar.',
            'nis.required' => 'NIS wajib diisi.',
            'nama.required' => 'Nama wajib diisi.',
            'kelas.required' => 'Kelas wajib diisi.',
            'password.min' => 'Password minimal 6 karakter.',
        ]);

        $data = $request->all();
        if ($request->filled('password')) {
            $data['password'] = \Illuminate\Support\Facades\Hash::make($request->password);
        } else {
            unset($data['password']);
        }

        $siswa->update($data);

        return redirect()->route('admin.siswa.index')
            ->with('success', 'Akun siswa berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Siswa $siswa)
    {
        $siswa->delete();

        return back()->with('success', 'Akun siswa berhasil dihapus');
    }
}
