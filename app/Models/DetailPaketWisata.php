<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPaketWisata extends Model
{
    use HasFactory;
    protected $table = 'detail_paket_wisata';
    protected $guarded = [];

    public function wisata()
    {
        return $this->belongsTo(DetailWisata::class, 'detail_wisata_id', 'id')->withTrashed();
    }

    public function getNamaBarangAttribute()
    {
        return $this->wisata->attributes['nama'];
    }
}
