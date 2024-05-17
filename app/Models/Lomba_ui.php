<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lomba_ui extends Model
{
    use HasFactory;

    protected $guarded=[
        'id',
        'timestamps'
    ];

    public function tim()
    {
        return $this->belongsTo('App\Models\User','tim_id');
    }
}
