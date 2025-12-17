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
        DB::table('users')->insert([
            'nama_user' => 'admin',
            'username' => 'admin',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);
        
        DB::table('users')->insert([
            'nama_user' => 'dosen',
            'username' => 'dosen',
            'password' => Hash::make('dosen123'),
            'role' => 'dosen',
        ]);
        DB::table('users')->insert([
            'nama_user' => 'mahasiswa',
            'username' => 'mahasiswa',
            'password' => Hash::make('mahasiswa123'),
            'role' => 'mahasiswa',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};