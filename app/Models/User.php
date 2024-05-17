<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'namaTim',
        'emailTim',
        'password',
        'asalSekolah',
        'kotaSekolah',
        'provinsiSekolah',
    ];



    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function tim(){
        return $this->hasMany('App\Models\AnggotaTim','tim_id','id');
    }

    public function lomba_ui(){
        return $this->hasOne('App\Models\Lomba_ui','tim_id','id');
    }
    public function lomba_olym(){
        return $this->hasOne('App\Models\LombaOlim','tim_id','id');
    }

    public function summaries(){
        return $this->hasMany('App\Models\Summary','tim_id','id');
    }
}
