<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class facility extends Model
{
    use HasFactory;

    protected $table = 'fasilitas';
    protected $primaryKey = 'fasilitas_id';

    public function fasilitaslisting()
    {
        return $this->hasMany(facilitylisting::class, 'fasilitas_id');
    }
}
