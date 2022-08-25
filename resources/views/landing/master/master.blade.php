<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Gampong Nusa</title>
    <link rel="icon" href="{{ asset('global_assets_landing/img/favicon.png') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('global_assets_landing/css/bootstrap.min.css') }}">
    <!-- animate CSS -->
    <link rel="stylesheet" href="{{ asset('global_assets_landing/css/animate.css') }}">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="{{ asset('global_assets_landing/css/owl.carousel.min.css') }}">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{ asset('global_assets_landing/css/all.css') }}">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="{{ asset('global_assets_landing/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('global_assets_landing/css/themify-icons.css') }}">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{ asset('global_assets_landing/css/magnific-popup.css') }}">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="{{ asset('global_assets_landing/css/slick.css') }}">
    <!-- style CSS -->
    <link rel="stylesheet" href="{{ asset('global_assets_landing/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
</head>
<style>
    .owl-nav {
        display: none;
    }
</style>

<body>

    <x-mainnavbar />
    <!-- banner part start-->
    @yield('master')
    <div id="overlay">
        <div class="cv-spinner">
            <span class="spinner"></span>
        </div>
    </div>
    <!--::subscribe_area part end::-->
    @include('landing.master.footer')


    <!-- jquery plugins here-->
    <script src="{{ asset('global_assets_landing/js/jquery-1.12.1.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <!-- popper js -->
    <script src="{{ asset('global_assets_landing/js/popper.min.js') }}"></script>
    <!-- bootstrap js -->
    <script src="{{ asset('global_assets_landing/js/bootstrap.min.js') }}"></script>
    <!-- easing js -->
    <script src="{{ asset('global_assets_landing/js/jquery.magnific-popup.js') }}"></script>
    <!-- swiper js -->
    <script src="{{ asset('global_assets_landing/js/swiper.min.js') }}"></script>
    <!-- swiper js -->
    <script src="{{ asset('global_assets_landing/js/masonry.pkgd.js') }}"></script>
    <!-- particles js -->
    <script src="{{ asset('global_assets_landing/js/lightslider.min.js') }}"></script>
    <script src="{{ asset('global_assets_landing/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('global_assets_landing/js/jquery.nice-select.min.js') }}"></script>
    <!-- slick js -->
    <script src="{{ asset('global_assets_landing/js/slick.min.js') }}"></script>
    <script src="{{ asset('global_assets_landing/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('global_assets_landing/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('global_assets_landing/js/contact.js') }}"></script>
    <script src="{{ asset('global_assets_landing/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('global_assets_landing/js/jquery.form.js') }}"></script>
    <script src="{{ asset('global_assets_landing/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('global_assets_landing/js/mail-script.js') }}"></script>
    <script src="{{ asset('global_assets_landing/js/stellar.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.single-item').slick();

        });
    </script>

    <!-- custom js -->
    <script src="{{ asset('global_assets_landing/js/custom.js') }}"></script>
    @include('landing.support.modal_cart')
    @include('landing.master.javascript')
    <a href="https://api.whatsapp.com/send/?phone=6281360698810&text&type=phone_number&app_absent=0" class="float"
        target="_blank">
        <i class="fa fa-phone my-float"></i>
    </a>
</body>

</html>