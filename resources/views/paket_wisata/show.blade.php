@extends('templates.master')
@section('master')
<div class="content">
    <div class="row">
        <div class="col-md-6">

            <!-- Simple list -->
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h5 class="card-title">{{ $title }}</h5>

                </div>

                <div class="card-body">
                    <ul class="media-list">
                        <li class="media font-weight-semibold py-1">Detail Paket Wisata</li>

                        @foreach ($wisata as $item)
                        <li class="media">
                            <div class="mr-3">
                                <a href="#">
                                    <img src="{{ asset('storage/image/'.$item->wisata->image) }}" class="rounded-circle"
                                        width="40" height="40" alt="">
                                </a>
                            </div>

                            <div class="media-body">
                                <div class="media-title font-weight-semibold">{{ $item->wisata->nama }}</div>
                                <span class="text-muted">{{ $item->wisata->harga }}</span>
                            </div>

                            <div class="align-self-center ml-3">
                                <div class="list-icons list-icons-extended">
                                    <div class="list-icons list-icons-extended">
                                        <a href="{{ route('paketwisata.hapusdetail',$item->id) }}"
                                            class="list-icons-item" data-popup="tooltip" title="Hapus"><i
                                                class="icon-folder-minus2"></i></a>
                                    </div>
                                </div>
                        </li>

                        @endforeach


                    </ul>
                </div>
            </div>
            <!-- /simple list -->
        </div>
        <div class="col-md-6">

            <!-- Simple list -->
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h5 class="card-title">List Paket Wisata</h5>

                </div>

                <div class="card-body">
                    <ul class="media-list">
                        <li class="media font-weight-semibold py-1">Paket Wisata</li>
                        @foreach ($wisata_all as $item)
                        <li class="media">
                            <div class="mr-3">
                                <a href="#">
                                    <img src="{{ asset('storage/image/'.$item->image) }}" class="rounded-circle"
                                        width="40" height="40" alt="">
                                </a>
                            </div>

                            <div class="media-body">
                                <div class="media-title font-weight-semibold">{{ $item->nama }}</div>
                            </div>

                            <div class="align-self-center ml-3">
                                <div class="list-icons list-icons-extended">
                                    <a href="{{ route('paketwisata.adddetail',[$data->id,$item->id]) }}"
                                        class="list-icons-item" data-popup="tooltip" title="Add"><i
                                            class="icon-folder-plus2"></i></a>


                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <!-- /simple list -->
        </div>
    </div>
</div>

@endsection