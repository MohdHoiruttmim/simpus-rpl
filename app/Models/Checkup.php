<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkup extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nik',
        'status',
        'poli',
        'no_bpjs',
        'tanggal',
    ];
}
