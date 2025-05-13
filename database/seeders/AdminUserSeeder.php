<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        // Membuat akun admin dengan role admin
        User::create([
            'name' => 'Admin', // Nama admin
            'email' => 'admin@example.com', // Email admin
            'password' => Hash::make('password123'), // Password admin
            'is_admin' => true, // Menambahkan kolom is_admin sebagai tanda admin (jika ada kolom ini di tabel users)
        ]);
    }
}