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
                        <li class="breadcrumb-item text-black active" aria-current="page">Selesai</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb End -->

<!--================Cart Area =================-->
<section class="cart_area section_padding p-5">
    <div class="container">
        <div class="cart_inner">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Jumlah Item/Paket</th>
                            <th scope="col">Waktu Checkout</th>
                            <th scope="col">Status</th>
                            <th scope="col">Total</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
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
                        <tr>
                            <td class="">
                                <p>{{ $item->detail_pemesanan->count() }}</p>
                            </td>
                            <td>
                                <h5>{{ Carbon::parse($item->created_at)->format('d/m/Y') }}</h5>
                            </td>
                            <td>
                                @if ($item->status == '2')
                                <span class="badge badge-success">Selesai</span>
                                @endif
                                @if ($item->status == '3')
                                <span class="badge badge-primary">Hold</span>
                                @endif
                                @if ($item->status == '4')
                                <span class="badge badge-danger">Ditolak</span>
                                @endif
                            </td>
                            <td>
                                <h5>{{"Rp " . number_format($mapping->sum(),0,',','.') }}</h5>
                            </td>
                            <td>

                            </td>
                        </tr>
                        @endforeach
                        <tr class="bottom_button">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
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