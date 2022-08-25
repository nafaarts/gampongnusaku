<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderLandingController extends Controller
{
    public function show($id)
    {
        $data['title'] = 'Detail Slider';
        $data['data'] = Slider::find($id);

        return view('landing.slider.show', $data);
    }
}
