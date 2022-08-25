<?php

namespace App\Http\Controllers;

use App\Models\JenisWisata;
use App\Models\Pengurus;
use App\Models\Wisata;
use Illuminate\Http\Request;

class WisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Wisata';
        $data['data'] = Wisata::with(['pengurus', 'jenis_wisata'])->get();
        $data['pengurus'] = Pengurus::all();
        $data['jenis_wisata'] = JenisWisata::all();

        return view('wisata.index', $data);
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
            'jenis_wisata_id' => 'required',
            'alamat' => 'required',
            'nama' => 'required'
        ]);

        $data = Wisata::create($request->all());

        if ($data) {
            return redirect()->route('wisata.index')->with('message', 'Success');
        } else {
            return redirect()->route('wisata.index')->with('message', 'Error');
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
        $data['data'] = Wisata::find($id);

        return view('wisata.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['title'] = 'Wisata';
        $data['data'] = Wisata::with(['pengurus', 'jenis_wisata'])->where('id', $id)->first();
        $data['pengurus'] = Pengurus::all();
        $data['jenis_wisata'] = JenisWisata::all();

        return view('wisata.edit', $data);
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
        $data = Wisata::find($id)->update($request->all());

        if ($data) {
            return redirect()->route('wisata.index')->with('message', 'Success');
        } else {
            return redirect()->route('wisata.index')->with('message', 'Error');
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
        $data = Wisata::destroy($id);

        if ($data) {
            return redirect()->route('wisata.index')->with('message', 'Success');
        } else {
            return redirect()->route('wisata.index')->with('message', 'Error');
        }
    }
}
