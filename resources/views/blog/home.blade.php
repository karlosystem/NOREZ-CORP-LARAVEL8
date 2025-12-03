@extends('layouts.blog')

@section('title')
    Publicidad Grafica Exterior en Lima
@endsection

@section('content')
    @include('blog.inc.slider')

    @include('blog.inc.features')

    @include('blog.inc.service')

    @include('blog.inc.servicios')

    @include('blog.inc.testimonios')

    @include('blog.inc.area')

    @include('blog.inc.news')

    @include('blog.inc.quote')

    @include('blog.inc.quotearea')

    @include('blog.inc.call')

    @include('blog.inc.clientes')

@endsection
