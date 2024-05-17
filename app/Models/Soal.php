<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    protected $guarded=[
        'id',
        'timestamps'
    ];
    use HasFactory;
    public function options(){
        return $this->hasMany('App\Models\Option','soal_id','id');
    }

    public function jawaban($soal_id){
        return Option::where([
            'soal_id'=>$soal_id,
            'benar'=>true
        ])->first()->isi_option;
    }

    public function jawaban_gambar($soal_id){
        return Option::where([
            'soal_id'=>$soal_id,
            'benar'=>true
        ])->first()->gambar_option;
    }
}
