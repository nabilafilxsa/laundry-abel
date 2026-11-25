<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder {
    public function run(): void {
        // 1. Akun Admin
        User::create([
            'name' => 'Admin Laundry',
            'email' => 'admin@laundry.test',
            'password' => Hash::make('password123'),
            'role' => 'admin'
        ]);

        // 2. Akun Kasir (Sesuai papan tulis)
        User::create([
            'name' => 'Kasir Laundry',
            'email' => 'kasir@laundry.test',
            'password' => Hash::make('password123'),
            'role' => 'kasir'
        ]);
    }
}
