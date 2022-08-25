@extends('landing.master.master')
@section('master')

<!-- carousel part start -->
<section class="section_padding p-0 mb-0">
    <div class="container-fluid">
        <div class="banner_slider owl-carousel">
            @foreach ($slider as $item)
            <div class="row">
                <img src="{{ url('storage/image/'.$item->image) }}" alt="">
                <div class="container">
                    <div class="carousel-caption d-none d-md-block">
                        <div class="justify-content-center">
                            <h2 class="text-white text-uppercase mb-3 animated slideInDown">{{ $item->title }}</h2>
                        </div>
                        <div class="cupon_text float-center">
                            <a class="btn_1" href="{{ route('sliderlanding.show',$item->id) }}">Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- carousel part start -->

<!-- Feature Start -->
<section class="section_padding p-5">
<div class="container px-1 py-5">
    <div class="section_tittle text-center">
        <h2>Mengapa Memilih Nusa</h2>
    </div>
    <div class="row g-4 px-0 row-cols-4 row-cols-lg-3">
        <div class="col d-flex align-items-start">
            <div
                class="icon-round text-bg-light d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3 pr-3">
                <svg class="bi" width="1em" height="1em"></svg>
                <img src="{{ asset('global_assets_landing/img/point.png') }}" alt="logo">
            </div>
            <div>
                <div class="single_product_text_bold">
                    <h4>Destinasi Menarik</h4>
                </div>
                <p>Desa Wisata Nusa menawarkan berbagai atraksi wisata dengan kearifan lokal khas gampong Nusa yang
                    sangat menarik untuk Anda kunjungi.</p>
            </div>
        </div>
        <div class="col d-flex align-items-start">
            <div
                class="icon-square text-bg-light d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3 pr-3">
                <svg class="bi" width="1em" height="1em"></svg>
                <img src="{{ asset('global_assets_landing/img/price.png') }}" alt="logo">
            </div>
            <div>
                <div class="single_product_text_bold">
                    <h4>Harga Terjangkau</h4>
                </div>
                <p>Desa Wisata Nusa memberikan pelayanan terbaik dengan harga terjangkau. Wisatawan dapat menikmati
                    berbagai atraksi wisata dengan aman dan nyaman.</p>
            </div>
        </div>
        <div class="col d-flex align-items-start">
            <div
                class="icon-square text-bg-light d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3 pr-3">
                <svg class="bi" width="1em" height="1em"></svg>
                <img src="{{ asset('global_assets_landing/img/team.png') }}" alt="logo">
            </div>
            <div>
                <div class="single_product_text_bold">
                    <h4>Tim Profesional</h4>
                </div>
                <p>Desa Wisata Nusa memiliki tim profesional yang kompak dan solid dalam memandu wisata Anda. Tim kami
                    tergabung dalam Lembaga Pariwisata Nusa (LPN).</p>
            </div>
        </div>
    </div>
</div>
</section>
<!-- Feature Start -->

<!-- Pilihan Wisata part start-->
<section class="product_list section_padding p-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="section_tittle text-center">
                <h2>Rekomendasi Paket Wisata </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="product_list_slider owl-carousel">
                    <div class="single_product_list_slider">
                        <div class="row align-items-center justify-content-between">
                            @foreach ($paket_wisata as $item)
                            <div class="col-lg-4 col-sm-6">
                                <div class="single_product_item">
                                    <img src="{{  url('storage/image/'.$item->detail[0]->wisata->image) }}" alt="">
                                    <div class="single_product_text">
                                        <h4>{{ $item->nama }}</h4>
                                        <h3>{{ "Rp " . number_format($item->harga,2,',','.') }}
                                        </h3>
                                        <div class="row">
                                            <div class="col-sm-6"> <a href="#" data-nama="{{ $item->nama }}"
                                                    data-image="{{ url('storage/image/'.$item->detail[0]->wisata->image) }}"
                                                    data-id='{{ $item->id }}' data-is_product="1" class="add_paket"><i
                                                        class="fa fa-cart-plus"></i></a></div>
                                            <div class="col-sm-6">
                                                <a href="{{ route('paket_wisata.detail',$item->id) }}"
                                                    class="text text-info"><i class="fa fa-eye mr-2"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- product_list part end-->

<!-- Pilihan Wisata part start-->
<section class="product_list best_seller section_padding p-5 px-1">
    <div class="container">
        <div class="row justify-content-center">
            <div class="section_tittle text-center">
                <h2>Pilihan Wisata Anda</h2>
            </div>
        </div>
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-12">
                <div class="best_product_slider owl-carousel">
                    @foreach ($detail_wisata as $item)
                    <div class="col-lg-12 col-sm-6">
                        <div class="single_product_item">
                            <img src="{{ url('storage/image/'.$item->image) }}" alt="">
                            <div class="single_product_text">
                                <h4>{{ $item->nama }}</h4>
                                <h3>{{ "Rp " . number_format($item->harga,2,',','.') }}</h3>
                                <div class="row">
                                    <div class="col-sm-6"> <a href="#" data-nama="{{ $item->nama }}"
                                            data-image="{{ url('storage/image/'.$item->image) }}"
                                            data-id='{{ $item->id }}' class="add_cart"><i
                                                class="fa fa-cart-plus"></i></a></div>
                                    <div class="col-sm-6"> <a href="{{ route('product.detail',$item->id) }}"
                                            class="text text-info"><i class="fa fa-eye mr-2"></i></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- product_list part end-->


<!-- Gallery part start-->
<section class="product_list best_seller section_padding p-5 px-1">
    <div class="container">
        <div class="row justify-content-center">
            <div class="section_tittle text-center">
                <h2>Galeri Aktivitas</h2>
            </div>
        </div>
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-12">
                <div class="best_product_slider owl-carousel">
                    @foreach ($gallery as $item)
                    <div class="single_product_item">
                        <a href="{{ route('dokumentasi.show',$item->id) }}"><img
                                src="{{ url('storage/image/'.$item->image) }}" alt=""></a>
                        <div class="single_product_text">
                            <h4>{{ $item->nama_kegiatan }}</h4>

                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- product_list part end-->

<!-- Modal -->



@endsection