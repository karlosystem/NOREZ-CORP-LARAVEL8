@extends('layouts.blog')
@section('title',  $articulo->metatitle )
@section('description', $articulo->metadescription )

@section('content')
    <div class="banner-area" id="banner-area"
        style="background-image:url({{ asset('vendor/my-blog/images/contactenos/banner.png') }});">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="banner-heading">
                        <h1 class="banner-title">{{ $articulo->title }}</h1>
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

    <section class="main-container" id="main-container">

        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <h4 class="list-column-title">Otros</h4>
                    <div class="sidebar ">
                        <div class="widget no-padding no-border">
                            <ul class="service-menu">
                                <li><a href="#">xxx</a></li>
                                <li><a href="#">Ocean Freight</a></li>
                                <li><a href="#">Cargo Express</a></li>
                                <li><a href="#">Warehousing</a></li>
                                <li><a href="#">Contract Logistics</a></li>
                                <li><a href="#">Ground Transport</a></li>
                            </ul>
                        </div>
                        <div class="widget no-padding testimonial-static">
                            <div class="quote-item quote-classic"><span class="quote-text faq-quote-text">The Forexnic loan
                                    has been the most attractive loan products on the market, helping numerous</span>
                                <div class="quote-item-footer quote-footer-classic">
                                    <img class="testimonial-thumb" src="{{ asset('vendor/my-blog/images/clients/testimonial1.png') }}" alt="testimonial">
                                    <div class="quote-item-info">
                                        <p class="quote-author">Jhon Cameron</p><span class="quote-subtext">Manager
                                            Walton</span>
                                    </div>
                                </div>
                            </div>
                            <!-- Quote item end-->
                        </div>
                    </div>
                </div>
                <!-- Col end -->
                <div class="col-lg-8">
                    <div class="single-service-img">
                        <img class="img-fluid d-block mx-auto" src="{{ asset($articulo->thumbnail) }}">
                    </div>
                    <div class="service-content">
                        <h2>{{ $articulo->title }}</h2>

                        <div class="text-block mrb-40">
                            {{ $articulo->resumen }}

                            <p>Serenity Wonderful has taken possession of my entire soul, like these sweet mornings of
                                spring which I enjoy with my whole heart.</p>
                        </div>
                        <h3 class="column-title">Delivery on your doorstep</h3>

                        <div class="service-content">
                            <div class="service-blocknumber">
                                <div class="pull-left">
                                    <span class="block-number">01</span>
                                </div>
                            </div>
                            <div class="service-content-area">
                                <h3>On-board courier</h3>
                                <p class="service-text">Serenity Wonderful has taken possession of my entire soul, like
                                    these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel
                                    the charm of existence in this spot.</p>
                            </div>
                        </div>
                        <div class="service-content">
                            <div class="service-blocknumber">
                                <div class="pull-left">
                                    <span class="block-number">02</span>
                                </div>
                            </div>
                            <div class="service-content-area">
                                <h3>Full loads shipments</h3>
                                <p class="service-text">Serenity Wonderful has taken possession of my entire soul, like
                                    these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel
                                    the charm of existence in this spot.</p>
                            </div>
                        </div>
                        <div class="service-content">
                            <div class="service-blocknumber">
                                <div class="pull-left">
                                    <span class="block-number">03</span>
                                </div>
                            </div>
                            <div class="service-content-area">
                                <h3>Domestic air services</h3>
                                <p class="service-text">Serenity Wonderful has taken possession of my entire soul, like
                                    these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel
                                    the charm of existence in this spot.</p>
                            </div>
                        </div>
                    </div>
                    <div id="call-to-action" class="call-to-action-bg service-call-to-action ">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8 align-self-center">
                                    <h3 class="call-to-action-title service-call-to-action">Delivery & return solutions
                                        worldwide</h3>
                                    <p>
                                        We would love to hear from you, tell us little bit about your project
                                    </p>
                                </div>
                                <div class="col-lg-4 text-right">
                                    <a class="btn btn-box" href="">Call Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
