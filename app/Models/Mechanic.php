<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mechanic extends Model
{
    use HasFactory;

    // 1. KASIH IZIN: Biar kolom ini bisa diisi pas kita ngetes nanti
    protected $fillable = ['nama_mekanik', 'keahlian'];

    // 2. KASIH LOGIKA: Kasih tau Laravel kalau 1 mekanik punya BANYAK bookingan
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}