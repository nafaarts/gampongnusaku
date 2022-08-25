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
                <div class="card">
                    <div class="card-body text-center">
                        <i
                            class="icon-switch icon-2x text-success-400 border-success-400 border-3 rounded-round p-3 mb-3 mt-1"></i>
                        <h5 class="card-title">Hai, Selamat Datang Kembali!</h5>
                        <p class="mb-3">Akun Gampong Nusa Anda Telah aktif, Silahkan Klik Tombol Sign In dibawah </p>
                        <a href="{{ route('login') }}" class="btn bg-success-400">Sign In</a>
                    </div>
                </div>
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