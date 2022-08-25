<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Pengguna';
        $data['data'] = User::all();

        return view('pengguna.index', $data);
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
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 1
        ];

        $run = User::create($data);
        if ($run) {
            return redirect()->route('pengguna.index')->with('message', 'Success');
        } else {
            return redirect()->route('pengguna.index')->with('message', 'Errors');
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
        $data['title'] = 'Pengguna';
        $data['data'] = User::find($id);

        return view('pengguna.edit', $data);
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
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'role' => 1
        ];

        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }
        $run = User::find($id)->update($data);

        if ($run) {
            return redirect()->route('pengguna.index')->with('message', 'Success');
        } else {
            return redirect()->route('pengguna.index')->with('message', 'Errors');
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
        $run = User::find($id)->delete();

        if ($run) {
            return redirect()->route('pengguna.index')->with('message', 'Success');
        } else {
            return redirect()->route('pengguna.index')->with('message', 'Errors');
        }
    }
}
