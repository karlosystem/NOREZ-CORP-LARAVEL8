<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="irstheme">
    <meta name="description" content="@yield('description')">

    <title>{{ config('app.name') }} - @yield('title')</title>

    <!-- Plantilla para folklore de mi tierra CSS -->
    <link href="{{ asset('vendor/my-folklore/css/themify-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/my-folklore/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/my-folklore/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/my-folklore/css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/my-folklore/css/owl.theme.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/my-folklore/css/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/my-folklore/css/slick-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/my-folklore/css/swiper.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/my-folklore/css/owl.transitions.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/my-folklore/css/jquery.fancybox.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/my-folklore/css/style.css') }}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <!-- start page-wrapper -->
    <div class="page-wrapper">
        <!-- start preloader -->
        <div class="preloader">
            <div class="lds-roller">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
        <!-- end preloader -->

        <!-- Start cabecera -->
        @include('layouts._folklore._cabecera')

        @yield('content')

        <!-- Footer:start -->
        @include('layouts._folklore._footer')
        <!-- Footer:end -->

    </div>

    <!-- All JavaScript files
    ================================================== -->
    <script src="{{ asset('vendor/my-folklore/js/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/my-folklore/js/bootstrap.min.js') }}"></script>

    <!-- Plugins for this template -->
    <script src="{{ asset('vendor/my-folklore/js/jquery-plugin-collection.js') }}"></script>
    <script src="{{ asset('vendor/my-folklore/js/navigation.js') }}"></script>

    <!-- Custom script for this template -->
    <script src="{{ asset('vendor/my-folklore/js/script.js') }}"></script>

</body>

</html>
