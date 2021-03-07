<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class message extends Model
{
    use HasFactory;
    protected $table = 'pesan';
    protected $fillable = [
        'agen_id',
        'listing_id',
        'user_id',
        'isi_pesan',
        'pesan_terbaca',
        'tanggal'
    ];

    public function listing()
    {
        return $this->belongsTo(listing::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
