@extends('templates.master')
@section('master')

<div class="content">
    <!-- Invoice template -->
    <div class="card" id="target_print">
        <div class="card-header bg-transparent header-elements-inline">
            <h6 class="card-title">Invoice</h6>
            <div class="header-elements">
                <a href="#" class="btn btn-light btn-sm" id="print"><i class="icon-printer mr-2"></i>
                    Print</a>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-4">
                        <img src="{{ asset('global_assets/images/logo_demo.png') }}" class="mb-3 mt-2" alt=""
                            style="width: 120px;">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="mb-4">
                        <div class="text-sm-right">
                            <h4 class="text-primary mb-2 mt-md-2">Invoice #{{ $pemesanan->id }}</h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-md-flex flex-md-wrap">
                <div class="mb-4 mb-md-2">
                    <span class="text-muted">Invoice To:</span>
                    <ul class="list list-unstyled mb-0">
                        <li>
                            <h5 class="my-2">{{ $pemesanan->user->name }}</h5>
                        </li>
                        <li>{{ $pemesanan->user->wisatawan->jenis_kelamin =='L' ?'Laki-laki':'Perempuan' }}</li>
                        <li>{{ $pemesanan->user->wisatawan->alamat }}</li>
                        <li>{{ $pemesanan->user->wisatawan->organisasi }}</li>
                        <li>{{ $pemesanan->user->wisatawan->no_telp }}</li>
                        <li><a href="#">{{ $pemesanan->user->wisatawan->email }}</a></li>
                    </ul>
                </div>

            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-lg">
                <thead>
                    <tr>                        
                        <th>Deskripsi</th>
                        <th>Harga</th>
                        <th>Pax</th>
                        <th>Hari</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $sum =[]
                    @endphp
                    @foreach ($pemesanan->detail_pemesanan as $item)
                    @php
                    $harga;
                    if($item->detail_wisata_id > 0){
                    if($item->detail_wisata->jenis_kalkulasi == '1'){
                    $harga= $item->pack * $item->harga;
                    }else{
                    $harga= ($item->CountDay*$item->pack) * $item->harga;
                    }
                    }else{
                    $harga= $item->pack * $item->harga;
                    }
                    array_push($sum,$harga);
                    @endphp
                    <tr>
                        <td>
                            <h6 class="mb-0">@if ($item->detail_wisata_id > 0)
                                {{ $item->detail_wisata->nama }}
                                @else
                                {{ $item->paket_wisata->nama}}
                                @endif</h6>
                            <span class="text-muted">Check-In {{ $item->check_in }} - Check-Out {{
                                $item->check_out }}</span>
                        </td>
                        <td>
                            <span class="font-weight-semibold">{{"Rp " .
                                number_format($item->harga,2,',','.') }}</span>
                        </td>
                        <td>{{ $item->pack }}</td>
                        <td>{{ $item->count_day }}</td>
                        <td><span class="font-weight-semibold">

                                {{"Rp " .
                                number_format($harga,2,',','.') }}</span></td>
                    </tr>
                    @endforeach


                </tbody>
            </table>
        </div>

        <div class="card-body">
            <div class="d-md-flex flex-md-wrap">
                <div class="pt-2 mb-3">

                </div>

                <div class="pt-2 mb-3 wmin-md-400 ml-auto">
                    
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>Subtotal</th>
                                    <td class="text-right">{{"Rp " .
                                        number_format(array_sum($sum),2,',','.') }}</td>
                                </tr>
                                <tr>
                                    <th>Total</th>
                                    <td class="text-right text-primary">
                                        <h5 class="font-weight-semibold">{{"Rp " .
                                            number_format(array_sum($sum),2,',','.') }}</h5>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- /invoice template -->
</div>

<script>
    $(document).ready(function(){
        $('#print').click(function(e){
            e.preventDefault();
            var divElements = document.getElementById('target_print').innerHTML;
        //Get the HTML of whole page
        var oldPage = document.body.innerHTML;
        //Reset the page's HTML with div's HTML only
        document.body.innerHTML = 
          "<html><head><title></title></head><body>" + 
          divElements + "</body>";
        //Print Page
        window.print();
        //Restore orignal HTML
        document.body.innerHTML = oldPage;
        });
     
    });
</script>

@endsection