<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPemesanan extends Model
{
    use HasFactory;
    protected $table = 'detail_pemesanan';
    protected $guarded = [];
    protected $appends = ['count_day'];

    public function detail_wisata()
    {
        return $this->belongsTo(DetailWisata::class, 'detail_wisata_id', 'id');
    }

    public function getCountDayAttribute()
    {
        if (!$this->attributes['check_in']) {
            return 0;
        }
        $dateT = Carbon::parse($this->attributes['check_in']);
        $dateF = Carbon::parse($this->attributes['check_out']);

        return $dateT->diffInDays($dateF);
    }

    public function paket_wisata()
    {
        return $this->belongsTo(PaketWisata::class, 'paket_wisata_id');
    }
}
