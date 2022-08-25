@extends('landing.master.master')
@section('master')

<!-- Breadcrumb Start -->
<section class="section_paddding p-5">
    <div class="container-fluid bg-light overflow-hidden my-4 px-lg-0">        
        <div class="container py-5">
            <div class="breadcrumb-caption d-none d-md-block">
                <h1 class="section_tittle mb-3 animated slideInDown">Paket Wisata</h1>                
                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb bg-white">
                        <li class="breadcrumb-item"><a class="text-black" href="{{ route('index') }}">Home</a></li>
                        <li class="breadcrumb-item text-black active" aria-current="page">Paket Wisata</li>                                            
                        
                    </ol>                
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb End -->

<section class="product_list section-padding mb-5">
    <div class="container">
        <div class="row justify-content-center">
            
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




@endsection