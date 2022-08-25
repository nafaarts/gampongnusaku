@extends('templates.master')
@section('master')
<!-- Page header -->
<div class="page-header page-header-light">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Master</span> -
                Jenis Wisata</h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>


    </div>

    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="#" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Master</a>
                <span class="breadcrumb-item active">Jenis Wisata</span>
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
        <div class="col-sm-6">
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
                                <th>Jenis Wisata</th>

                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->nama}}</td>
                                <td class="text-center">
                                    <a href="{{route('jeniswisata.edit',$item->id)}}" class="btn btn-primary btn-sm"><i
                                            class="icon-pencil6 "></i></a>
                                    <a href="{{route('jeniswisata.destroy',$item->id)}}"
                                        class="btn btn-danger btn-sm deleted"><i class="icon-trash "></i></a>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header bg-primary text-white header-elements-inline">
                    <h5 class="card-title">Form {{$title}}</h5>
                    <div class="header-elements">

                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('jeniswisata.update',$show->id)}}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <fieldset class="mb-3">
                            <legend class="text-uppercase font-size-sm font-weight-bold">{{$title}}</legend>

                            <div class="form-group row">
                                <label class="col-form-label col-lg-4">Jenis Wisata</label>
                                <div class="col-lg-8">
                                    <input type="text" value="{{$show->nama}}" name="nama" class="form-control">
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
<!-- /content area -->
@endsection