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
                        <li class="breadcrumb-item text-black active" aria-current="page">{{ $data->title }}</a></li>                    
                    </ol>                  
                </nav>                       
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb End -->


<!--================Blog Area =================-->
<section class="blog_area single-post-area mb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 posts-list">
                <div class="single-post">
                    <div class="feature-img">

                    </div>
                    <div class="blog_details">
                        <h2>{{$data->title}}
                        </h2>
                        <ul class="blog-info-link mt-3 mb-4">
                            <li><a href="#"><i class="far fa-user"></i> Gampong Nusa, Aceh Besar</a></li>
                        </ul>
                        <p class="excert">
                            {!! $data->deskripsi !!}
                        </p>
                    </div>
                </div>




            </div>

        </div>
    </div>
</section>
<!--================Blog Area end =================-->


@endsection