<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */


    protected $table = "users";

    protected $fillable = [
        'nama_user',
        'email',
        'password',
        'no_telepon',
        'user_tipe',
        'broker_agen',
    ];

    public function listing()
    {
        return $this->hasMany(listing::class);
    }

    public function pesan()
    {
        return $this->hasMany(message::class,'user_id');
        return $this->hasMany(message::class,'agen_id');
    }

    public function pengunjung()
    {
        return $this->hasMany(visitor::class,'user_id');
        return $this->hasMany(visitor::class,'agen_id');
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
