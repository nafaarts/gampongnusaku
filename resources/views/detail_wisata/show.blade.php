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
                                <form action="{{route('detailwisata.update',$find->id)}}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('put')

                                    <fieldset class="mb-3">


                                        <div class="row">
                                            <div class="col-sm-12">
                                                <legend class="text-uppercase font-size-sm font-weight-bold">{{$title}}
                                                </legend>
                                                <input type="hidden" name="wisata_id" value="{{ $id }}">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-lg-4">Nama</label>
                                                    <div class="col-lg-8">
                                                        <input type="text" name="nama" value="{{ $find->nama }}"
                                                            placeholder="Nama" required class="form-control" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-form-label col-lg-4">Harga</label>
                                                    <div class="col-lg-8">
                                                        <input type="number" value="{{ $find->harga }}" name="harga"
                                                            placeholder="Harga" required class="form-control" readonly>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-form-label col-lg-4">Deskripsi</label>
                                                    <div class="col-lg-8">
                                                        <textarea name="deskripsi" class="form-control"
                                                            placeholder="Deskripsi" id="" cols="20" rows="5"
                                                            readonly>{{ $find->deskripsi }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-form-label col-lg-4">Image</label>
                                                    <div class="col-lg-8">


                                                        <img id="imageresource"
                                                            src="{{ asset('storage/image/'.$find->image) }}" style="max-width:100%;
                                                                    max-height:100%;">


                                                    </div>

                                                </div>
                                            </div>

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
                                    <a href="{{ route('wisata.show',$find->wisata_id) }}"
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

@endsection