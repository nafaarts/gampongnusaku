@extends('landing.master.master')
@section('master')

<!-- Breadcrumb Start -->
<section class="section_paddding p-5">
    <div class="container-fluid bg-light overflow-hidden my-4 px-lg-0">        
        <div class="container py-5">
            <div class="breadcrumb-caption d-none d-md-block">                        
                <h2 class="section_tittle mb-3 animated slideInDown">Detail</h2>
                <nav aria-label="breadcrumb animated slideInDown">                
                    <ol class="breadcrumb bg-white">                    
                        <li class="breadcrumb-item"><a class="text-black" href="{{ route('index') }}">Home</a></li>
                        <li class="breadcrumb-item"><a class="text-black" href="{{ route('paket_wisata.index') }}">Paket Wisata</a></li>                        
                        <li class="breadcrumb-item text-black active" aria-current="page">{{ $paket_wisata->nama }}</a></li>                    
                    </ol>                  
                </nav>                       
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb End -->

<!--================End Home Banner Area =================-->


<section class="product_list section_padding p-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="section_tittle text-center">
                    <h2>{{ $paket_wisata->nama }}</h2>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="product_list_slider owl-carousel">
                    <div class="single_product_list_slider">
                        <div class="row align-items-center justify-content-between">
                            @foreach ($paket_wisata->detail as $item)
                            <div class="col-lg-3 col-sm-6">
                                <div class="single_product_item">
                                    <img src="{{  url('storage/image/'.$item->wisata->image) }}" alt="">
                                    <div class="single_product_text">
                                        <h4>{{ $item->wisata->nama }}</h4>
                                        <!-- <h3>{{ "Rp " . number_format($item->wisata->harga,2,',','.') }}
                                        </h3>
                                        <div class="row">
                                            <div class="col-sm-6"> <a href="#" data-nama="{{ $item->wisata->nama }}"
                                                    data-image="{{ url('storage/image/'.$item->wisata->image) }}"
                                                    data-id="{{ $item->wisata->id }}" data-is_product="0"
                                                    class="add_cart"><i class="fa fa-cart-plus"></i></a></div>
                                            <div class="col-sm-6">
                                                <a href="{{ route('product.detail',$item->wisata->id) }}"
                                                    class="text text-info"><i class="fa fa-eye mr-2"></i></a>
                                            </div>
                                        </div> -->
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

<section class="product_description_area">
    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                    aria-selected="true">Description</a>
            </li>

        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab">
                <p>
                    {{$paket_wisata->deskripsi}}
                </p>

            </div>

        </div>
    </div>
</section>

<section class="product_description_area">
    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                    aria-selected="true">Itinerary</a>
            </li>

        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab">
                <p>
                    {{$paket_wisata->itinenary}}
                </p>

            </div>

        </div>
       
    </div>
</section>
<!--================End Product Description Area =================-->


@endsection