<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Gampong Nusa - {{ $title }}</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
        type="text/css">
    <link href="{{asset('global_assets/css/icons/icomoon/styles.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('global_assets/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('global_assets/assets/css/bootstrap_limitless.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('global_assets/assets/css/layout.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('global_assets/assets/css/components.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('global_assets/assets/css/colors.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script src="{{asset('global_assets/js/main/jquery.min.js')}}"></script>
    <script src="{{asset('global_assets/js/main/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('global_assets/js/plugins/loaders/blockui.min.js')}}"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="{{ asset('global_assets/js/plugins/notifications/sweet_alert.min.js') }}"></script>
    <script src="{{asset('global_assets/js/plugins/visualization/d3/d3.min.js')}}"></script>
    <script src="{{asset('global_assets/js/plugins/visualization/d3/d3_tooltip.js')}}"></script>
    <script src="{{asset('global_assets/js/plugins/forms/styling/switchery.min.js')}}"></script>
    <script src="{{asset('global_assets/js/plugins/forms/selects/bootstrap_multiselect.js')}}"></script>
    <script src="{{asset('global_assets/js/plugins/ui/moment/moment.min.js')}}"></script>
    <script src="{{asset('global_assets/js/plugins/pickers/daterangepicker.js')}}"></script>
    <script src="{{asset('global_assets/js/plugins/tables/datatables/datatables.min.js')}}"></script>
    <script src="{{asset('global_assets/js/plugins/forms/selects/select2.min.js')}}"></script>
    <script src="{{ asset('global_assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>


    <script src="{{asset('global_assets/assets/js/app.js')}}"></script>
    <script src="{{asset('global_assets/js/demo_pages/dashboard.js')}}"></script>
    <script src="{{asset('global_assets/js/demo_pages/datatables_basic.js')}}"></script>
    <script src="{{ asset('global_assets/js/demo_pages/form_inputs.js') }}"></script>
    <script src="{{ asset('global_assets/js/demo_pages/invoice_grid.js') }}"></script>
    <script src="{{ asset('global_assets/js/custom.js') }}"></script>
    <!-- /theme JS files -->

</head>

<body>
    @php
    $sum =[]
    @endphp
    <!-- Page content -->
    <div class="page-content">
        <div class="content-wrapper">
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
                                    <img src="{{ asset('global_assets/images/logo_demo.png') }}" class="mb-3 mt-2"
                                        alt="" style="width: 120px;">
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
                                    <li>{{ $pemesanan->user->wisatawan->jenis_kelamin =='L' ?'Laki-laki':'Perempuan' }}
                                    </li>
                                    <li>{{ $pemesanan->user->wisatawan->alamat }}</li>
                                    <li>{{ $pemesanan->user->wisatawan->organisasi }}</li>
                                    <li>{{ $pemesanan->user->wisatawan->no_telp }}</li>
                                    <li><a href="#">{{ $pemesanan->user->wisatawan->email }}</a></li>
                                </ul>
                            </div>

                            <div class="mb-2 ml-auto">
                                <span class="text-muted">Detail Pembayaran:</span>
                                <div class="d-flex flex-wrap wmin-md-400">
                                    <ul class="list list-unstyled mb-0">

                                        <li>Nama Bank:</li>
                                        <li>Negara:</li>
                                        <li>Kabupaten/Kota:</li>
                                        <li>Alamat:</li>


                                    </ul>

                                    <ul class="list list-unstyled text-right mb-0 ml-auto">

                                        <li><span class="font-weight-semibold">Bank Central Asia</span></li>
                                        <li>Indonesia</li>
                                        <li>Aceh</li>
                                        <li>Aceh Besar</li>


                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-lg">
                            <thead>
                                <tr>
                                    <th>Deskripsi</th>
                                    <th>Pack</th>
                                    <th>Hari</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>

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
                                        <span class="text-muted">{{"Rp " .
                                            number_format($item->harga,2,',','.') }}, Check-In {{ $item->check_in }} -
                                            Check-Out {{
                                            $item->check_out }}</span>
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
                                <h6 class="mb-3">Total</h6>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th>Subtotal:</th>
                                                <td class="text-right">{{"Rp " .
                                                    number_format(array_sum($sum),2,',','.') }}</td>
                                            </tr>
                                            <tr>
                                                <th>Total:</th>
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
        </div>
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