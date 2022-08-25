<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;
    protected $table = 'pemesanan';
    protected $guarded = [];


    public function detail_pemesanan()
    {
        return $this->hasMany(DetailPemesanan::class, 'pemesanan_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id')->withTrashed();
    }

    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class, 'pemesanan_id');
    }
}
