<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailWisata extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'detail_wisata';
    protected $guarded = [];
    protected $dates = ['deleted_at'];
    protected $appends = ['count_pemesanan'];

    public function getCountPemesananAttribute()
    {
        return 'holla';
    }

    public function wisata()
    {
        return $this->belongsTo(Wisata::class, 'wisata_id', 'id');
    }

    public function pemesanan()
    {
        return $this->hasMany(DetailPemesanan::class, 'detail_wisata_id', 'id');
    }
}
