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
    <!-- Banner area end-->

    <section class="projects" id="projects">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-12">
                    <h2 class="section-title"><span>Contamos con toda la maquinaria necesaria, podemos ofrecerte precios directo de fábrica, sin intermediarios</span>
                        Nuestros Proyectos</h2>
                </div>
            </div>
            <div class="row ">
                <div class="col-lg-4 ">
                    <div class="latest-post post-large project-post-large">
                        <div class="latest-post-media project-post-media">
                            <a class="latest-post-img" href="#">
                                <img class="img-fluid" src="{{ asset('vendor/my-blog/images/projects/project1.jpg') }}" alt="#">
                            </a>

                            <div class="post-body project-body project-post-body">
                                <a class="post-cat" href="#">Vegetable goods transportation</a>
                                <a class="btn btn-primary" href="#">Más Información</a>
                            </div>
                            <!-- Post body end-->
                        </div>
                        <!-- Post media end-->
                    </div>
                    <!-- Latest post end-->
                </div>
                <!-- Col 1 end-->
                <div class="col-lg-4 ">
                    <div class="latest-post post-large project-post-large">
                        <div class="latest-post-media project-post-media">
                            <a class="latest-post-img" href="#">
                                <img class="img-fluid" src="{{ asset('vendor/my-blog/images/projects/project2.jpg') }}" alt="#">
                            </a>

                            <div class="post-body project-body project-post-body">
                                <a class="post-cat" href="#">Drill Pipe Transportation</a>
                                <a class="btn btn-primary" href="#">Más Información</a>
                            </div>
                            <!-- Post body end-->
                        </div>
                        <!-- Post media end-->
                    </div>
                    <!-- Latest post end-->
                </div>
                <!-- Col 2 end-->
                <div class="col-lg-4 ">
                    <div class="latest-post post-large project-post-large">
                        <div class="latest-post-media project-post-media">
                            <a class="latest-post-img" href="#">
                                <img class="img-fluid" src="{{ asset('vendor/my-blog/images/projects/project3.jpg') }}" alt="#">
                            </a>

                            <div class="post-body project-body project-post-body">
                                <a class="post-cat" href="#">Packing and Crating Delivery</a>
                                <a class="btn btn-primary" href="#">Más Información</a>
                            </div>
                            <!-- Post body end-->
                        </div>
                        <!-- Post media end-->
                    </div>
                    <!-- Latest post end-->
                </div>
                <!-- Col 3 end-->
            </div>
            <!-- row 1 end-->
            <div class="gap-30"></div>
            <div class="row ">
                <div class="col-lg-4 ">
                    <div class="latest-post post-large project-post-large">
                        <div class="latest-post-media project-post-media">
                            <a class="latest-post-img" href="#">
                                <img class="img-fluid" src="{{ asset('vendor/my-blog/images/projects/project4.jpg') }}" alt="#">
                            </a>

                            <div class="post-body project-body project-post-body">
                                <a class="post-cat" href="#">Storing German elevator manufacturer’s</a>
                                <a class="btn btn-primary" href="#">Más Información</a>
                            </div>
                            <!-- Post body end-->
                        </div>
                        <!-- Post media end-->
                    </div>
                    <!-- Latest post end-->
                </div>
                <!-- Col 1 end-->
                <div class="col-lg-4 ">
                    <div class="latest-post post-large project-post-large">
                        <div class="latest-post-media project-post-media">
                            <a class="latest-post-img" href="#">
                                <img class="img-fluid" src="{{ asset('vendor/my-blog/images/projects/project5.jpg') }}" alt="#">
                            </a>

                            <div class="post-body project-body project-post-body">
                                <a class="post-cat" href="#">The Red Line Container Project</a>
                                <a class="btn btn-primary" href="#">Más Información</a>
                            </div>
                            <!-- Post body end-->
                        </div>
                        <!-- Post media end-->
                    </div>
                    <!-- Latest post end-->
                </div>
                <!-- Col 2 end-->
                <div class="col-lg-4 ">
                    <div class="latest-post post-large project-post-large">
                        <div class="latest-post-media project-post-media">
                            <a class="latest-post-img" href="#">
                                <img class="img-fluid" src="{{ asset('vendor/my-blog/images/projects/project6.jpg') }}" alt="#">
                            </a>

                            <div class="post-body project-body project-post-body">
                                <a class="post-cat" href="#">CEA Ao-Udom Ground Facility</a>
                                <a class="btn btn-primary" href="#">Más Información</a>
                            </div>
                            <!-- Post body end-->
                        </div>
                        <!-- Post media end-->
                    </div>
                    <!-- Latest post end-->
                </div>
                <!-- Col 3 end-->
            </div>
            <!-- row 2 end-->
        </div>
        <!-- Container end-->
    </section>
    <!-- Projects end-->
@endsection
