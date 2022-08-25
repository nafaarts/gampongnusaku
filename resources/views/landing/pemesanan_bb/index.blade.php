@extends('landing.master.master')
@section('master')

<!-- Breadcrumb Start -->
<section class="section_paddding p-5">
    <div class="container-fluid bg-light overflow-hidden my-4 px-lg-0">        
        <div class="container py-5">
            <div class="breadcrumb-caption d-none d-md-block">                
                <h1 class="section_tittle mb-3 animated slideInDown">Pemesanan</h1>
                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb bg-white">
                        <li class="breadcrumb-item"><a class="text-black" href="{{ route('index') }}">Home</a></li>                                            
                        <li class="breadcrumb-item text-black active" aria-current="page">Belum Bayar</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb End -->

<!--================Cart Area =================-->
<section class="cart_area section_paddding p-5">
    <div class="container">
        <div class="cart_inner">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Jumlah Item</th>
                            <th scope="col">Waktu Checkout</th>
                            <th scope="col">Status</th>
                            <th scope="col">Total</th>
                            <th scope="col">Bayar</th>
                            <!-- <th scope="col">Action</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td class="">
                                <p>{{ $item->detail_pemesanan->count() }}</p>
                            </td>
                            <td>
                                <h5>{{ Carbon::parse($item->created_at)->format('d/m/Y') }}</h5>
                            </td>
                            <td>
                                @if ($item->pembayaran)
                                <span class="badge badge-primary">Menunggu Konfirmasi</span>
                                @else
                                <span class="badge badge-warning">Belum Bayar</span>
                                @endif

                            </td>
                            <td>
                                <h5>

                                    @php
                                    $mapping = $item->detail_pemesanan->map(function($value){
                                    if($value->paket_wisata_id > 0){
                                    return $value->pack * $value->harga;
                                    }
                                    if($value->detail_wisata->jenis_kalkulasi == '1'){
                                    return $value->pack * $value->harga;
                                    }else{
                                    return ($value->CountDay*$value->pack) * $value->harga;
                                    }
                                    });

                                    @endphp
                                    {{"Rp " . number_format($mapping->sum(),2,',','.')}}
                                </h5>
                            </td>
                            <td>
                                @if (!$item->pembayaran)
                                <a href="#" data-id="{{ $item->id }}" class="badge badge-primary payment">Bayar</a>
                                @endif

                            </td>
                        </tr>

                        @endforeach

                        <tr class="bottom_button">
                            <td>

                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>

                            </td>
                            <td>
                                <div class="cupon_text float-right">
                                    <a class="btn_1" href="{{ route('index') }}">Kembali ke Home</a>
                                </div>
                            </td>
                        </tr>

                    </tbody>
                </table>

            </div>
        </div>
</section>
<!--================End Cart Area =================-->



@endsection