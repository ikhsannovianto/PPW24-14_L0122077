<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'kota',
        'negara',
        'tahun_berdiri',
        'stadion',
        'pelatih',
        'logo',
    ];
}