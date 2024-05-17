<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $guarded=[
        'id',
        'timestamps'
    ];
    use HasFactory;
    public function soal()
    {
        return $this->belongsTo('App\Models\Soal');
    }
}
