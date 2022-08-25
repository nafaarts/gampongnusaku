<?php

namespace App\View\Components;

use App\Models\JenisWisata;
use App\Models\Keranjang;
use Illuminate\View\Component;

class MainNavbar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $data['paket_wisata'] = JenisWisata::all();
        if (auth()->user()) {
            $data['count_keranjang'] = Keranjang::where(['user_id' => auth()->user()->id, 'is_checkout' => 0])->count();
        } else {
            $data['count_keranjang'] = '';
        }

        return view('landing.master.header', $data);
    }
}
