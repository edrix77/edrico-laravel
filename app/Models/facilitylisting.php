<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class facilitylisting extends Model
{
    use HasFactory;
    protected $table = 'fasilitaslisting';
    protected $primaryKey = 'id';
    protected $fillable = [
        'listing_id',
        'fasilitas_id'
    ];

    public function fasilitas()
    {
        return $this->belongsTo(facility::class);
    }

    public function listing()
    {
        return $this->belongsTo(listing::class);
    }
}
