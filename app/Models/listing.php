<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class listing extends Model
{
    use HasFactory;

    protected $table = 'listing';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_listing',
        'user_id',
        'tipe_listing',
        'tipe_hunian',
        'alamat',
        'deskripsi',
        'sertifikat',
        'views',
        'tanggal_update',
        'kabId'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function fasilitaslisting()
    {
        return $this->hasMany(facilitylisting::class, 'listing_id');
    }

    public function multigambar()
    {
        return $this->hasMany(multiimage::class, 'listing_id');
    }

    public function kriteria()
    {
        return $this->hasOne(criteria::class);
    }

    public function kabupaten()
    {
        return $this->belongsTo(kabupaten::class);
    }

    public function pesan()
    {
        return $this->hasMany(message::class, 'listing_id');
    }

    public function pengunjung()
    {
        return $this->hasMany(visitor::class, 'listing_id');
    }
}
