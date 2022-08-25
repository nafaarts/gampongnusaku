@extends('templates.master')
@section('master')
<div class="content">
    <div class="content">
        <div class="d-flex align-items-start flex-column flex-md-row">

            <!-- Left content -->
            <div class="w-100 order-2 order-md-1">
                <div class="row">
                    @foreach ($data->detail_wisata as $item)
                    <div class="col-lg-6">
                        <div class="card border-left-3 border-left-danger rounded-left-0">
                            <div class="card-body">
                                <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
                                    <div>
                                        <h6 class="font-weight-semibold">{{ $item->nama }}</h6>
                                        <ul class="list list-unstyled mb-0">
                                            <li>Harga #: <a href="#">{{ $item->harga }}</a></li>
                                            <li>Deskripsi : <span class="font-weight-semibold">{{ $item->deskripsi
                                                    }}</span>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="text-sm-right mb-0 mt-3 mt-sm-0 ml-auto">
                                        <img src="{{ asset('storage/image/'.$item->image) }}" style="max-width:140px;
                                        max-height:75;" alt="">
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer d-sm-flex justify-content-sm-between align-items-sm-center">
                                <span>
                                    <span class="badge badge-mark border-danger mr-2"></span>
                                    Due:
                                    <span class="font-weight-semibold"></span>
                                </span>

                                <ul class="list-inline list-inline-condensed mb-0 mt-2 mt-sm-0">
                                    <li class="list-inline-item">
                                        <a href="{{ route('detailwisata.show',$item->id) }}" class="text-default"><i
                                                class="icon-eye8"></i></a>
                                    </li>
                                    <li class="list-inline-item dropdown">
                                        <a href="$" class="text-default dropdown-toggle" data-toggle="dropdown"><i
                                                class="icon-menu7"></i></a>

                                        <div class="dropdown-menu dropdown-menu-right">

                                            <a href="{{ route('detailwisata.edit',$item->id) }}"
                                                class="dropdown-item"><i class="icon-file-plus"></i> Edit
                                            </a>
                                            <a href="{{ route('detailwisata.destroy',$item->id) }}"
                                                class="dropdown-item deleted-card"><i class="icon-cross2"></i> Remove
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach



                </div>
            </div>
            <!-- /left content -->
            <!-- Right sidebar component -->
            <div
                class="sidebar sidebar-light bg-transparent sidebar-component sidebar-component-right border-0 shadow-0 order-1 order-md-2 sidebar-expand-md">

                <!-- Sidebar content -->
                <div class="sidebar-content">

                    <!-- Invoice actions -->
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
                            <div class="row">
                                <div class="col">
                                    <a href="{{ route('detailwisata.create',$data->id) }}"
                                        class="btn bg-teal-400 btn-block btn-float">
                                        <i class="icon-file-plus icon-2x"></i>
                                        <span>New Detail</span>
                                    </a>


                                </div>

                                <div class="col">
                                    <button type="button" class="btn bg-warning-400 btn-block btn-float">
                                        <i class="icon-stats-bars icon-2x"></i>
                                        <span>Statistics</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /invoice actions -->


                    <!-- Navigation -->
                    <div class="card">
                        <div class="card-header bg-transparent header-elements-inline">
                            <span class="card-title font-weight-semibold">Detail Wisata</span>
                            <div class="header-elements">
                                <div class="list-icons">
                                    <a class="list-icons-item" data-action="collapse"></a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body p-0">
                            <div class="nav nav-sidebar mb-2">

                                <li class="nav-item">
                                    <span class="nav-link">
                                        <i class="icon-office"></i>
                                        {{ $data->nama }}
                                    </span>
                                </li>
                                <li class="nav-item">
                                    <span class="nav-link">
                                        <i class="icon-location4"></i>
                                        {{ $data->alamat }}
                                    </span>
                                </li>




                            </div>
                        </div>
                    </div>
                    <!-- /navigation -->


                </div>
                <!-- /sidebar content -->

            </div>
            <!-- /right sidebar component -->
        </div>
    </div>
</div>

@endsection