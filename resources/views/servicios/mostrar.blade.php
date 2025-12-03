@extends('layouts.blog')

@section('title')
    Servicios
@endsection

@section('content')
    <div class="banner-area" id="banner-area"
        style="background-image:url({{ asset('vendor/my-blog/images/contactenos/banner.png') }});">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="banner-heading">
                        <h1 class="banner-title">Servicios</h1>
                        <ol class="breadcrumb">
                            <li>Inicio</li>
                            <li><a href="#">Servicios</a></li>
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

    <section class="main-container no-padding" id="main-container">
        <div class="ts-services " id="ts-services">
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-12">
                        <h2 class="section-title"><span>Es importante destacar que siempre cumplimos en tiempo y forma todos los pedidos de nuestros clientes.</span>
                            Nuestros Servicios</h2>
                    </div>
                </div>
                <!-- Title row end-->
                <div class="row">
                    @forelse ($servicios_listado as $servicio)
                        <div class="col-lg-4 col-md-12 mb-4">
                            <div class="ts-service-box">
                                <div class="ts-service-image-wrapper">
                                    <img class="img-fluid" src="{{ asset($servicio->thumbnail) }}">
                                </div>
                                <div class="ts-service-content">
                                    <h3 class="service-title">{{ $servicio->title }}</h3>
                                    {{ \Illuminate\Support\Str::limit(html_entity_decode(strip_tags($servicio->description)), 100) }}
                                    <p><a class="link-more" href="{{ route('blog.articulos.categorias', ['slug' => $servicio->slug]) }}">Más Información<i
                                                class="icon icon-right-arrow2"></i></a></p>
                                </div>
                            </div>

                        </div>
                    @empty
                    @endforelse
                </div>
                <!-- Content 1 row end-->
                <div class="gap-60"></div>

                <!-- Content Row 2 end-->
            </div>
            <!-- Container end-->
        </div>
    </section>
@endsection
