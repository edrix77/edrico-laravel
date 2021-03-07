<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class visitor extends Model
{
    use HasFactory;

    protected $table = 'pengunjung';

    protected $fillable = [
        'agen_id',
        'user_id',
        'listing_id',
        'tanggal'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function listing()
    {
        return $this->belongsTo(listing::class);
    }
}
