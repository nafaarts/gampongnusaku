@extends('templates.master')
@section('master')
<div class="content">
    <div class="d-flex align-items-start flex-column flex-md-row">

        <!-- Left content -->
        <div class="w-100 order-2 order-md-1">

            <!-- Invoice grid -->
            <div class="row">
                @foreach ($data as $item)
                @php

                $mapping = $item->detail_pemesanan->map(function($value){
                if($value->detail_wisata_id > 0){
                if($value->detail_wisata->jenis_kalkulasi == '1'){
                return $value->pack * $value->harga;
                }else{
                return ($value->CountDay*$value->pack) * $value->harga;
                }
                }else{
                return $value->pack * $value->harga;
                }
                });

                @endphp
                <div class="col-lg-6">
                    <div class="card border-left-3 border-left-danger rounded-left-0">
                        <div class="card-body">
                            <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
                                <div>
                                    <h6 class="font-weight-semibold">{{ $item->user->name }}</h6>
                                    <ul class="list list-unstyled mb-0">
                                        <li>Invoice #: <a href="#">{{ $item->id }}</a></li>
                                        <li>Issued on: <span class="font-weight-semibold">
                                                {{ Carbon::parse($item->created_at)->format('d/m/Y') }}</span></li>
                                    </ul>
                                </div>
                                <div class="text-sm-right mb-0 mt-3 mt-sm-0 ml-auto">
                                    <h6 class="font-weight-semibold">{{"Rp " .
                                        number_format($mapping->sum(),2,',','.') }}</h6>
                                    <ul class="list list-unstyled mb-0">
                                        <li>Struk: <span class="font-weight-semibold">@if ($item->pembayaran)
                                                <a href="" class="badge badge-primary pop">
                                                    <img id="imageresource"
                                                        src="{{ url('storage/image/'.$item->pembayaran->bukti_pembayaran) }}"
                                                        style="max-width:100%;
                                            max-height:100%;" hidden="">
                                                    Bukti Pembayaran</a>
                                                @endif</span></li>
                                        <li class="dropdown">
                                            Status: &nbsp;
                                            <span class="badge badge-{{ $badge[$item->status -1] }}">{{
                                                $status[$item->status -1] }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-sm-flex justify-content-sm-between align-items-sm-center">
                            <span>
                                <span class="badge badge-mark border-danger mr-2"></span>
                                Status:
                                <span class="font-weight-semibold">{{ $status[$item->status -1] }}</span>
                            </span>
                            <ul class="list-inline list-inline-condensed mb-0 mt-2 mt-sm-0">
                                <li class="list-inline-item">
                                    <a href="{{ route('pemesanan.show',$item->id) }}" class="text-default"><i
                                            class="icon-eye8"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach


            </div>
        </div>

        <div
            class="sidebar sidebar-light bg-transparent sidebar-component sidebar-component-right border-0 shadow-0 order-1 order-md-2 sidebar-expand-md">
            <div class="sidebar-content">
                <div class="card">
                    <div class="card-header bg-transparent header-elements-inline">
                        <span class="text-uppercase font-size-sm font-weight-semibold">Actions</span>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="col">
                            <a href="{{ route('pembayaran.index') }}" class="btn bg-teal-400 btn-block btn-float">
                                <i class="icon-coins icon-2x"></i>
                                <span>Pembayaran</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>

            </div>
            <div class="modal-body">
                <img src="" id="imagepreview" style="max-width:100%;
                max-height:100%;">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $(".pop").on("click", function(e) {
            e.preventDefault();

        $('#imagepreview').attr('src', $(this).find('#imageresource').attr('src')); // here asign the image to the modal when the user click the enlarge link
         $('#imagemodal').modal('show'); // imagemodal is the id attribute assigned to the bootstrap modal, then i use the show function
        }); 

        $
    });
</script>
@endsection