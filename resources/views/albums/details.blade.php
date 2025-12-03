@extends('layouts.dashboard')

@section('title')
    Vista Previa
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('detail_album', $album) }}
@endsection

@section('content')
    <!-- content -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if (file_exists(public_path($album->cover_image)))
                        <!-- thumbnail:true -->
                        <div class="post-tumbnail" style="background-image: url('{{ $album->cover_image }}');">
                            <img src="{{ $album->cover_image }}">
                        </div>
                        <!-- thumbnail:false -->
                    @else
                        <svg class="img-fluid" width="100%" height="400" xmlns="http://www.w3.org/2000/svg"
                            preserveAspectRatio="xMidYMid slice" focusable="false" role="img">
                            <rect width="100%" height="100%" fill="#868e96"></rect>
                            <text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle"
                                fill="#dee2e6" dy=".3em" font-size="24">
                                {{ $album->name }}
                            </text>
                        </svg>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
