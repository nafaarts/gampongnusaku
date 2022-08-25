@extends('landing.master.master')
@section('master')

<!-- Breadcrumb Start -->
<section class="section_paddding p-5">
    <div class="container-fluid bg-light overflow-hidden my-4 px-lg-0">        
        <div class="container py-5">
            <div class="breadcrumb-caption d-none d-md-block">
                <h1 class="section_tittle mb-3 animated slideInDown">Keranjang</h1>
                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb bg-white">
                        <li class="breadcrumb-item"><a class="text-black" href="{{ route('index') }}">Home</a></li>                                            
                        <li class="breadcrumb-item text-black active" aria-current="page">Keranjang</li>
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
                            <th scope="col"></th>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Pack</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <form action="{{ route('checkout.store') }}" method="POST"
                        enctype="application/x-www-form-urlencoded">
                        @csrf
                        <tbody>
                            @php
                            $sum = [];
                            @endphp
                            @foreach ($data as $item)
                            @if ($item->paket_wisata_id == '0')
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" value="{{ $item->id }}"
                                            name="keranjang[]">
                                    </div>
                                </td>
                                <td>
                                    <div class="media">
                                        <div class="d-flex">
                                            <img height="150px" width="150px"
                                                src="{{ asset('storage/image/'.$item->detail_wisata->image) }}"
                                                alt="" />
                                        </div>
                                        <div class="media-body">
                                            <p>{{ $item->detail_wisata->nama }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h5>{{"Rp " . number_format($item->detail_wisata->harga,2,',','.') }}</h5>
                                </td>
                                <td>
                                    {{ $item->pack }} pack
                                </td>
                                <td class="text-center">
                                    <div class="product_count">
                                        <h5>{{$item->count_day}} Day
                                        </h5>
                                    </div>
                                </td>
                                <td>
                                    @if ($item->detail_wisata->jenis_kalkulasi == '1')
                                    <h5>{{"Rp " . number_format($item->detail_wisata->harga*$item->pack,2,',','.')}}
                                        @php
                                        array_push($sum,$item->detail_wisata->harga*$item->pack);
                                        @endphp
                                    </h5>
                                    @else
                                    <h5>{{"Rp "
                                        .number_format($item->detail_wisata->harga*($item->count_day*$item->pack),2,',','.')}}
                                        @php
                                        array_push($sum,$item->detail_wisata->harga*($item->count_day*$item->pack));
                                        @endphp
                                    </h5>
                                    @endif

                                </td>
                                <td><a class="text-danger" href="{{ route('cart.destroy',$item->id) }}">Delete</a></td>
                            </tr>
                            @else

                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" value="{{ $item->id }}"
                                            name="keranjang[]">
                                    </div>
                                </td>
                                <td>
                                    <div class="media">
                                        <div class="d-flex">
                                            <img height="150px" width="150px"
                                                src="{{ asset('storage/image/'.$item->paket_wisata->detail[0]->wisata->image) }}"
                                                alt="" />
                                        </div>
                                        <div class="media-body">
                                            <p>{{ $item->paket_wisata->nama}}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h5>{{"Rp " . number_format($item->paket_wisata->harga,2,',','.') }}</h5>
                                </td>
                                <td>
                                    {{ $item->pack }} pack
                                </td>
                                <td class="text-center">
                                    <div class="product_count">
                                        <h5>{{$item->count_day}} Day
                                        </h5>
                                    </div>
                                </td>
                                <td>

                                    <h5>{{"Rp " .
                                        number_format($item->paket_wisata->harga*$item->pack,2,',','.')}}
                                        @php
                                        array_push($sum,$item->paket_wisata->harga*$item->pack);
                                        @endphp
                                    </h5>
                                </td>
                                <td><a class="text-danger" href="{{ route('cart.destroy',$item->id) }}">Delete</a></td>
                            </tr>
                            @endif
                            @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <h5>Subtotal</h5>
                                </td>
                                <td>
                                    <h5>{{"Rp " . number_format(array_sum($sum),2,',','.') }}
                                    </h5>
                                </td>
                                <td></td>
                            </tr>

                        </tbody>
                </table>
                <div class="checkout_btn_inner float-right">
                    <button type="submit" class="btn_1 checkout_btn_1" href="#">Proceed to checkout</button>
                </div>
                </form>
            </div>
        </div>
</section>
<!--================End Cart Area =================-->

@endsection