<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetailWisataController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\JenisWisataController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\Landing\DokumentasiController;
use App\Http\Controllers\Landing\InvoiceController;
use App\Http\Controllers\Landing\LandingController;
use App\Http\Controllers\Landing\PaketWisataController as LandingPaketWisataController;
use App\Http\Controllers\Landing\PemesananLandingController;
use App\Http\Controllers\Landing\PilihanWisataController;
use App\Http\Controllers\Landing\ProductController;
use App\Http\Controllers\Landing\SliderLandingController;
use App\Http\Controllers\PaketWisataController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PengurusController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\WisataController;
use App\Models\DetailPaketWisata;
use App\Models\DetailWisata;
use App\Models\Keranjang;
use App\Models\PaketWisata;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['auth', 'CheckRole:1']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('pengurus', PengurusController::class)->except('destroy');
    Route::get('/pengurus/{id}/destroy', [PengurusController::class, 'destroy'])->name('pengurus.destroy');

    Route::resource('jeniswisata', JenisWisataController::class)->except('destroy');
    Route::get('/jeniswisata/{id}/destroy', [JenisWisataController::class, 'destroy'])->name('jeniswisata.destroy');

    Route::resource('gallery', GalleryController::class)->except('destroy');
    Route::get('/gallery/{id}/destroy', [GalleryController::class, 'destroy'])->name('gallery.destroy');

    Route::resource('pemesanan', PemesananController::class)->except('destroy');

    Route::resource('pembayaran', PembayaranController::class)->except('destroy');

    Route::resource('sliders', SliderController::class)->except('destroy');
    Route::get('/sliders/{id}/destroy', [SliderController::class, 'destroy'])->name('sliders.destroy');

    Route::resource('wisata', WisataController::class)->except('destroy');
    Route::get('/wisata/{id}/destroy', [WisataController::class, 'destroy'])->name('wisata.destroy');

    Route::resource('paketwisata', PaketWisataController::class)->except('destroy');
    Route::get('/paketwisata/{id}/destroy', [PaketWisataController::class, 'destroy'])->name('paketwisata.destroy');
    Route::get('/paketwisata/adddetail/{wisata}/{detail_wisata}', [PaketWisataController::class, 'adddetail'])->name('paketwisata.adddetail');
    Route::get('/paketwisata/hapusdetail/{wisata}', [PaketWisataController::class, 'hapusdetail'])->name('paketwisata.hapusdetail');

    Route::resource('detailpaketwisata', DetailPaketWisata::class)->except('destroy');
    Route::get('/detailpaketwisata/{id}/destroy', [DetailPaketWisata::class, 'destroy'])->name('detailpaketwisata.destroy');

    Route::resource('detailwisata', DetailWisataController::class)->except(['destroy', 'create']);
    Route::get('/detailwisata/{id}/destroy', [DetailWisataController::class, 'destroy'])->name('detailwisata.destroy');
    Route::get('/detailwisata/{id}/create', [DetailWisataController::class, 'create'])->name('detailwisata.create');

    Route::resource('pengguna', PenggunaController::class)->except('destroy');
    Route::get('/pengguna/{id}/destroy', [PenggunaController::class, 'destroy'])->name('pengguna.destroy');
});

Route::get('/register/complete', [RegisterController::class, 'RegisterComplete'])->name('register.complete');

Route::resource('/', LandingController::class)->except('destroy');

Route::get('/dokumentasi', [DokumentasiController::class, 'index'])->name('dokumentasi.index');
Route::get('/dokumentasi/{id}/detail', [DokumentasiController::class, 'show'])->name('dokumentasi.show');
Route::get('/slider/{id}/detail', [SliderLandingController::class, 'show'])->name('sliderlanding.show');

Route::get('/paket_wisata', [LandingPaketWisataController::class, 'index'])->name('paket_wisata.index');
Route::get('/paket_wisata/{id}/detail', [LandingPaketWisataController::class, 'show'])->name('paket_wisata.detail');
Route::post('/paket_wisata/detail_paket', [LandingPaketWisataController::class, 'detail'])->name('paket_wisata.get');

Route::get('/category-wisata/{id}', [PilihanWisataController::class, 'index'])->name('category-wisata.index');
Route::get('/category-wisata/{id}/detail', [PilihanWisataController::class, 'show'])->name('category-wisata.show');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/cart/adding', [KeranjangController::class, 'addCart'])->name('cart.add');
Route::post('/cart/addingPaket', [KeranjangController::class, 'addCartPaket'])->name('cartpaket.add');

Route::get('/cart', [KeranjangController::class, 'index'])->name('cart.index');
Route::get('/cart/{id}/destroy', [KeranjangController::class, 'destroy'])->name('cart.destroy');

Route::post('/checkout/store', [KeranjangController::class, 'checkout'])->name('checkout.store');

Route::post('/checkauth', [KeranjangController::class, 'checkauth'])->name('checkauth');

Route::get('/pemesanan-bb', [PemesananLandingController::class, 'index_bb'])->name('pemesanan-bb.index');
Route::get('/pemesanan-selesai', [PemesananLandingController::class, 'index_selesai'])->name('pemesanan-selesai.index');

Route::post('/pemesanan/ajax_detail', [PemesananLandingController::class, 'ajax_detail'])->name('pemesanan.ajax_detail');

Route::post('/pembayaran/manual', [PemesananLandingController::class, 'pembayaran'])->name('pembayaran.user');

Route::get('/invoice/{id}/detail', [InvoiceController::class, 'show'])->name('invoice.show');

Route::get('/product/{id}/detail', [ProductController::class, 'index'])->name('product.detail');
