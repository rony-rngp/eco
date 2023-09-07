<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">
    <meta name="robots" content="all">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title> @yield('title') - Flipmart premium HTML5 & CSS3 Template</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{ asset('public/frontend') }}/assets/css/bootstrap.min.css">

    <!-- Customizable CSS -->
    <link rel="stylesheet" href="{{ asset('public/frontend') }}/assets/css/main.css">
    <link rel="stylesheet" href="{{ asset('public/frontend') }}/assets/css/blue.css">
    <link rel="stylesheet" href="{{ asset('public/frontend') }}/assets/css/owl.carousel.css">
    <link rel="stylesheet" href="{{ asset('public/frontend') }}/assets/css/owl.transitions.css">
    <link rel="stylesheet" href="{{ asset('public/frontend') }}/assets/css/animate.min.css">
    <link rel="stylesheet" href="{{ asset('public/frontend') }}/assets/css/rateit.css">
    <link rel="stylesheet" href="{{ asset('public/frontend') }}/assets/css/bootstrap-select.min.css">

    <!-- Icons/Glyphs -->
    <link rel="stylesheet" href="{{ asset('public/frontend') }}/assets/css/font-awesome.css">

    <!-- BEGIN: iziToast-->
    <link href="{{ asset('public/css/iziToast.css') }}" rel="stylesheet">

    <!-- BEGIN: Validation-->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/backend') }}/app-assets/css/plugins/forms/validation/form-validation.css">


    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <style>
        .no-js #loader { display: none;  }
        .js #loader { display: block; position: absolute; left: 100px; top: 0; }
        .se-pre-con {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url({{ asset('public/frontend/ajax-loader.gif') }}) center no-repeat #fff;
        }
    </style>
    @stack('css')

</head>
<body class="cnt-home">

<div class="se-pre-con"></div>
<!-- ============================================== HEADER ============================================== -->
@include('layouts.frontend.partial.header')
<!-- ============================================== HEADER : END ============================================== -->
<div class="body-content outer-top-xs" id="top-banner-and-menu">
    <div class="container">
           @yield('content')
    </div><!-- /.container -->
</div><!-- /#top-banner-and-menu -->




<!-- ============================================================= FOOTER ============================================================= -->
@include('layouts.frontend.partial.footer')
<!-- ============================================================= FOOTER : END============================================================= -->


<!-- For demo purposes – can be removed on production -->


<!-- For demo purposes – can be removed on production : End -->

<!-- JavaScripts placed at the end of the document so the pages load faster -->
<script src="{{ asset('public/frontend') }}/assets/js/jquery-1.11.1.min.js"></script>

<script src="{{ asset('public/frontend') }}/assets/js/bootstrap.min.js"></script>

<script src="{{ asset('public/frontend') }}/assets/js/bootstrap-hover-dropdown.min.js"></script>
<script src="{{ asset('public/frontend') }}/assets/js/owl.carousel.min.js"></script>

<script src="{{ asset('public/frontend') }}/assets/js/echo.min.js"></script>
<script src="{{ asset('public/frontend') }}/assets/js/jquery.easing-1.3.min.js"></script>
<script src="{{ asset('public/frontend') }}/assets/js/bootstrap-slider.min.js"></script>
<script src="{{ asset('public/frontend') }}/assets/js/jquery.rateit.min.js"></script>
<script type="text/javascript" src="{{ asset('public/frontend') }}/assets/js/lightbox.min.js"></script>
<script src="{{ asset('public/frontend') }}/assets/js/bootstrap-select.min.js"></script>
<script src="{{ asset('public/frontend') }}/assets/js/wow.min.js"></script>
<script src="{{ asset('public/frontend') }}/assets/js/scripts.js"></script>

<script src="{{ asset('public/js/iziToast.js') }}"></script>
@include('vendor.lara-izitoast.toast')

    <!-- Spinner : End -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
<script>
    $(window).load(function() {
        // Animate loader off screen
        $(".se-pre-con").fadeOut("slow");
    });
</script>

<!-- BEGIN: Validation-->
<script src="{{ asset('public/backend') }}/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
<script src="{{ asset('public/backend') }}/app-assets/js/scripts/forms/validation/form-validation.js"></script>
<!-- END: Validation-->

@stack('js')
</body>

</html>
