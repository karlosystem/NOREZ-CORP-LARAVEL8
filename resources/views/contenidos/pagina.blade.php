@extends('layouts.blog')

@section('title', $pagina->metatitle)
@section('description', $pagina->metadescription)

@section('content')
    <div class="banner-area" id="banner-area"
        style="background-image:url({{ asset('vendor/my-blog/images/contactenos/banner.png') }});">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="banner-heading">
                        <h1 class="banner-title">{{ $pagina->title }}</h1>
                        <ol class="breadcrumb">
                            <li>Inicio</li>
                            <li><a href="#">{{ $pagina->title }}</a></li>
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

         <div class="about-pattern">
            <div class="container">
               <div class="row">
                  <div class="col-lg-6 about-desc">
                     <h2 class="column-title">
                        <span>{!! $pagina->title !!}</span>
                        {!! $pagina->description !!}</h2>
                     <p class="bold-text">
                       {!! $pagina->content !!}
                    </p>
                 
                     <a href="{{ route('servicios.mostrar') }}" class="top-right-btn btn btn-primary">Servicios</a>
                     <a href="{{ route('contacto.index') }}" class="top-right-btn btn btn-secondary">Contáctenos</a>
                  </div>
                  <!-- Col end-->
                  <div class="col-lg-6 text-md-center mrt-40">
                     <img class="img-fluid" src="{{ $pagina->thumbnail }}">
                  </div>
                  <!-- Col end-->
               </div>
               <!-- Main row end-->
            </div>
            <!-- Container 1 end-->
         </div>
         <!-- About pattern End-->
      </section>


@endsection