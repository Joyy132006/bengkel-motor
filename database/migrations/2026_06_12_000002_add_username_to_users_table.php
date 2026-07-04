<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Tambah kolom kalau belum ada
        if (!Schema::hasColumn('users', 'username')) {
            Schema::table('users', function (Blueprint $table) {
                $table->string('username')->nullable()->after('name');
            });
        }

        // Isi existing users yang belum punya username
        $users = DB::table('users')->where(function($q) {
            $q->whereNull('username')->orWhere('username', '');
        })->get();
        foreach ($users as $user) {
            DB::table('users')->where('id', $user->id)->update([
                'username' => 'USR' . str_pad($user->id, 3, '0', STR_PAD_LEFT)
            ]);
        }

        // Tambah unique constraint kalau belum ada
        try {
            Schema::table('users', function (Blueprint $table) {
                $table->unique('username');
            });
        } catch (\Exception $e) {
            // Unique constraint sudah ada, skip
        }
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'username')) {
                $table->dropUnique(['username']);
                $table->dropColumn('username');
            }
        });
    }
};
