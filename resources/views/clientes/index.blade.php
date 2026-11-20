@extends('layouts.blog')

@section('title')
    Clientes
@endsection

@section('content')
    <div class="banner-area" id="banner-area"
        style="background-image:url({{ asset('vendor/my-blog/images/contactenos/banner.png') }});">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="banner-heading">
                        <h1 class="banner-title">Clientes</h1>
                        <ol class="breadcrumb">
                            <li>Inicio</li>
                            <li><a href="#">Clientes</a></li>
                        </ol>
                    </div>
                </div>
                <!-- Col end-->
            </div>
            <!-- Row end-->
        </div>
        <!-- Container end-->
    </div>
    <!-- Banner area end-->

    <section class="projects" id="projects">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-12">
                    <h2 class="section-title">
                        <span>Empresas que han confiado en nuestra excelencia y dedicación</span>
                        Nuestros Aliados Destacados
                    </h2>
                </div>
            </div>

            <div class="row">

                @forelse ($clientes as $cliente)
                <div class="col-lg-3 col-md-6 mb-2">
                    <div class="gallery-img">
                        <a class="gallery-popup" href="{{ asset($cliente->cover_image) }}">
                            <img class="img-fluid" src="{{ asset($cliente->cover_image) }}">
                            <span class="gallery-icon"><i class="fa fa-search"></i></span>
                        </a>
                    </div>
                </div><!--  item 1 end -->
                @empty
                @endforelse

            </div><!--/ Content row 1 end -->

            <!-- row 2 end-->
        </div>
        <!-- Container end-->
    </section>
@endsection
