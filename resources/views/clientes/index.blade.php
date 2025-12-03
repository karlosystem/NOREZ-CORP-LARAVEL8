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
                    <h2 class="section-title"><span>Empresas que han confiado en nuestra excelencia y dedicación</span>
                        Nuestros Aliados Destacados</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-6 mb-2">
                    <div class="gallery-img">
                        <a class="gallery-popup" href="{{ asset('vendor/my-blog/images/clients/client1.png') }}">
                            <img class="img-fluid" src="{{ asset('vendor/my-blog/images/clients/client1.png') }}" alt="">
                            <span class="gallery-icon"><i class="fa fa-search"></i></span>
                        </a>
                    </div>
                </div><!--  item 1 end -->

                <div class="col-lg-3 col-md-6 mb-2">
                    <div class="gallery-img">
                        <a class="gallery-popup" href="{{ asset('vendor/my-blog/images/clients/client2.png') }}">
                            <img class="img-fluid" src="{{ asset('vendor/my-blog/images/clients/client2.png') }}" alt="">
                            <span class="gallery-icon"><i class="fa fa-search"></i></span>
                        </a>
                    </div>
                </div><!--  item 2 end -->

                <div class="col-lg-3 col-md-6 mb-2">
                    <div class="gallery-img">
                        <a class="gallery-popup" href="{{ asset('vendor/my-blog/images/clients/client3.png') }}">
                            <img class="img-fluid" src="{{ asset('vendor/my-blog/images/clients/client3.png') }}" alt="">
                            <span class="gallery-icon"><i class="fa fa-search"></i></span>
                        </a>
                    </div>
                </div><!--  item 3 end -->

                <div class="col-lg-3 col-md-6 mb-2">
                    <div class="gallery-img">
                        <a class="gallery-popup" href="{{ asset('vendor/my-blog/images/clients/client4.png') }}">
                            <img class="img-fluid" src="{{ asset('vendor/my-blog/images/clients/client4.png') }}" alt="">
                            <span class="gallery-icon"><i class="fa fa-search"></i></span>
                        </a>
                    </div>
                </div><!--  item 4 end -->

                 <div class="col-lg-3 col-md-6 mb-2">
                    <div class="gallery-img">
                        <a class="gallery-popup" href="{{ asset('vendor/my-blog/images/clients/client5.png') }}">
                            <img class="img-fluid" src="{{ asset('vendor/my-blog/images/clients/client5.png') }}" alt="">
                            <span class="gallery-icon"><i class="fa fa-search"></i></span>
                        </a>
                    </div>
                </div><!--  item 4 end -->

                 <div class="col-lg-3 col-md-6 mb-2">
                    <div class="gallery-img">
                        <a class="gallery-popup" href="{{ asset('vendor/my-blog/images/clients/client6.png') }}">
                            <img class="img-fluid" src="{{ asset('vendor/my-blog/images/clients/client6.png') }}" alt="">
                            <span class="gallery-icon"><i class="fa fa-search"></i></span>
                        </a>
                    </div>
                </div><!--  item 4 end -->

            </div><!--/ Content row 1 end -->

            <!-- row 2 end-->
        </div>
        <!-- Container end-->
    </section>
@endsection
