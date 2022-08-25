@extends('templates.master')
@section('master')
<div class="content">
    <div class="content">
        <div class="d-flex align-items-start flex-column flex-md-row">

            <!-- Left content -->
            <div class="w-100 order-2 order-md-1">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card border-left-3 border-left-primary rounded-left-0">
                            <div class="card-body">
                                <form action="{{route('detailwisata.store')}}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <fieldset class="mb-3">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <legend class="text-uppercase font-size-sm font-weight-bold">{{$title}}
                                                </legend>
                                                <input type="hidden" name="wisata_id" value="{{ $id }}">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-lg-4">Nama</label>
                                                    <div class="col-lg-8">
                                                        <input type="text" name="nama" placeholder="Nama" required
                                                            class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-form-label col-lg-4">Harga</label>
                                                    <div class="col-lg-8">
                                                        <input type="number" name="harga" placeholder="Harga" required
                                                            class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-form-label col-lg-4">Image</label>
                                                    <div class="col-lg-8">
                                                        <input type="file" name="image"
                                                            class="form-control-uniform-custom">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-form-label col-lg-4">Jenis Kalkulasi</label>
                                                    <div class="col-lg-8">
                                                        <select name="jenis_kalkulasi" class="form-control select2"
                                                            id="" data-placeholder="Pilih Jenis">
                                                            <option value=""></option>
                                                            <option value="0">Hari</option>
                                                            <option value="1">Pax</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-form-label col-lg-4">Deskripsi</label>
                                                    <div class="col-lg-8">
                                                        <textarea name="deskripsi" class="form-control"
                                                            placeholder="Deskripsi" id="" cols="20" rows="5"></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-primary">Submit <i
                                                    class="icon-paperplane ml-2"></i></button>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>

                        </div>
                    </div>


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
                                    <a href="{{ route('wisata.show',$id) }}"
                                        class="btn bg-danger-400 btn-block btn-float">
                                        <i class="icon-backward2 icon-2x"></i>
                                        <span>Back</span>
                                    </a>


                                </div>

                                <div class="col">

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