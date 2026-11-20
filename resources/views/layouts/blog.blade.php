<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!--
    Basic Page Needs
    ==================================================
    -->
    <meta charset="utf-8">
    <title>{{ config('app.name') }} - @yield('title')</title>
    <!--
    Mobile Specific Metas
    ==================================================
    -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="@yield('description')">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!--
    CSS
    ==================================================
    -->
    <!-- Bootstrap-->
    <link rel="stylesheet" href="{{ asset('vendor/my-blog/css/bootstrap.min.css') }}">
    <!-- Animation-->
    <link rel="stylesheet" href="{{ asset('vendor/my-blog/css/animate.css') }}">
    <!-- Morris CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/my-blog/css/morris.css') }}">
    <!-- FontAwesome-->
    <link rel="stylesheet" href="{{ asset('vendor/my-blog/css/font-awesome.min.css') }}">
    <!-- Icon font-->
    <link rel="stylesheet" href="{{ asset('vendor/my-blog/css/icon-font.css') }}">
    <!-- Owl Carousel-->
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans:400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('vendor/my-blog/css/owl.carousel.min.css') }}">
    <!-- Owl Theme -->
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <!-- Colorbox-->
    <link rel="stylesheet" href="{{ asset('vendor/my-blog/css/colorbox.css') }}">
    <!-- Template styles-->
    <link rel="stylesheet" href="{{ asset('vendor/my-blog/css/style.css') }}">
    <!-- Responsive styles-->
    <link rel="stylesheet" href="{{ asset('vendor/my-blog/css/responsive.css') }}">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file.-->
    <!--if lt IE 9
    script(src='{{ asset('vendor/my-blog/js/html5shiv.js') }}')
    script(src='{{ asset('vendor/my-blog/js/respond.min.js') }}')    
    -->

    <link rel="icon" type="image/png" href="{{ asset('vendor/my-blog/images/favicon.png') }}">

    <style>
        .float {
            position: fixed;
            width: 60px;
            height: 60px;
            bottom: 80px;
            right: 40px;
            background-color: #25d366;
            color: #FFF;
            border-radius: 50px;
            text-align: center;
            font-size: 30px;
            box-shadow: 2px 2px 3px #999;
            z-index: 100;
        }

        .my-float {
            margin-top: 16px;
        }
    </style>

    <a href="https://api.whatsapp.com/send?phone=51981296614&text=Hola%2C%20te%20escribo%20desde%20la%20pagina%20web%20de%20norez%20corp%2C%20necesito%20informacion%20de%20tus%20servicios%20y%20costos%2C%20gracias" class="float" target="_blank">
        <i class="fa fa-whatsapp my-float"></i>
    </a>

	<link rel="canonical" href="{{ url()->current() }}">

</head>
<body>
    <div class="body-inner">

        @include('layouts._blog._navbar')

        @yield('content')

        @include('layouts._blog._footer')

        <div class="back-to-top affix" id="back-to-top" data-spy="affix" data-offset-top="10">
            <button class="btn btn-primary" title="Ir Arriba"><i class="fa fa-angle-double-up"></i>
                <!-- icon end-->
            </button>
            <!-- button end-->
        </div>
        <!-- End Back to Top-->
        <!--
      Javascript Files
      ==================================================
      -->
        <!-- initialize jQuery Library-->
        <script type="text/javascript" src="{{ asset('vendor/my-blog/js/jquery.js') }}"></script>
        <!-- Bootstrap jQuery-->
        <script type="text/javascript" src="{{ asset('vendor/my-blog/js/bootstrap.min.js') }}"></script>
        <!-- Owl Carousel-->
        <script type="text/javascript" src="{{ asset('vendor/my-blog/js/owl.carousel.min.js') }}"></script>
        <!-- Counter-->
        <script type="text/javascript" src="{{ asset('vendor/my-blog/js/jquery.counterup.min.js') }}"></script>
        <!-- Waypoints-->
        <script type="text/javascript" src="{{ asset('vendor/my-blog/vendor/my-blog/js/waypoints.min.js') }}"></script>
        <!-- Color box-->
        <script type="text/javascript" src="{{ asset('vendor/my-blog/js/jquery.colorbox.js') }}"></script>

        <!-- Template custom-->
        <script type="text/javascript" src="{{ asset('vendor/my-blog/js/custom.js') }}"></script>

    </div>

</body>
</html>