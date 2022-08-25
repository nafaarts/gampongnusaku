<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Gallery';
        $data['data'] = Gallery::all();

        return view('gallery.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
            'nama_kegiatan' => 'required',
            'deskripsi' => 'required'
        ]);

        $image = '';
        if ($request->file_gambar) {
            $image = explode('/', $request->file_gambar->storeAs('public/image',  time() . '_FILE_' . 'GALLERY' . '.' . $request->file_gambar->getClientOriginalExtension()))[2];
        }

        $content = $request->deskripsi;
        $dom = new \DOMDocument();
        $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $imageFile = $dom->getElementsByTagName('imageFile');
        foreach ($imageFile as $item => $image) {
            $data = $image->getAttribute('src');
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $imgeData = base64_decode($data);
            $image_name = "/upload/" . time() . $item . '.png';
            $path = public_path() . $image_name;
            file_put_contents($path, $imgeData);

            $image->removeAttribute('src');
            $image->setAttribute('src', $image_name);
        }

        $content = $dom->saveHTML();
        $fileUpload = new Gallery;
        $fileUpload->nama_kegiatan = $request->nama_kegiatan;
        $fileUpload->deskripsi = $content;
        $fileUpload->image = $image;
        $fileUpload->save();

        if ($fileUpload) {
            return redirect()->route('gallery.index')->with('message', 'Success');
        } else {
            return redirect()->route('gallery.index')->with('message', 'Error');
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
        $data['title'] = 'Gallery';
        $data['data'] = Gallery::find($id);

        return view('gallery.edit', $data);
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

        $image = '';
        if ($request->file_gambar) {
            $image = explode('/', $request->file_gambar->storeAs('public/image',  time() . '_FILE_' . 'GALLERY' . '.' . $request->file_gambar->getClientOriginalExtension()))[2];
        }

        $content = $request->deskripsi;
        $dom = new \DOMDocument();
        $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $imageFile = $dom->getElementsByTagName('imageFile');
        foreach ($imageFile as $item => $image) {
            $data = $image->getAttribute('src');
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $imgeData = base64_decode($data);
            $image_name = "/upload/" . time() . $item . '.png';
            $path = public_path() . $image_name;
            file_put_contents($path, $imgeData);

            $image->removeAttribute('src');
            $image->setAttribute('src', $image_name);
        }

        $content = $dom->saveHTML();
        $fileUpload = Gallery::find($id);
        $fileUpload->nama_kegiatan = $request->nama_kegiatan;
        $fileUpload->deskripsi = $content;
        $fileUpload->image = $image;
        $fileUpload->update();

        if ($fileUpload) {
            return redirect()->route('gallery.index')->with('message', 'Success');
        } else {
            return redirect()->route('gallery.index')->with('message', 'Error');
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
        $run = Gallery::destroy($id);
        if ($run) {
            return redirect()->route('gallery.index')->with('message', 'Success');
        } else {
            return redirect()->route('gallery.index')->with('message', 'Error');
        }
    }
}
