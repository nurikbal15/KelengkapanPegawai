<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pegawai;
use Illuminate\Http\RedirectResponse;

class AdminUserController extends Controller
{
    public function showUnconfirmedUsers()
    {
        $users = User::where('is_confirmed', false)->get();
        return view('admin.unconfirmed_users', compact('users'));
    }

    public function confirmUser($id)
    {
        $user = User::findOrFail($id);
        $user->is_confirmed = true; // Konfirmasi user
        $user->save();

        // Periksa apakah data Pegawai dengan NIP yang sama sudah ada
        if (!Pegawai::where('nip', $user->nip)->exists()) {
            // Buat data pegawai setelah konfirmasi jika belum ada
            Pegawai::create([
                'nama' => $user->name,
                'nip' => $user->nip,
            ]);
        }

        return redirect()->route('admin.unconfirmed_users')->with('success', 'User berhasil dikonfirmasi dan data pegawai telah ditambahkan.');
    }







}
