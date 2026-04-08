<?php

namespace App\Http\Controllers\Siswa;

use App\Models\Siswa;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function showRegister()
    {
        return view('siswa.auth.register', [
            'nis' => session('nis')
        ]);
    }

    public function register(Request $request)
    {
        $request->validate([
            'nis' => 'required|unique:siswas,nis',
            'nama' => 'required',
            'kelas' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        $siswa = Siswa::create([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'password' => \Illuminate\Support\Facades\Hash::make($request->password),
        ]);

        Auth::guard('siswa')->login($siswa);
        $request->session()->regenerate();

        return redirect()->route('siswa.dashboard');
    }
}
