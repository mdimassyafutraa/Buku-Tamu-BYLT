<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tamu extends Model
{
    use HasFactory;
    protected $table = 'tamu';

    protected $fillable = [
        'qr_code',
        'name',
        'alamat',
        'no_telp',
        'profesi',
        'instansi',
        'tanggal_kunjungan',
        'waktu_kunjungan',
        'tujuan',
        'nama_tujuan_tamu',
        'status',
        'last_status_change',
    ];

    function user()
    {
        return $this->belongsTo(User::class);
    }
}
