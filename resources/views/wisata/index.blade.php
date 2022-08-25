@extends('templates.master')
@section('master')
<!-- Page header -->
<div class="page-header page-header-light">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Wisata</span> -
                {{ $title }}</h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>


    </div>

    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="#" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Wisata</a>
                <span class="breadcrumb-item active">{{ $title }}</span>
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
                                <th>Nama</th>
                                <th>Jenis Wisata</th>
                                <th>Alamat</th>
                                <th class="text-center">Detail Wisata</th>

                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->nama}}</td>
                                <td>{{$item->jenis_wisata->nama}}</td>
                                <td>{{$item->alamat}}</td>
                                <td class="text-center"> <a href="{{route('wisata.show',$item->id)}}"
                                        class="btn btn-success btn-sm"><i class="icon-list"></i></a></td>
                                <td class="text-center">
                                    <a href="{{route('wisata.edit',$item->id)}}" class="btn btn-primary btn-sm"><i
                                            class="icon-pencil6 "></i></a>
                                    <a href="{{route('wisata.destroy',$item->id)}}"
                                        class="btn btn-danger btn-sm deleted"><i class="icon-trash "></i></a>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header bg-primary text-white header-elements-inline">
                    <h5 class="card-title">Form {{$title}}</h5>
                    <div class="header-elements">

                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('wisata.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <fieldset class="mb-3">


                            <div class="row">
                                <div class="col-sm-12">
                                    <legend class="text-uppercase font-size-sm font-weight-bold">{{$title}}</legend>

                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-4">Nama</label>
                                        <div class="col-lg-8">
                                            <input type="text" name="nama" placeholder="Nama" required
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-4">Jenis Wisata</label>
                                        <div class="col-lg-8">

                                            <select name="jenis_wisata_id" class="form-control select2" id=""
                                                data-placeholder="Jenis Wisata">
                                                <option value=""></option>
                                                @foreach ($jenis_wisata as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-4">Alamat</label>
                                        <div class="col-lg-8">
                                            <textarea name="alamat" class="form-control" placeholder="Alamat" id=""
                                                cols="20" rows="5"></textarea>
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
    $(document).ready(function(){
        $('.generate').click(function(){
            var randomstring = Math.random().toString(36).slice(-8);
            $('#password').val(randomstring);
        });
    });
</script>
<!-- /content area -->
@endsection