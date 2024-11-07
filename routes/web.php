<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('auth.login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified', 'role:admin'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

    // Route khusus admin
    Route::middleware('role:admin')->group(function () {
        Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai.index');
        Route::get('/pegawai/create', [PegawaiController::class, 'create'])->name('pegawai.create');
        Route::post('/pegawai', [PegawaiController::class, 'store'])->name('pegawai.store');
        Route::delete('/pegawai/{pegawai}', [PegawaiController::class, 'destroy'])->name('pegawai.destroy');
        Route::get('/pegawai/{id}/download-all', [PegawaiController::class, 'downloadAll'])->name('pegawai.downloadAll');
        Route::get('/admin/unconfirmed-users', [AdminUserController::class, 'showUnconfirmedUsers'])->name('admin.unconfirmed_users');
        Route::post('/admin/confirm-user/{id}', [AdminUserController::class, 'confirmUser'])->name('admin.confirm_user');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
        Route::resource('users', UserController::class);



    });

    // Route::middleware(['auth', 'checkUserConfirmed'])->group(function () {
    //     Route::get('/pegawai/{pegawai}', [PegawaiController::class, 'show'])->name('pegawai.show');
    //     Route::get('/pegawai/{pegawai}/edit', [PegawaiController::class, 'edit'])->name('pegawai.edit');
    //     Route::put('/pegawai/{pegawai}', [PegawaiController::class, 'update'])->name('pegawai.update');

    // });

    // Route khusus user untuk melihat dan mengedit data pegawai mereka sendiri
    Route::middleware('role:user')->group(function () {
        Route::get('/pegawai/{pegawai}', [PegawaiController::class, 'show'])->name('pegawai.show');
        Route::get('/pegawai/{pegawai}/edit', [PegawaiController::class, 'edit'])->name('pegawai.edit');
        Route::put('/pegawai/{pegawai}', [PegawaiController::class, 'update'])->name('pegawai.update');
    });

Route::resource('pegawai', PegawaiController::class);

Route::get('/test', function () {
    return view('test');
});


require __DIR__.'/auth.php';

