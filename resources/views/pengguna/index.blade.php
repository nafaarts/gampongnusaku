@extends('templates.master')
@section('master')
<!-- Page header -->
<div class="page-header page-header-light">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Pengguna</span> -
                Pengguna</h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>


    </div>

    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="#" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Pengguna</a>
                <span class="breadcrumb-item active">Pengguna</span>
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
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Created At</th>

                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                <td>@if ($item->role == '1')
                                    <span class="badge badge-primary">Admin</span>
                                    @else
                                    <span class="badge badge-warning">User</span>
                                    @endif
                                </td>
                                <td>
                                    {{ Carbon::parse($item->created_at)->format('d/m/Y') }}
                                </td>
                                <td class="text-center">
                                    <a href="{{route('pengguna.edit',$item->id)}}" class="btn btn-primary btn-sm"><i
                                            class="icon-pencil6 "></i></a>
                                    <a href="{{route('pengguna.destroy',$item->id)}}"
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
                    <form action="{{route('pengguna.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <fieldset class="mb-3">
                            <legend class="text-uppercase font-size-sm font-weight-bold">{{$title}}</legend>

                            <div class="form-group row">
                                <label class="col-form-label col-lg-4">Name</label>
                                <div class="col-lg-8">
                                    <input type="text" name="name" placeholder="Name" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-4">Email</label>
                                <div class="col-lg-8">
                                    <input type="text" name="email" placeholder="Email" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-4">Password</label>
                                <div class="col-lg-8">
                                    <input type="password" placeholder="Password" name="password" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-4">Repeat Password</label>
                                <div class="col-lg-8">
                                    <input type="password" placeholder="Re Password" name="password_confirmation"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-4">Role</label>
                                <div class="col-lg-8">
                                    <select name="role" id="" class="form-control select2" data-placeholder="Role">
                                        <option value=""></option>
                                        <option value="1">Admin</option>
                                        <option value="2">User</option>
                                    </select>
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