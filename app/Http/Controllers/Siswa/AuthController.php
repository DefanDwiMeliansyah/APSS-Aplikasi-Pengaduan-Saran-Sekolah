<?php

namespace App\Http\Controllers\Siswa;

use App\Models\Siswa;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('siswa.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'nis' => 'required',
            'password' => 'required',
        ]);

        if (Auth::guard('siswa')->attempt(['nis' => $request->nis, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->route('siswa.dashboard');
        }

        return back()->withErrors([
            'auth' => 'NIS atau Password salah.',
        ])->onlyInput('nis');
    }

    public function logout(Request $request)
    {
        Auth::guard('siswa')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('siswa.login');
    }
}
