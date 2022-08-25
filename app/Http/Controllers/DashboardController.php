<?php

namespace App\Http\Controllers;

use App\Models\DetailWisata;
use App\Models\Pembayaran;
use App\Models\Pemesanan;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['pemesanan'] = Pemesanan::count();
        $data['pembayaran'] = Pembayaran::count();
        $data['detail_wisata'] = DetailWisata::withCount('pemesanan')->orderBy('pemesanan_count', 'DESC')->get()->take(3);
        $data['pembayaran_data'] = Pemesanan::where('status', '1')->whereHas('pembayaran')->orderBy('id', 'DESC')->get()->take(5);

        return view('dashboard.index', $data);
    }
}
