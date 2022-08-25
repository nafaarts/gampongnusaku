<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;
    protected $table = 'keranjang';
    protected $guarded = [];

    public function getCountDayAttribute()
    {
        if (!$this->attributes['start']) {
            return 0;
        }
        $dateT = Carbon::parse($this->attributes['start']);
        $dateF = Carbon::parse($this->attributes['end']);

        return $dateT->diffInDays($dateF);
    }

    public function detail_wisata()
    {
        return $this->belongsTo(DetailWisata::class, 'detail_wisata_id')->withTrashed();
    }

    public function paket_wisata()
    {
        return $this->belongsTo(PaketWisata::class, 'paket_wisata_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
