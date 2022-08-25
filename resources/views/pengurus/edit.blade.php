@extends('templates.master')
@section('master')
<!-- Page header -->
<div class="page-header page-header-light">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Master</span> -
                Pengurus</h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>


    </div>

    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="#" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Master</a>
                <span class="breadcrumb-item active">Pengurus</span>
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
                    <h5 class="card-title">Form {{$title}}</h5>
                    <div class="header-elements">

                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('pengurus.update',$data->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <fieldset class="mb-3">


                            <div class="row">
                                <div class="col-sm-12">
                                    <legend class="text-uppercase font-size-sm font-weight-bold">{{$title}}</legend>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-4">Nama</label>
                                        <div class="col-lg-8">
                                            <input type="text" name="nama" value="{{ $data->nama }}" placeholder="Nama"
                                                required class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-4">Email</label>
                                        <div class="col-lg-8">
                                            <input type="text" name="email" value="{{ $data->email }}"
                                                placeholder="Email" required class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-4">No Telp</label>
                                        <div class="col-lg-8">
                                            <input type="text" name="no_telp" value="{{ $data->no_telp }}"
                                                placeholder="No Telp" required class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-4">Alamat</label>
                                        <div class="col-lg-8">
                                            <textarea name="alamat" class="form-control" placeholder="Alamat" id=""
                                                cols="20" rows="5">{{ $data->alamat }}</textarea>
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
<script>
    $(document).ready(function() {
        $('.generate').click(function() {
            var randomstring = Math.random().toString(36).slice(-8);
            $('#password').val(randomstring);
        });
    });
</script>
<!-- /content area -->
@endsection