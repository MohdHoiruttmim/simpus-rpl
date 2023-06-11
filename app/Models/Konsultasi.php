<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konsultasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'poli',
        'keluhan',
        'status',
        'tanggal_konsul',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
