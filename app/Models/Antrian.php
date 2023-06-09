<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antrian extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nik',
        'status',
        'poli',
        'alamat',
        'no_telp',
        'no_bpjs',
        'tanggal',
        'user_id'
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    // public function checkup()
    // {
    //     return $this->hasOne(Checkup::class, 'antrian_id');
    // }
    public function checkup()
    {
        return $this->hasOne(Checkup::class);
    }
}
