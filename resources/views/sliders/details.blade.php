@extends('layouts.dashboard')

@section('title')
    Detalles
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('detail_sliders', $slider) }}
@endsection

@section('content')
    <!-- content -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if (file_exists(public_path($slider->cover_image)))
                        <!-- thumbnail:true -->
                        <div class="post-tumbnail" style="background-image: url('{{ $slider->cover_image }}');">
                        </div>
                        <!-- thumbnail:false -->
                    @else
                        <svg class="img-fluid" width="100%" height="400" xmlns="http://www.w3.org/2000/svg"
                            preserveAspectRatio="xMidYMid slice" focusable="false" role="img">
                            <rect width="100%" height="100%" fill="#868e96"></rect>
                            <text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle"
                                fill="#dee2e6" dy=".3em" font-size="24">
                                {{ $evento->name }}
                            </text>
                        </svg>
                    @endif
                    <!-- title -->
                    <h2 class="my-1">
                        {{ $slider->name }}
                    </h2>
                    <!-- description -->
                    <p class="text-justify">
                        {{ $slider->description }}
                    </p>
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('sliders.index') }}" class="btn btn-primary mx-1" role="button">
                            Back
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
