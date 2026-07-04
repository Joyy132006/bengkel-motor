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
    Schema::create('mechanics', function (Blueprint $table) {
        $table->id(); // ID unik mekanik
        $table->string('nama_mekanik');
        $table->string('keahlian'); // Misal: Spesialis Mesin, Listrik, atau Matic
        $table->timestamps();
    });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mechanics');
    }
};
