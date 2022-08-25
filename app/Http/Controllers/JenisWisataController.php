<?php

namespace App\Http\Controllers;

use App\Models\JenisWisata;
use Illuminate\Http\Request;

class JenisWisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Master Jenis Wisata';
        $data['data'] = JenisWisata::all();

        return view('jeniswisata.index', $data);
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
        $run = JenisWisata::create($request->all());

        if ($run) {
            return redirect()->route('jeniswisata.index')->with('message', 'Success');
        } else {
            return redirect()->route('jeniswisata.index')->with('message', 'Error');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['title'] = 'Master Jenis Wisata';
        $data['data'] = JenisWisata::all();
        $data['show'] = JenisWisata::find($id);

        return view('jeniswisata.edit', $data);
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
        $run = JenisWisata::find($id)->update($request->all());

        if ($run) {
            return redirect()->route('jeniswisata.index')->with('message', 'Success');
        } else {
            return redirect()->route('jeniswisata.index')->with('message', 'Error');
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
        $run = JenisWisata::destroy($id);

        if ($run) {
            return redirect()->route('jeniswisata.index')->with('message', 'Success');
        } else {
            return redirect()->route('jeniswisata.index')->with('message', 'Error');
        }
    }
}
