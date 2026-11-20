@extends('layouts.blog')

@section('title', 'Formas de Pago | Norez Corp S.A.C.')

@section('content')
    <div class="banner-area" id="banner-area"
        style="background-image:url({{ asset('vendor/my-blog/images/contactenos/banner.png') }});">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="banner-heading">
                        <h1 class="banner-title">Formas de Pago</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">Inicio</li>
                                <li class="breadcrumb-item active" aria-current="page">Formas de Pago</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="main-container contact-area" id="main-container">
        <div class="ts-form form-boxed" id="ts-form">
            <div class="container">
                <div class="row">
                    <div class="contact-wrapper full-contact w-100">
                        <div class="col-lg-12 mb-4">
                            <h2 class="column-title">Disponemos de Varias Formas de Pago</h2>
                            <p class="text-muted">Realice sus transferencias o depósitos utilizando nuestros datos bancarios oficiales:</p>
                        </div>

                        <div class="row w-100 mx-0">
                            <div class="col-md-6 mb-4">
                                <div class="card h-100 shadow-sm" style="border-radius: 15px; border: 1px solid #e0e0e0;">
                                    <div class="card-body p-4">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h3 class="badge badge-pill px-3 py-2 text-white mb-0"
                                                style="background-color: #004481; font-size: 0.9rem;">BBVA | Banco Continental</h3>
                                            <small class="text-uppercase font-weight-bold text-muted">Cuenta de Ahorros</small>
                                        </div>
                                        <h5 class="card-title mb-1 text-dark">NOREZ CORP S.A.C.</h5>
                                        <p class="small text-muted mb-4">Moneda: Soles</p>

                                        <div class="bg-light p-3 rounded text-center mb-2">
                                            <label class="small d-block text-secondary mb-1">NÚMERO DE CUENTA</label>
                                            <span class="h5 font-weight-bold text-dark">0011-0164-0200818809</span>
                                        </div>

                                        <div class="p-2 border rounded text-center"
                                            style="border-style: dashed !important; border-color: #dee2e6 !important;">
                                            <label class="small d-block text-secondary mb-0">CCI (Interbancario)</label>
                                            <span class="small font-weight-bold">011-164-000200818809-12</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-4">
                                <div class="card h-100 shadow-sm" style="border-radius: 15px; border: 1px solid #e0e0e0;">
                                    <div class="card-body p-4">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h3 class="badge badge-pill badge-danger px-3 py-2 mb-0" style="font-size: 0.9rem;">Banco de la Nación</h3>
                                            <small class="text-uppercase font-weight-bold text-muted">Cuenta Detracción</small>
                                        </div>
                                        <h5 class="card-title mb-0 text-dark">NOREZ CORP S.A.C.</h5>
                                        <p class="small text-muted mb-3 font-italic">Consuelo Maritza Álvarez Vera</p>

                                        <div class="bg-light p-3 rounded mb-2 text-center">
                                            <label class="small d-block text-secondary mb-1">CUENTA CORRIENTE</label>
                                            <span class="h6 font-weight-bold text-dark">00-002-233320</span>
                                        </div>

                                        <div class="p-2 border rounded text-center"
                                            style="border-style: dashed !important; border-color: #dee2e6 !important;">
                                            <label class="small d-block text-secondary mb-0">CCI (Interbancario)</label>
                                            <span class="small font-weight-bold">01800200000223332067</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection