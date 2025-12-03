@extends('layouts.blog')

@section('title', 'Avisos - Paneles - Letreros Luminosos Publicitarios - Modulos Desarmables')
@section('description', 'Fabricantes de Modulos Publicitarios desarmables, Letreros Luminosos, paneles publicitarios de Gran Tamaño, Letras y letreros en MDF, acrílico, acero inoxidable, aluminio, cajas luminosas, Letreros con luces led')

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
