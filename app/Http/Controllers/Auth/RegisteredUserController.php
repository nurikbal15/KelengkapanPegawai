<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'nip' => ['required', 'string', 'max:20', 'unique:users,nip'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Buat user dengan status belum dikonfirmasi
        User::create([
            'name' => $request->name,
            'nip' => $request->nip,
            'password' => Hash::make($request->password),
            'is_confirmed' => false, // Pengguna menunggu konfirmasi
        ]);

        return redirect('/login')->with('status', 'Akun Anda menunggu konfirmasi dari admin.');
    }
}
