<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketWisata extends Model
{
    use HasFactory;
    protected $table = 'paket_wisata';
    protected $guarded = [];

    public function detail()
    {
        return $this->hasMany(DetailPaketWisata::class, 'paket_wisata_id', 'id');
    }
}
