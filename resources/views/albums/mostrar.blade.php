@extends('layouts.blog')

@section('title')
    Galeria de Imagenes
@endsection

@section('content')
    <div class="banner-area" id="banner-area"
        style="background-image:url({{ asset('vendor/my-blog/images/contactenos/banner.png') }});">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="banner-heading">
                        <h1 class="banner-title">Galeria de Imagenes</h1>
                        <ol class="breadcrumb">
                            <li>Inicio</li>
                            <li><a href="#">Galeria de Imagenes</a></li>
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

    <section id="main-container" class="main-container">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-12">
                    <h2 class="section-title"><span>Algunos de nuestros trabajos</span>Galeria de Fotos</h2>
                </div>
            </div>

            @forelse ($fotos as $foto)
                {{-- Abrir row cada 4 elementos --}}
                @if ($loop->index % 4 == 0)
                    <div class="row">
                @endif

                <div class="col-lg-3 col-md-6">
                    <div class="gallery-img">
                        <a class="gallery-popup" title="{{ $foto->description }}"
                            href="{{ $foto->cover_image }}">
                            <img class="img-fluid" src="{{ $foto->cover_image }}">
                            <span class="gallery-icon"><i class="fa fa-search"></i></span>
                        </a>
                        <p class="text-center"><strong>{{ $foto->name }}</strong></p>
                    </div>
                </div>

                {{-- Cerrar row cada 4 elementos --}}
                @if (($loop->index + 1) % 4 == 0)
        </div>
        <div class="gap-30"></div>
        @endif

        {{-- Si termina el loop y quedaron elementos sin cerrar --}}
    @empty
        @endforelse

        {{-- Cerrar row final si quedó abierta --}}
        @if (!$fotos->isEmpty() && $fotos->count() % 4 != 0)
            </div>
            <div class="gap-30"></div>
        @endif


        </div>

        <div class="mt-4 d-flex justify-content-center">
            {{ $fotos->links('pagination::bootstrap-4') }}
        </div>

    </section>
@endsection
