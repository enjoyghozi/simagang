<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User; // pastikan model User ada
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'instansi' => null,
            'password' => Hash::make('password123'), // ganti password default
            'role' => 'admin', // pastikan kolom role ada di tabel users
            'status_akun' => 'diterima', // pastikan kolom role ada di tabel users
        ]);
        User::create([
            'name' => 'user',
            'email' => 'user@example.com',
            'instansi' => null,
            'password' => Hash::make('password123'), // ganti password default
            'role' => 'peserta', // pastikan kolom role ada di tabel users
            'status_akun' => 'diterima', // pastikan kolom role ada di tabel users
        ]);
    }
}
