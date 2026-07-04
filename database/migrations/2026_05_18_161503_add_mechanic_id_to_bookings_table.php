<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan perubahan (Menambah kolom & relasi)
     */
    public function up(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            // 1. Tambah kolom mechanic_id setelah ID (nullable = boleh kosong dulu)
            $table->unsignedBigInteger('mechanic_id')->nullable()->after('id');

            // 2. Hubungkan kolom ini ke tabel 'mechanics'
            // references('id')->on('mechanics') = merujuk ke kolom ID di tabel mechanics
            // onDelete('set null') = Kalau mekaniknya dihapus, datanya gak ikutan ilang, cuma jadi kosong (null)
            $table->foreign('mechanic_id')->references('id')->on('mechanics')->onDelete('set null');
        });
    }

    /**
     * Batalkan perubahan (Jika kamu melakukan migrate:rollback)
     */
    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            // Hapus foreign key dan kolomnya jika ingin membatalkan
            $table->dropForeign(['mechanic_id']);
            $table->dropColumn('mechanic_id');
        });
    }
};