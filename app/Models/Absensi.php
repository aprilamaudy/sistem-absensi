<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $fillable = [
        'matkul_id',
        'nama',
        'lat',
        'long',
        'radius',
        'des',
        'batas',
    ];

    protected $casts = [
        'batas' => 'datetime',
    ];

    public function matkul()
    {
        return $this->belongsTo(Matkul::class);
    }

    public function kehadiran()
    {
        return $this->hasMany(Kehadiran::class);
    }
}
