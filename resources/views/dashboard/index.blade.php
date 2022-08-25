@extends('templates.master')
@section('master')
<!-- Page header -->
<div class="page-header page-header-light">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> -
                Dashboard</h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>


    </div>

    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                <span class="breadcrumb-item active">Dashboard</span>
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
    <!-- Quick stats boxes -->
    <div class="row">
        <div class="col-lg-4">

            <!-- Members online -->
            <div class="card ">
                <div class="card-header header-elements-inline bg-green-400">
                    <h6 class="card-title">Pilihan Wisata Terlaris</h6>
                    <div class="header-elements">
                        <a href="{{ route('wisata.index') }}" class="badge badge-success">Wisata</a>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table datatable-basic-dashboard">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Wisata</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($detail_wisata as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>


            </div>
            <!-- /members online -->

        </div>

        <div class="col-lg-4">

            <!-- Members online -->
            <div class="card ">
                <div class="card-header header-elements-inline bg-blue-400">
                    <h6 class="card-title">Pembayaran Menunggu</h6>
                    <div class="header-elements">
                        <a href="{{ route('pembayaran.index') }}" class="badge badge-primary">Pembayaran</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table datatable-basic-dashboard">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pembayaran_data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td> @if ($item->status == '1')
                                    <span class="badge badge-warning">menunggu</span>
                                    @else
                                    <span class="badge badge-success">berhasil</span>

                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>


            </div>
            <!-- /members online -->

        </div>

        <div class="col-lg-4">
            <div class="row">
                <div class="col-sm-6">
                    <!-- Current server load -->
                    <div class="card bg-pink-400">
                        <div class="card-body">
                            <div class="d-flex">
                                <h3 class="font-weight-semibold mb-0">{{ $pemesanan }}</h3>
                                <a href="{{ route('pemesanan.index') }}"
                                    class="badge bg-teal-800 badge-pill align-self-center ml-auto">Pemesanan</a>
                            </div>
                            <div>
                                Pemesanan
                            </div>
                        </div>
                    </div>
                    <!-- /current server load -->
                </div>
                <div class="col-sm-6">
                    <!-- Today's revenue -->
                    <div class="card bg-blue-400">
                        <div class="card-body">
                            <div class="d-flex">
                                <h3 class="font-weight-semibold mb-0">{{ $pembayaran }}</h3>
                                <a href="{{ route('pembayaran.index') }}"
                                    class="badge bg-teal-800 badge-pill align-self-center ml-auto">Pembayaran</a>

                            </div>

                            <div>
                                Pembayaran

                            </div>
                        </div>

                    </div>
                    <!-- /today's revenue -->
                </div>
            </div>


        </div>
    </div>
</div>
<!-- /content area -->
@endsection