<?php

namespace App\Http\Controllers;

use App\Models\Pengurus;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PengurusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Master Pengurus';
        $data['data'] =  Pengurus::all();

        return view('pengurus.index', $data);
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

        $run = Pengurus::create($request->all());

        if ($run) {
            return redirect()->route('pengurus.index')->with('message', 'Success');
        } else {
            return redirect()->route('pengurus.index')->with('message', 'Success');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['title'] = 'Master Pengurus';
        $data['data'] =  Pengurus::find($id);

        return view('pengurus.edit', $data);
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
        Pengurus::find($id)->update($request->all());

        return redirect()->route('pengurus.index')->with('message', 'Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pengurus::destroy($id);

        return redirect()->route('pengurus.index')->with('message', 'Success');
    }
}
