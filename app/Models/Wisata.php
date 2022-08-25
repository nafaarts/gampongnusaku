<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    use HasFactory;
    protected $table = 'wisata';
    protected $guarded = [];

    public function pengurus()
    {
        return $this->belongsTo(Pengurus::class, 'pengurus_id', 'id');
    }

    public function jenis_wisata()
    {
        return $this->belongsTo(JenisWisata::class, 'jenis_wisata_id', 'id');
    }

    public function detail_wisata()
    {
        return $this->hasMany(DetailWisata::class, 'wisata_id', 'id');
    }
}
