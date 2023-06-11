<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkup extends Model
{
    use HasFactory;

    protected $fillable = [
        'diagnosa',
        'antrian_id'
    ];

    public function antrian()
    {
        return $this->belongsTo(Antrian::class);
    }
}
