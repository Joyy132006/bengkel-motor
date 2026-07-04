<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama_pelanggan',
        'nomer_plat',
        'tipe_motor',
        'keluhan',
        'tanggal_booking',
        'jam_booking',
        'status_servis',
        'status_pembayaran',
        'total_harga',
        'mechanic_id'
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 2. TAMBAHKAN FUNGSI INI (Logika relasinya)
    public function mechanic()
    {
        // Booking ini "Milik Dari" (belongsTo) seorang Mekanik
        return $this->belongsTo(Mechanic::class);
    }
}