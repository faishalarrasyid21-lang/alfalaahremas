<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    protected $fillable = [
        'judul',
        'deskripsi', 
        'gambar',
        'google_drive_link',
        'tanggal',
        'waktu',
        'lokasi',
        'is_active'
    ];

    protected $casts = [
        'tanggal' => 'date',
        'waktu' => 'datetime:H:i',
        'is_active' => 'boolean'
    ];
}
