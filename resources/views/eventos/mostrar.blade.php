@extends('layouts.blog')

@section('title')
    Proyectos
@endsection

@section('content')
    <div class="banner-area" id="banner-area"
        style="background-image:url({{ asset('vendor/my-blog/images/contactenos/banner.png') }});">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="banner-heading">
                        <h1 class="banner-title">Proyectos</h1>
                        <ol class="breadcrumb">
                            <li>Inicio</li>
                            <li><a href="#">Proyectos</a></li>
                        </ol>
                    </div>
                </div>
                <!-- Col end-->
            </div>
            <!-- Row end-->
        </div>
        <!-- Container end-->
    </div>

    <section class="projects" id="projects">
        <div class="container">

            <div class="row text-center">
                <div class="col-md-12">
                    <h2 class="section-title"><span>Contamos con toda la maquinaria necesaria, podemos ofrecerte precios
                            directo de fábrica, sin intermediarios</span>
                        Nuestros Proyectos</h2>
                </div>
            </div>

            @forelse ($proyectos as $proyecto)
                {{-- Abrir row cada 4 elementos --}}
                @if ($loop->index % 3 == 0)
                    <div class="row">
                @endif

                <div class="col-lg-4 ">
                    <div class="latest-post post-large project-post-large">
                        <div class="latest-post-media project-post-media">
                            <a class="latest-post-img" href="{{ $proyecto->slug }}">
                                <img class="img-fluid" src="{{ asset($proyecto->cover_image) }}">
                            </a>
                            <div class="post-body project-body project-post-body">
                                <a class="post-cat" href="{{ route('blog.proyecto.details', ['slug'=>$proyecto->slug]) }}">{{ $proyecto->name }}</a>
                                <a class="btn btn-primary" href="{{ route('blog.proyecto.details', ['slug'=>$proyecto->slug]) }}">Más Información</a>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Cerrar row cada 4 elementos --}}
                @if (($loop->index + 1) % 3 == 0)
        </div>
        <div class="gap-30"></div>
        @endif
        {{-- Si termina el loop y quedaron elementos sin cerrar --}}
        @empty
        @endforelse

        {{-- Cerrar row final si quedó abierta --}}
        @if (!$proyectos->isEmpty() && $proyectos->count() % 3 != 0)
            </div>
            <div class="gap-30"></div>
        @endif

        </div>

        <div class="mt-4 d-flex justify-content-center">
            {{ $proyectos->links('pagination::bootstrap-4') }}
        </div>

    </section>
@endsection
