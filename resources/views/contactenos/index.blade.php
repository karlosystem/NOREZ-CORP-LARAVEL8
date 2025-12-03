@extends('layouts.blog')

@section('title')
    Contáctenos
@endsection

@section('content')
    <div class="banner-area" id="banner-area"
        style="background-image:url({{ asset('vendor/my-blog/images/contactenos/banner.png') }});">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="banner-heading">
                        <h1 class="banner-title">Contáctenos</h1>
                        <ol class="breadcrumb">
                            <li>Inicio</li>
                            <li><a href="#">Contáctenos</a></li>
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

    <section class="main-container contact-area" id="main-container">       
    
        <div class="ts-form form-boxed" id="ts-form">
            <div class="container">
                <div class="row">
                    <div class="contact-wrapper full-contact">
                        <div class="col-lg-6">
                            <h3 class="column-title">Haz visible tu marca</h3>
                            <p class="contact-content">Llevamos tu marca a lo más alto, la hacemos brillar y conseguimos nuevos clientes. Contacta con nosotros y pide información personalizada, sin compromiso.</p>
                            <div class="contact-info-box contact-box info-box ">
                                <div class="contact-info">
                                    <div class="ts-contact-info"><span class="ts-contact-icon float-left"><i
                                                class="icon icon-map-marker2"></i></span>
                                        <div class="ts-contact-content">
                                            <h3 class="ts-contact-title">Dirección</h3>
                                            <p>Jirón Yavari 368 Breña, Urb. Chacra Colorada, Lima - Perú</p>
                                        </div>
                                        <!-- Contact content end-->
                                    </div>
                                    <div class="ts-contact-info"><span class="ts-contact-icon float-left"><i
                                                class="icon icon-phone3"></i></span>
                                        <div class="ts-contact-content">
                                            <h3 class="ts-contact-title">LLámenos</h3>
                                            <p>+51 981 296 614 (tambien whastapp)</p>
                                        </div>
                                        <!-- Contact content end-->
                                    </div>
                                    <div class="ts-contact-info last"><span class="ts-contact-icon float-left"><i
                                                class="icon icon-envelope"></i></span>
                                        <div class="ts-contact-content">
                                            <h3 class="ts-contact-title">Correo electrónico</h3>
                                            <p>informes@norez-corp.com</p>
                                        </div>
                                        <!-- Contact content end-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Contact info end -->
                        <div class="col-lg-6">
                            <h3 class="column-title">Formulario</h3>
                            <div class="contact-submit-box contact-box form-box">
                                <form action="{{ route('contacto.sendEmail') }}" method="POST">
                                    @csrf
                                    <div class="error-container"></div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <input class="form-control form-name" id="name" name="name"
                                                    placeholder="Nombre Completo" type="text" value="{{ old('name') }}">
                                                    @error('name')
                                                        <span class="text-danger ml-1">{{ $message }}</span>
                                                    @enderror
                                            </div>
                                        </div>
                                        <!-- Col end-->
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <input class="form-control form-website" id="celular" name="celular"
                                                    placeholder="Número de Celular" type="text" value="{{ old('celular') }}">
                                                    @error('celular')
                                                        <span class="text-danger ml-1">{{ $message }}</span>
                                                    @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <input class="form-control form-email" id="email" name="email"
                                                    placeholder="Email" type="text" value="{{ old('email') }}">
                                                    @error('email')
                                                        <span class="text-danger ml-1">{{ $message }}</span>
                                                    @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <textarea class="form-control form-message required-field" id="message" name="message" placeholder="Comentario" rows="8">{{ old('message') }}</textarea>
                                                @error('message')
                                                        <span class="text-danger ml-1">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- Col 12 end-->
                                    </div>
                                    <!-- Form row end-->
                                    <button class="btn btn-primary tw-mt-30" type="submit"><i
                                            class="fa fa-paper-plane-o"></i> Enviar Mensaje</button>
                                </form>
                                <!-- Form end-->
                            </div>
                        </div>
                        <!-- Contact form end -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
