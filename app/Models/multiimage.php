<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class multiimage extends Model
{
    use HasFactory;

    protected $table = 'multigambar';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama_file',
        'listing_id'
    ];

    public function listing()
    {
        return $this->belongsTo(listing::class, 'listing_id');
    }
}
