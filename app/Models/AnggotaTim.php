<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnggotaTim extends Model
{
    protected $fillable=['tim_id','nama','tanggal_lahir','no_wa','ketua','buktiSiswa','pas_foto'];
    
    public function tim()
    {
        return $this->belongsTo('App\Models\User');
    }
}
