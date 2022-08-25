<?php

namespace App\Http\Controllers;

use App\Models\DetailPemesanan;
use App\Models\Keranjang;
use App\Models\Pemesanan;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class KeranjangController extends Controller
{

    public function index()
    {
        if (Auth::check()) {
            $data['title'] = 'Keranjang';
            $data['data'] = Keranjang::where(['user_id' => auth()->user()->id, 'is_checkout' => '0'])->get();
            $data['slider'] = Slider::all();

            // dd($data['data'][2]->paket_wisata);
            return view('landing.keranjang.index', $data);
        } else {
            return redirect()->back()->with(['message' => 'Gagal', 'status' => 'false']);
        }
    }

    public function addCart(Request $request)
    {
        if (Auth::check()) {
            $keranjang = Keranjang::where(['user_id' => auth()->user()->id, 'detail_wisata_id' => $request->detail_wisata_id])->where('is_checkout', '!=', '1')->get();
            if ($keranjang->count() > 0) {
                return redirect()->back()->with('status', false);
            }
            $date = explode('-', $request->startend);
            $run = Keranjang::create([
                'user_id' => auth()->user()->id,
                'detail_wisata_id' => $request->detail_wisata_id,
                'paket_wisata_id' => 0,
                'start' => trim($date[0]),
                'end' => trim($date[1]),
                'pack' => $request->pack,
                'is_checkout' => 0
            ]);


            if ($run) {
                return redirect()->back()->with(['message' => 'Berhasil', 'status' => 'true']);
            } else {
                return redirect()->back()->with(['message' => 'Gagal', 'status' => 'false']);
            }
        } else {
            return redirect()->route('login');
        }
    }

    public function addCartPaket(Request $request)
    {
        if (Auth::check()) {
            $keranjang = Keranjang::where(['user_id' => auth()->user()->id, 'paket_wisata_id' => $request->paket_wisata_id])->where('is_checkout', '!=', '1')->get();
            if ($keranjang->count() > 0) {
                return redirect()->back()->with('status', false);
            }
            $date = explode('-', $request->startend);
            $run = Keranjang::create([
                'user_id' => auth()->user()->id,
                'detail_wisata_id' => 0,
                'paket_wisata_id' => $request->paket_wisata_id,
                'start' => trim($date[0]),
                'end' => trim($date[1]),
                'pack' => $request->pack,
                'is_checkout' => 0
            ]);


            if ($run) {
                return redirect()->back()->with(['message' => 'Berhasil', 'status' => 'true']);
            } else {
                return redirect()->back()->with(['message' => 'Gagal', 'status' => 'false']);
            }
        } else {
            return redirect()->route('login');
        }
    }

    public function destroy($id)
    {
        $run = Keranjang::destroy($id);

        if ($run) {
            return redirect()->route('cart.index')->with('message', 'Success');
        } else {
            return redirect()->route('cart.index')->with('message', 'Error');
        }
    }

    public function checkout(Request $request)
    {
        if (!$request->keranjang) {
            return redirect()->route('cart.index')->with('message', 'Error');
        } else {
            $cart = Keranjang::whereIn('id', $request->keranjang);
            $detail_pemesanan = $cart->get()->map(function ($val) {
                return new DetailPemesanan([
                    'check_in' => $val->start,
                    'check_out' => $val->end,
                    'detail_wisata_id' => $val->detail_wisata_id,
                    'paket_wisata_id' => $val->paket_wisata_id,
                    'harga' => ($val->detail_wisata_id > 0) ? $val->detail_wisata->harga : $val->paket_wisata->harga,
                    'pack' => $val->pack
                ]);
            });
            $cart->update(['is_checkout' => '1']);

            Pemesanan::create([
                'user_id' => auth()->user()->id,
                'status' => 1
            ])->detail_pemesanan()->saveMany($detail_pemesanan);
        }

        return redirect()->route('index');
    }

    public function checkauth(Request $request)
    {
        $data['response'] = Auth::check() != null;
        return $data;
    }
}
