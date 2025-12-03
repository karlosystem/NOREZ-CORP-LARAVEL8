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
@endsection
