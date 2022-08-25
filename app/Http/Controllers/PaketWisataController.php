<?php

namespace App\Http\Controllers;

use App\Models\DetailPaketWisata;
use App\Models\DetailWisata;
use App\Models\PaketWisata;
use Illuminate\Http\Request;

class PaketWisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Paket Wisata';
        $data['data'] = PaketWisata::all();

        return view('paket_wisata.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'itinenary' => 'required'
        ]);

        $data = PaketWisata::create($request->all());

        if ($data) {
            return redirect()->route('paketwisata.index')->with('message', 'Success');
        } else {
            return redirect()->route('paketwisata.index')->with('message', 'Error');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['title'] = 'Detail Paket Wisata';
        $data['data'] = PaketWisata::find($id);
        $data['wisata'] = DetailPaketWisata::whereHas('wisata')->where('paket_wisata_id', $id)->get();
        $data['wisata_all'] = DetailWisata::whereNotIn('id', $data['wisata']->pluck('detail_wisata_id'))->get();
        return view('paket_wisata.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['title'] = 'Paket Wisata';
        $data['data'] = PaketWisata::find($id);

        return view('paket_wisata.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = PaketWisata::find($id)->update($request->all());

        if ($data) {
            return redirect()->route('paketwisata.index')->with('message', 'Success');
        } else {
            return redirect()->route('paketwisata.index')->with('message', 'Error');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = PaketWisata::destroy($id);

        if ($data) {
            return redirect()->route('paketwisata.index')->with('message', 'Success');
        } else {
            return redirect()->route('paketwisata.index')->with('message', 'Error');
        }
    }

    public function adddetail($wisata, $detail)
    {
        $data = [
            'paket_wisata_id' => $wisata,
            'detail_wisata_id' => $detail
        ];

        $run = DetailPaketWisata::create($data);
        if ($run) {
            return redirect()->route('paketwisata.show', $wisata)->with('message', 'Success');
        } else {
            return redirect()->route('paketwisata.show', $wisata)->with('message', 'Success');
        }
    }
    public function hapusdetail($id)
    {

        $find = DetailPaketWisata::find($id);
        $run = DetailPaketWisata::destroy($id);
        if ($run) {
            return redirect()->route('paketwisata.show', $find->paket_wisata_id)->with('message', 'Success');
        } else {
            return redirect()->route('paketwisata.show', $find->paket_wisata_id)->with('message', 'Success');
        }
    }
}
