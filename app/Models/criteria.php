<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class criteria extends Model
{
    use HasFactory;

    protected $table = 'kriteria';
    protected $primaryKey = 'id';
    protected $fillable = [
        'listing_id',
        'luas_tanah',
        'luas_bangunan',
        'jlh_kmr_tidur',
        'jlh_kmr_mandi',
        'jlh_lantai',
        'daya_listrik',
        'harga'
    ];

    public function listing()
    {
        return $this->belongsTo(listing::class);
    }
}
