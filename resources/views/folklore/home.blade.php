@extends('layouts.folklore')

@section('title')
    carlos
@endsection

@section('content')
    @include('layouts._folklore._slider')

    @include('layouts._folklore._articles')

    @include('layouts._folklore._videos')

    @include('layouts._folklore._featured')

    @include('layouts._folklore._newsletter')

    @include('layouts._folklore._instagram')
@endsection
