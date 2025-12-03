<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>{{ config('app.name') }} - @yield('title')</title>
    <!-- my-dashboard -->
    <link rel="stylesheet" href="{{ asset('vendor/my-dashboard/css/dashboard.css') }}">
    <!-- fontawesome -->
    <script src="{{ asset('vendor/fontawesome-free/js/all.min.js') }}"></script>

    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet" />

    <!-- icon flag -->
    <link rel="stylesheet" href="{{ asset('vendor/flag-icon-css/css/flag-icon.min.css') }}">
    {{-- css:external --}}
    @stack('css-external')

    {{-- css:internal --}}
    @stack('css-internal')
</head>

<body>
    <!-- begin:navbar -->
    @include('layouts._dashboard.navbar')
    <!-- end:navbar -->
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <!-- begin:sidebar -->
            @include('layouts._dashboard.sidebar')
            <!-- end:sidebar -->
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h2 class="mt-2">
                        @yield('title')
                    </h2>
                    <!-- begin:breadcrumbs -->
                    @yield('breadcrumbs')
                    <!-- end:breadcrumbs -->

                    <!-- begin:content -->
                    @yield('content')
                    <!-- end:content -->
                </div>
            </main>
            <!-- begin:footer -->
            @include('layouts._dashboard.footer')
            <!-- end:footer -->
        </div>
    </div>
    <!-- scripts -->
    <!-- jquery -->
    <script src="{{ asset('vendor/jquery/jquery-3.6.0.min.js') }}"></script>
    <!-- bootstrap bundle -->
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- my-dashboard -->
    <script src="{{ asset('vendor/my-dashboard/js/dashboard.js') }}"></script>


    <script src="https://unpkg.com/sweetalert2@11/dist/sweetalert2.all.js"></script>
    <script>
        $('.formulario-eliminar').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: "¿Estás seguro?",
                text: "Esta acción no se puede deshacer.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Sí, eliminar",
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    // Acción al confirmar
                    this.submit();
                }
            });
        });
    </script>


    @include('sweetalert::alert')
    {{-- javascript:external --}}
    @stack('javascript-external')
    @stack('javascript-internal')

</body>

</html>
