<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'pegawai';

    protected $fillable = [
        'nama',
        'nip',
        'sk_cpns',
        'sk_pns',
        'kk',
        'akte',
        'ktp',
        'ijazah_sd',
        'ijazah_smp',
        'ijazah_sma',
        'ijazah_kuliah',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'nip', 'nip');
    }
}
