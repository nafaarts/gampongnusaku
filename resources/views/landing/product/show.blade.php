@extends('landing.master.master')
@section('master')

<section class="section_paddding p-5">
    <div class="container-fluid bg-light overflow-hidden my-4 px-lg-0">        
        <div class="container py-5">
            <div class="breadcrumb-caption d-none d-md-block">            
                <h1 class="section_tittle mb-3 animated slideInDown">Detail</h1>
                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb bg-white">
                        <li class="breadcrumb-item"><a class="text-black" href="{{ route('index') }}">Home</a></li> 
                    </ol>
                </nav>
             
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb End container-fluid page-header py-5 mb-0 -->


<!--================Single Product Area =================-->
<div class="product_image_area section_padding p-5">
    <div class="container">
        <div class="row s_product_inner justify-content-between">
            <div class="col-lg-7 col-xl-7">
                <div class="product_slider_img">
                    <div id="vertical">
                        <div data-thumb="{{  url('storage/image/'.$data->image) }} ">
                            <img src="{{ url('storage/image/'.$data->image) }}" />
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-xl-4">
                <div class="s_product_text">
                    <h3>{{ $data->nama }}</h3>
                    <h2>{{ "Rp " . number_format($data->harga,2,',','.') }}</h2>
                    <ul class="list">
                        <li>
                            <a class="active" href="#">
                                {{ $data->wisata->nama }}</a>
                        </li>
                        <li>
                        </li>
                    </ul>
                    <p>
                        {{$data->deskripsi}}
                    </p>
                    <div class="card_area d-flex justify-content-between align-items-center">
                        <a href="#" data-nama="{{ $data->nama }}" data-image="{{ url('storage/image/'.$data->image) }}"
                            data-id='{{ $data->id }}' data-is_product="1" class="add_cart btn_3">add to cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="product_list section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="section_tittle text-center">
                    <h2>Inspirasi Wisata Anda</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="product_list_slider owl-carousel">

                    <div class="single_product_list_slider">
                        <div class="row align-items-center justify-content-between">
                            @foreach ($detail_wisata as $item)
                            <div class="col-lg-3 col-sm-6">
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
                                            <div class="col-sm-6"> <a href="#" data-nama="{{ $item->nama }}"
                                                    data-image="{{ url('storage/image/'.$item->image) }}"
                                                    data-id='{{ $item->id }}' class=""><i
                                                        class="fa fa-eye mr-2"></i></a></div>
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
@endsection