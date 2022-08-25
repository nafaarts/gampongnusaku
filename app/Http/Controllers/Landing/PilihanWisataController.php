<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\DetailWisata;
use App\Models\JenisWisata;
use App\Models\PaketWisata;
use App\Models\Slider;
use App\Models\Wisata;
use Illuminate\Http\Request;

class PilihanWisataController extends Controller
{
    public function index($id)
    {
        $data['title'] = 'Pilihan Wisata';
        $data['data'] = JenisWisata::all();
        $data['slider'] = Slider::all();
        $data['wisata'] = Wisata::where('jenis_wisata_id', $id)->get();

        return view('landing.pilihanwisata.index', $data);
    }

    public function show($id)
    {
        $data['title'] = 'Product Detail';
        $data['data'] = DetailWisata::find($id);
        $data['detail_wisata'] = DetailWisata::all();

        return view('landing.pilihanwisata.show', $data);
    }
}
