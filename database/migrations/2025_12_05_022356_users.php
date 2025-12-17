<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nama_user');
            $table->string('username')->unique();
            $table->string('nim')->nullable()->unique();
            $table->string('nip')->nullable()->unique();
            $table->string('email')->nullable()->unique();
            $table->string('no_hp')->nullable();
            $table->string('password');
            $table->enum('role', ['dosen', 'mahasiswa', 'admin']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
