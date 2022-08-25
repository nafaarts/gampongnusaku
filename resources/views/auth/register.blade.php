<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Gampong Nusa - Register</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
        type="text/css">
    <link href="{{ asset('global_assets/css/icons/icomoon/styles.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('global_assets/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('global_assets/assets/css/bootstrap_limitless.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('global_assets/assets/css/layout.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('global_assets/assets/css/components.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('global_assets/assets/css/colors.min.css')}}" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script src="{{ asset('global_assets/js/main/jquery.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/main/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/plugins/loaders/blockui.min.js') }}"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="{{ asset('global_asset/assets/js/app.js') }}"></script>
    <!-- /theme JS files -->
    {!! ReCaptcha::htmlScriptTagJsApi() !!}

</head>

<body>



    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content d-flex justify-content-center align-items-center">
                @if ($errors->any())
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li class="text text-danger">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <!-- Registration form -->
                <form class="flex-fill" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 offset-lg-3">
                            <div class="card mb-0">
                                <div class="card-body">
                                    <div class="text-center mb-3">
                                        <i
                                            class="icon-plus3 icon-2x text-success border-success border-3 rounded-round p-3 mb-3 mt-1"></i>
                                        <h5 class="mb-0">Create account</h5>
                                        <span class="d-block text-muted">All fields are required</span>
                                    </div>


                                    <div class="form-group text-center text-muted content-divider">
                                        <span class="px-2">Your credentials</span>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group form-group-feedback form-group-feedback-left">
                                                <input type="text" class="form-control" name="name" placeholder="Name">
                                                <div class="form-control-feedback">
                                                    <i class="icon-user-check text-muted"></i>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group form-group-feedback form-group-feedback-left">
                                                <input type="text" class="form-control" name="email"
                                                    placeholder="Your email">
                                                <div class="form-control-feedback">
                                                    <i class="icon-mention text-muted"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">

                                            <div class="form-group form-group-feedback form-group-feedback-left">
                                                <input type="password" class="form-control" name="password"
                                                    placeholder="Password">
                                                <div class="form-control-feedback">
                                                    <i class="icon-user-lock text-muted"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group form-group-feedback form-group-feedback-left">
                                                <input type="password" class="form-control" name="password_confirmation"
                                                    placeholder="Repeat Password">
                                                <div class="form-control-feedback">
                                                    <i class="icon-user-lock text-muted"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group text-center text-muted content-divider">
                                        <span class="px-2">Your Profile</span>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group form-group-feedback form-group-feedback-left">
                                                <select type="text" class="form-control select2" name="jenis_kelamin"
                                                    placeholder="Jenis Kelamin">
                                                    <option value="L">Pria</option>
                                                    <option value="P">Wanita</option>
                                                </select>
                                                <div class="form-control-feedback">
                                                    <i class="icon-user-check text-muted"></i>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group form-group-feedback form-group-feedback-left">
                                                <input type="text" class="form-control" name="no_telp"
                                                    placeholder="Your Phone">
                                                <div class="form-control-feedback">
                                                    <i class="icon-mention text-muted"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">


                                        <div class="col-md-6">
                                            <div class="form-group form-group-feedback form-group-feedback-left">
                                                <input type="text" class="form-control" name="organisasi"
                                                    placeholder="Your Organization">
                                                <div class="form-control-feedback">
                                                    <i class="icon-mention text-muted"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">

                                            <textarea class="form-control" placeholder="Address" name="alamat"
                                                rows="4"></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            {!! htmlFormSnippet() !!}
                                        </div>
                                    </div>


                                    <div class="text-right">
                                        <button type="submit"
                                            class="btn bg-teal-400 btn-labeled btn-labeled-right"><b><i
                                                    class="icon-plus3"></i></b> Create account</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>


            </div>
            <!-- /content area -->

            <!-- Footer -->
            @include('templates.footer')
            <!-- /footer -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</body>

</html>