<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
    Schema::create('bookings', function (Blueprint $table) {
        $table->id();
        
        // TAMBAHKAN KODE DI BAWAH INI:
        $table->string('nama_pelanggan');
        $table->string('nomer_plat');
        $table->string('tipe_motor');
        $table->date('tanggal_booking');
        $table->string('jam_booking');
        $table->string('status_servis')->default('Menunggu Antrean'); // Otomatis terisi ini
        
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
