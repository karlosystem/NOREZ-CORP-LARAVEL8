@extends('layouts.blog')
@section('title',  $servicio->metatitle )
@section('description', $servicio->metadescription )

@section('content')
    <div class="banner-area" id="banner-area"
        style="background-image:url({{ asset('vendor/my-blog/images/contactenos/banner.png') }});">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="banner-heading">
                        <h1 class="banner-title">{{ $servicio->title }}</h1>
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


    <section class="main-container" id="main-container">
        <div class="container">

            <div class="row text-center">
                <div class="col-md-12">
                    <h2 class="section-title">
                        <span>{{ \Illuminate\Support\Str::limit(html_entity_decode(strip_tags($servicio->description)), 200) }}</span>
                        Tenemos diferentes servicios 2025
                    </h2>
                </div>
            </div>

            @foreach ($articulos->chunk(3) as $grupo)
                <div class="row">
                    @foreach ($grupo as $articulo)
                        <div class="col-lg-4 col-md-12">
                            <div class="ts-service-box">
                                <div class="ts-service-image-wrapper">
                                        <img class="img-fluid" src="{{ asset($articulo->thumbnail) }}">
                                </div>

                                <div class="ts-service-content">
                                    <h3 class="service-title">{{ $articulo->title }}</h3>
                                    <p>{{ \Illuminate\Support\Str::limit(html_entity_decode(strip_tags($articulo->resumen)), 90) }}
                                    </p>

                                    <p>
                                        <a class="link-more" href="{{ route('blog.articulos.details', ['slug' => $articulo->slug]) }}">
                                            Más Información <i class="icon icon-right-arrow2"></i>
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>                   
                    @endforeach
                </div>
                <div class="gap-60"></div>
            @endforeach
        </div>

        <div class="mt-4 d-flex justify-content-center">
            
        </div>

    </section>
@endsection
