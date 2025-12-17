<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nama_user' => 'admin',
            'username' => 'admin123',
            'password' => bcrypt('admin'),
            'role' => 'admin',
        ]);
        User::create([
            'nama_user' => 'dosen',
            'username' => 'dosen123',
            'password' => bcrypt('dosen'),
            'role' => 'dosen',
        ]);
        User::create([
            'nama_user' => 'mahasiswa',
            'username' => 'mahasiswa123',
            'password' => bcrypt('mahasiswa'),
            'role' => 'mahasiswa',
        ]);
    }
}
