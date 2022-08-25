<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Gampong Nusa - Reset Password</title>

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

</head>

<body>



    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content d-flex justify-content-center align-items-center">

                <!-- Login form -->
                <form class="login-form" method="POST" action="{{ route('password.email') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card mb-0">
                        <div class="card-body">
                            <div class="text-center mb-3">
                                <h5 class="mb-0">Reset Password</h5>
                            </div>

                            <div class="form-group form-group-feedback form-group-feedback-left">
                                <input type="text" class="form-control" placeholder="Email" name="email">
                                <div class="form-control-feedback">
                                    <i class="icon-user text-muted"></i>
                                </div>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Send Password Link <i
                                        class="icon-circle-right2 ml-2"></i></button>
                            </div>


                        </div>
                    </div>
                </form>
                <!-- /login form -->

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