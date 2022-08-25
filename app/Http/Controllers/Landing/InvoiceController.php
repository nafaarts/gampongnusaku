<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Pemesanan;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function show($id)
    {
        $data['title'] = 'Pemesanan Detail';
        $data['pemesanan'] = Pemesanan::find($id);

        return view('landing.invoice.show', $data);
    }
}
