<?php

namespace App\Http\Controllers;
use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $pegawaiCount = Pegawai::count();
        $userCount = User::where('is_confirmed', 1)->count();
        $unconfirmedUserCount = User::where('is_confirmed', 0)->count(); // Menghitung jumlah pengguna menunggu konfirmasi

        return view('dashboard', compact('pegawaiCount', 'userCount', 'unconfirmedUserCount'));
    }
}
