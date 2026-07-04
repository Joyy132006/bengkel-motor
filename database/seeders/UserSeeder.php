<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->updateOrInsert(
            ['email' => 'admin@bengkelpro.com'],
            [
                'name'       => 'Admin BengkelPro',
                'username'   => 'ADM001',
                'role'       => 'admin',
                'password'   => Hash::make('admin123'),
                'updated_at' => now(),
            ]
        );

        DB::table('users')->updateOrInsert(
            ['email' => 'kasir@bengkelpro.com'],
            [
                'name'       => 'Kasir BengkelPro',
                'username'   => 'KSR001',
                'role'       => 'kasir',
                'password'   => Hash::make('kasir123'),
                'updated_at' => now(),
            ]
        );
    }
}
