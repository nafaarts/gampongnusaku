<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Slider;
use Illuminate\Http\Request;

class DokumentasiController extends Controller
{
    public function index()
    {
        $data['title'] = 'Dokumentasi';
        $data['slider'] = Slider::all();
        $data['gallery'] = Gallery::all();

        return view('landing.dokumentasi.index', $data);
    }
    public function show($id)
    {
        $data['title'] = 'Dokumentasi';
        $data['data'] = Gallery::find($id);

        return view('landing.dokumentasi.show', $data);
    }
}
