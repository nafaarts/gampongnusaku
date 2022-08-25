<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\PaketWisata;
use App\Models\Slider;
use Illuminate\Http\Request;

class PaketWisataController extends Controller
{
    public function index()
    {
        $data['title'] = 'Paket Wisata';
        $data['slider'] = Slider::all();
        $data['paket_wisata'] = PaketWisata::with('detail')->whereHas('detail')->get();

        return view('landing.paketwisata.index', $data);
    }

    public function show($id)
    {
        $data['title'] = 'Detail Paket Wisata';
        $data['paket_wisata'] = PaketWisata::find($id);

        return view('landing.paketwisata.show', $data);
    }

    public function detail(Request $request)
    {
        $data['data'] = PaketWisata::with('detail.wisata')->where('id', $request->id)->first();

        return $data;
    }
}
