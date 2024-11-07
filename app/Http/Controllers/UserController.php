<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the users.
     */
    public function index()
    {
        $users = User::with('roles')
                     ->where('is_confirmed', 1) // Mengambil hanya pengguna yang sudah dikonfirmasi
                     ->get();

        return view('users.index', compact('users'));
    }

    /**
     * Display a listing of unconfirmed users for admin.
     */
    public function unconfirmedUsers()
    {
        $users = User::where('is_confirmed', false)->get(); // Mengambil user yang belum dikonfirmasi
        return view('users.unconfirmed', compact('users'));
    }

    /**
     * Show the form for creating a new user.
     */
    public function create()
    {
        $roles = Role::all(); // Mendapatkan semua role untuk ditampilkan di form
        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created user in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'nip' => ['required', 'string', 'max:20', 'unique:users,nip'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'exists:roles,name'],
        ]);

        // Buat user baru dengan status belum dikonfirmasi
        $user = User::create([
            'name' => $request->name,
            'nip' => $request->nip,
            'password' => Hash::make($request->password),
            'is_confirmed' => true, // Status belum dikonfirmasi
        ]);

        // Menyimpan role user sementara, akan aktif setelah konfirmasi
        $user->assignRole($request->role);

        return redirect()->route('users.index')->with('success', 'User berhasil dibuat dan menunggu konfirmasi.');
    }


    /**
     * Confirm a user.
     */

    /**
     * Update the specified user in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'nip' => ['required', 'string', 'max:20', 'unique:users,nip,'.$user->id],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'exists:roles,name'],
        ]);

        $user->name = $request->name;
        $user->nip = $request->nip;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();
        $user->syncRoles($request->role);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified user from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
