<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;

class AdminUserController extends Controller
{
    public function showUnconfirmedUsers()
    {
        $users = User::where('is_confirmed', false)->get();
        return view('admin.unconfirmed_users', compact('users'));
    }

    public function confirmUser($id): RedirectResponse
    {
        $user = User::findOrFail($id);
        $user->is_confirmed = true;
        $user->save();

        // Beri role "user" setelah konfirmasi
        $user->assignRole('user');

        return redirect()->back()->with('status', 'User berhasil dikonfirmasi.');
    }
}
