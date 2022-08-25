@extends('templates.master')
@section('master')
<!-- Page header -->
<div class="page-header page-header-light">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Pembayaran</span></h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>


    </div>

    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="#" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Pembayaran</a>

            </div>

            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>

        <div class="header-elements d-none">

        </div>
    </div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header bg-primary text-white header-elements-inline">
                    <h5 class="card-title">Tabel {{$title}}</h5>
                    <div class="header-elements">

                    </div>
                </div>
                <div class="card-body">
                    <table class="table datatable-basic">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User</th>
                                <th>Jumlah Item</th>
                                <th>Waktu Pemesanan</th>
                                <th>Total</th>
                                <th>Bukti Pembayaran</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            @if ($item->pembayaran)
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
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->detail_pemesanan->count() }}</td>
                                <td>{{ Carbon::parse($item->created_at)->format('d/m/Y') }}</td>
                                <td>{{"Rp " .
                                    number_format($mapping->sum(),2,',','.') }}</td>
                                <td><a href="#" class="badge badge-primary pop">
                                        <img id="imageresource"
                                            src="{{ url('storage/image/'.$item->pembayaran->bukti_pembayaran) }}" style="max-width:100%;
                                            max-height:100%;" hidden="">Bukti Pembayaran</a></td>
                                <td>
                                    @if ($item->status == '1')
                                    <a href="{{ route('pembayaran.show',$item->id) }}" class="btn btn-success"><i
                                            class="icon-checkmark4"></i></a>
                                    <a href="{{ route('pembayaran.edit',$item->id) }}" class="btn btn-danger"><i
                                            class="icon-cross2"></i></a>

                                    @endif
                                </td>
                            </tr>
                            @endif

                            @endforeach
                        </tbody>
                    </table>
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
    });
    $(document).ready(function(){
        $('.generate').click(function(){
            var randomstring = Math.random().toString(36).slice(-8);
            $('#password').val(randomstring);
        });
    });
</script>
<!-- /content area -->
@endsection