<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\Pegawai;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // Ambil user yang sedang login
        $user = Auth::user();

        // Cek apakah user telah dikonfirmasi oleh admin
        if (! $user->is_confirmed) {
            Auth::logout();
            return redirect()->route('login')->withErrors(['nip' => 'Akun Anda belum dikonfirmasi oleh admin.']);
        }

        // Cek role pengguna
        if ($user->hasRole('admin')) {
            // Arahkan admin ke halaman dashboard
            return redirect()->route('dashboard');
        } elseif ($user->hasRole('user')) {
            // Cari data pegawai berdasarkan NIP pengguna
            $pegawai = Pegawai::where('nip', $user->nip)->first();

            // Jika data pegawai ditemukan, arahkan ke halaman show pegawai
            if ($pegawai) {
                return redirect()->route('pegawai.show', $pegawai->id);
            }
        }

        // Jika role tidak cocok, arahkan ke halaman default (misal dashboard umum)
        return redirect()->intended(route('home'));
    }


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
