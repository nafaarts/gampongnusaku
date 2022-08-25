<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Main Slider';
        $data['data'] = Slider::all();

        return view('slider.index', $data);
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
            'title' => 'required',
            'deskripsi' => 'required',
            'image' => 'required|max:10000|mimes: jpg,jpeg,png'
        ]);

        $image = '';
        if ($request->image) {
            $image = explode('/', $request->image->storeAs('public/image',  time() . '_FILE_' . 'SLIDER' . '.' . $request->image->getClientOriginalExtension()))[2];
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
        $slider = new Slider;
        $slider->title = $request->title;
        $slider->image = $image;
        $slider->deskripsi = $content;


        if ($slider->save()) {
            return redirect()->route('sliders.index')->with('message', 'Success');
        } else {
            return redirect()->route('sliders.index')->with('message', 'Error');
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
        $data['title'] = 'Main Slider';
        $data['data'] = Slider::find($id);

        return view('slider.edit', $data);
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
        if ($request->image) {
            $image = explode('/', $request->image->storeAs('public/image',  time() . '_FILE_' . 'SLIDER' . '.' . $request->image->getClientOriginalExtension()))[2];
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
        $slider = Slider::find($id);
        $slider->title = $request->title;
        if ($request->image) {
            $slider->image = $image;
        }
        $slider->deskripsi = $content;


        if ($slider->update()) {
            return redirect()->route('sliders.index')->with('message', 'Success');
        } else {
            return redirect()->route('sliders.index')->with('message', 'Error');
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
        $data = SLider::destroy($id);
        if ($data) {
            return redirect()->route('sliders.index')->with('message', 'Success');
        } else {
            return redirect()->route('sliders.index')->with('message', 'Error');
        }
    }
}
