@extends('templates.master')
@section('master')
<!-- Page header -->
<div class="page-header page-header-light">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Master</span> -
                {{ $title }}</h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>


    </div>

    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="#" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Master</a>
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

        <div class="col-sm-6">
            <div class="card">
                <div class="card-header bg-primary text-white header-elements-inline">
                    <h5 class="card-title">Form {{$title}}</h5>
                    <div class="header-elements">

                    </div>
                </div>
                <div class="card-body">

                    <form action="{{route('sliders.update',$data->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <fieldset class="mb-3">
                            <legend class="text-uppercase font-size-sm font-weight-bold">{{$title}}</legend>
                            @if ($errors->any())
                            <div>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li class="text text-danger">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <div class="form-group row">
                                <label class="col-form-label col-lg-4">Nama Kegiatan</label>
                                <div class="col-lg-8">
                                    <input type="text" value="{{ $data->title }}" name="title" class="form-control">

                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-lg-4">Image</label>
                                <div class="col-lg-8">
                                    <input type="file" name="image" class="form-control-uniform-custom">
                                    <a class="badge badge-primary" href="#" id="pop">
                                        <img id="imageresource" src="{{ asset('storage/image/'.$data->image) }}" style="max-width:100%;
                                            max-height:100%;" hidden>
                                        Img
                                    </a>
                                </div>

                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-lg-4">Deskripsi</label>
                                <div class="col-lg-12">
                                    <textarea class="" name="deskripsi" id="summernote">
{{ $data->deskripsi }}
                                    </textarea>
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
        $("#pop").on("click", function() {
        $('#imagepreview').attr('src', $(this).find('#imageresource').attr('src')); // here asign the image to the modal when the user click the enlarge link
         $('#imagemodal').modal('show'); // imagemodal is the id attribute assigned to the bootstrap modal, then i use the show function
        }); 
    });
</script>
<!-- /content area -->
@endsection