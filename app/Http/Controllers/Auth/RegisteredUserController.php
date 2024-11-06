<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Pegawai; // Pastikan model Pegawai diimport
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'nip' => ['required', 'string', 'max:20', 'unique:users,nip'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Buat user baru dengan status belum dikonfirmasi
        $user = User::create([
            'name' => $request->name,
            'nip' => $request->nip,
            'password' => Hash::make($request->password),
            'is_confirmed' => false, // Set is_confirmed menjadi false saat register
        ]);

        // Tambahkan data pegawai secara otomatis
        Pegawai::create([
            'nama' => $user->name,
            'nip' => $user->nip,
        ]);

        event(new Registered($user));

        // Kembalikan ke halaman login dengan pesan status
        return redirect('/login')->with('status', 'Akun Anda menunggu konfirmasi dari admin.');
    }
}
