<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'judul',
        'mata_kuliah',
        'deskripsi',
        'deadline',
        'selesai',
    ];

    protected $casts = [
        'selesai' => 'boolean',
        'deadline' => 'date',
    ];
}
