    <div class="carousel slide" id="main-slide" data-ride="carousel">
        <!-- Indicators-->
        <ol class="carousel-indicators visible-lg visible-md">
            <li class="active" data-target="#main-slide" data-slide-to="0"></li>
            <li data-target="#main-slide" data-slide-to="1"></li>
            <li data-target="#main-slide" data-slide-to="2"></li>
        </ol>
                   
        <div class="carousel-inner">
            @forelse ($sliders as $slider)    
            <div class="carousel-item {{ $loop->first ? 'active' : '' }}"
                style="background-image:url({{ asset($slider->cover_image) }});">
                <div class="container">
                    <div class="slider-content text-left">
                        <div class="col-md-12">
                            <h2 class="slide-title title-light">{{ $slider->descripcion }}</h2>
                            <h3 class="slide-sub-title">{{ $slider->name }}</h3>
                            <p class="slider-description lead">{{ $slider->leyenda }}</p>
                            <p><a class="slider btn btn-primary" target="_self" href="{{ $slider->link }}">Más Información</a><a
                                    class="slider btn btn-border" href="{{ route('servicios.mostrar') }}">Ver Servicios</a></p>
                        </div>
                    </div>                    
                </div>
            </div>   
            @empty
            @endforelse         
        </div>
            
        <!-- Controllers-->
        <a class="left carousel-control carousel-control-prev" href="#main-slide"
            data-slide="prev"><span><i class="fa fa-angle-left"></i></span></a>
        <a class="right carousel-control carousel-control-next" href="#main-slide" data-slide="next"><span><i
                    class="fa fa-angle-right"></i></span></a>
    </div>