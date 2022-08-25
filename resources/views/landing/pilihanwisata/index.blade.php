@extends('landing.master.master')
@section('master')

<!-- Breadcrumb Start -->
<section class="section_paddding p-5">
    <div class="container-fluid bg-light overflow-hidden my-4 px-lg-0">        
        <div class="container py-5">
            <div class="breadcrumb-caption d-none d-md-block">
            @foreach ($wisata as $item)
                <h1 class="section_tittle mb-3 animated slideInDown">Pilihan Wisata</h1>
                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb bg-white">
                        <li class="breadcrumb-item"><a class="text-black" href="{{ route('index') }}">Home</a></li> 
                        <li class="breadcrumb-item text-black active" aria-current="page">{{ $item->nama }}</li>
                    </ol>
                </nav>
            @endforeach
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb End -->


@foreach ($wisata as $item)
<section class="product_list best_seller mt-4 section-padding mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="section_tittle text-center">
                    <h2>{{ $item->nama }}</h2>
                </div>
            </div>
        </div>
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-12">
                <div class="best_product_slider owl-carousel">
                    @foreach ($item->detail_wisata as $value)
                    <div class="single_product_item">
                        <img src="{{ url('storage/image/'.$value->image) }}" alt="">
                        <div class="single_product_text">
                            <h4>{{ $value->nama }}</h4>
                            <h3>{{ "Rp " . number_format($value->harga,2,',','.') }}</h3>
                            <div class="row">
                                <div class="col-sm-6"> <a href="#" data-nama="{{ $item->nama }}"
                                        data-image="{{ url('storage/image/'.$value->image) }}"
                                        data-id='{{ $value->id }}' class="add_cart"><i class="fa fa-cart-plus"></i></a>
                                </div>
                                <div class="col-sm-6"> <a href="{{ route('product.detail',$value->id) }}"
                                        class="text text-info"><i class="fa fa-eye mr-2"></i></a></div>
                            </div>

                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

@endforeach



@endsection