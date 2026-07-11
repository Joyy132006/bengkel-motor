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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category'); // e.g. Ban, Oli, Aki, Suku Cadang
            $table->string('brand');
            $table->integer('price');
            $table->string('stock')->default('Tersedia'); // Tersedia, Stok Terbatas, Habis
            $table->text('desc')->nullable();
            $table->string('icon')->default('settings'); // disc, droplets, battery, settings
            $table->string('image')->default('vbelt_kit_federal.png');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
