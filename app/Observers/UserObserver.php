<?php

namespace App\Observers;

use App\Models\User;
use App\Models\Pegawai;

class UserObserver
{
    /**
     * Handle the User "updated" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function created(User $user): void
    {
        //
    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user)
    {
        // Periksa apakah is_confirmed berubah menjadi true
        if ($user->is_confirmed && !Pegawai::where('nip', $user->nip)->exists()) {
            // Buat data pegawai baru berdasarkan data user
            Pegawai::create([
                'nama' => $user->name,
                'nip' => $user->nip,
            ]);
        }
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        //
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        //
    }
}
