@extends('landing.master.master')
@section('master')

<!-- Breadcrumb Start -->
<section class="section_paddding p-5">
    <div class="container-fluid bg-light overflow-hidden my-4 px-lg-0">        
        <div class="container py-5">
            <div class="breadcrumb-caption d-none d-md-block">
                <h1 class="section_tittle mb-3 animated slideInDown">Aktivitas</h1>
                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb bg-white">
                        <li class="breadcrumb-item"><a class="text-black" href="{{ route('index') }}">Home</a></li>                                            
                        <li class="breadcrumb-item text-black active" aria-current="page">Aktivitas</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb End -->

<!-- Gallery part start-->
<section class="product_list best_seller section-padding mb-5">
    <div class="container">
        
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



@endsection