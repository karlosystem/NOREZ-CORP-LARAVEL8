@extends('layouts.blog')

@section('title')
    {{ $proyecto->name }}
@endsection

@section('content')
    <div class="banner-area" id="banner-area"
        style="background-image:url({{ asset('vendor/my-blog/images/contactenos/banner.png') }});">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="banner-heading">
                        <h1 class="banner-title">{{ $proyecto->name }}</h1>
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
    <section class="main-container" id="main-container">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <h4 class="list-column-title">Otros Proyectos</h4>
                    <div class="sidebar ">
                        <div class="widget no-padding no-border">
                            <ul class="list-group list-group-flush shadow-sm">
                                @forelse($proyectosRelacionados as $relacionado)
                                     <li class="list-group-item">
                                        <i class="fa fa-folder-open mr-2 text-primary"></i>
                                        <a href="{{ route('blog.proyecto.details', $relacionado->slug) }}">
                                            {{ $relacionado->name }}
                                        </a>
                                    </li>
                                @empty
                                    <li>No hay proyectos relacionados</li>
                                @endforelse
                            </ul>
                        </div>
                        <div class="widget no-padding testimonial-static">
                            <div class="quote-item quote-classic"><span class="quote-text faq-quote-text">
                                    Desde el 2005, fabricamos anuncios luminosos y publicidad exterior/interior que atrae
                                    clientes y hace crecer tu marca.</span>
                                <div class="quote-item-footer quote-footer-classic">
                                   <img class="testimonial-thumb"
                                        src="{{ asset('vendor/my-blog/images/clients/edgard-merino.png') }}"
                                        alt="testimonial">
                                    <div class="quote-item-info">
                                        <p class="quote-author">Edgard Merino</p>
                                        <span class="quote-subtext">Gerente General</span>
                                    </div>
                                </div>
                            </div>
                            <!-- Quote item end-->
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="single-service-img">
                        <img class="img-fluid d-block mx-auto" src="{{ asset($proyecto->cover_image) }}">
                    </div>
                    <div class="service-content">
                        <h2>{{ $proyecto->title }}</h2>

                        <div class="text-block mrb-40">
                            {{ $proyecto->description }}

                            <p>Serenity Wonderful has taken possession of my entire soul, like these sweet mornings of
                                spring which I enjoy with my whole heart.</p>
                        </div>
                        <h3 class="column-title">Beneficios de contrarar con Norez Corp</h3>

                        <div class="service-content">
                            <div class="service-blocknumber">
                                <div class="pull-left">
                                    <span class="block-number">01</span>
                                </div>
                            </div>
                            <div class="service-content-area">
                                <h3>Imagen positiva de tu marca</h3>
                                <p class="service-text">Proyecta profesionalismo y confianza. Tu negocio “se ve bien” y se
                                    siente bien.</p>
                            </div>
                        </div>
                        <div class="service-content">
                            <div class="service-blocknumber">
                                <div class="pull-left">
                                    <span class="block-number">02</span>
                                </div>
                            </div>
                            <div class="service-content-area">
                                <h3>Atrae miradas al instante</h3>
                                <p class="service-text">La gente va con prisa. Un buen anuncio te pone en su radar en
                                    segundos.</p>
                            </div>
                        </div>
                        <div class="service-content">
                            <div class="service-blocknumber">
                                <div class="pull-left">
                                    <span class="block-number">03</span>
                                </div>
                            </div>
                            <div class="service-content-area">
                                <h3>Tu negocio se identifica fácil</h3>
                                <p class="service-text">Haz que te encuentren sin dar vueltas. Señalización clara es igual a
                                    más visitas.</p>
                            </div>
                        </div>
                    </div>
                    <div id="call-to-action" class="call-to-action-bg service-call-to-action ">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8 align-self-center">
                                    <h3 class="call-to-action-title service-call-to-action">
                                        Soluciones de Publicidad en el Perú
                                    </h3>
                                    <p>
                                        Nos encantaría saber de ti, cuéntanos un poco sobre tu proyecto
                                    </p>
                                </div>
                                <div class="col-lg-4 text-right">
                                    <a class="btn btn-box" href="{{ route('contacto.index') }}">Contáctenos</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
