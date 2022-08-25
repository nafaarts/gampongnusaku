<?php

namespace App\Http\Controllers;

use App\Models\DetailPaketWisata;
use App\Models\DetailWisata;
use App\Models\Wisata;
use Illuminate\Http\Request;

class DetailWisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $data['title'] = 'Detail Wisata';
        $data['data'] = Wisata::find($id);
        $data['id'] = $id;

        return view('detail_wisata.create', $data);
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
            'harga' => 'required',
            'deskripsi' => 'required',
            'image' => 'required|max:10000|mimes: jpg,jpeg,png'
        ]);

        $data = DetailWisata::create($request->except('image'));
        if ($request->image) {
            $data->image = explode('/', $request->image->storeAs('public/image',  time() . '_FILE_' . 'DETAIL_WISATA' . '.' . $request->image->getClientOriginalExtension()))[2];
        }

        if ($data->save()) {
            return redirect()->route('detailwisata.create', $request->wisata_id)->with('message', 'Success');
        } else {
            return redirect()->route('detailwisata.create', $request->wisata_id)->with('message', 'Error');
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
        $data['title'] = 'Detail Wisata';
        $data['id'] = $id;
        $data['find'] = DetailWisata::find($id);
        $data['data'] = Wisata::find($data['find']->wisata_id);

        return view('detail_wisata.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['title'] = 'Detail Wisata';
        $data['id'] = $id;
        $data['find'] = DetailWisata::find($id);
        $data['data'] = Wisata::find($data['find']->wisata_id);

        return view('detail_wisata.edit', $data);
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
        $data = DetailWisata::find($id);
        $data->nama = $request->nama;
        $data->deskripsi = $request->deskripsi;
        $data->harga = $request->harga;
        if ($request->image) {
            $data->image = explode('/', $request->image->storeAs('public/image',  time() . '_FILE_' . 'DETAIL_WISATA' . '.' . $request->image->getClientOriginalExtension()))[2];
        }

        if ($data->save()) {
            return redirect()->route('wisata.show', $request->wisata_id)->with('message', 'Success');
        } else {
            return redirect()->route('wisata.show', $request->wisata_id)->with('message', 'Error');
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
        $data = DetailWisata::find($id)->wisata->id;
        $run = DetailPaketWisata::where('detail_wisata_id', $id)->delete();

        return redirect()->route('wisata.show', $data)->with('message', 'Success');
    }
}
