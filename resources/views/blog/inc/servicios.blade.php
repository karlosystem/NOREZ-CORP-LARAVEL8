    <section class="ts-services solid-bg" id="ts-services">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-12">
                    <h2 class="section-title"><span>Ya sea una feria comercial, un concierto, una carrera o cualquier otro
                            evento, podemos ayudarte a crear una presencia destacada en el lugar del evento y atraer la
                            atención de los visitantes.</span>Nuestros Servicios</h2>
                </div>
            </div>
            <!-- Title row end-->
            <div class="row ts-service-row-box">

                @forelse ($servicios_home as $servicio)
                    <div class="col-lg-4 col-md-12 mb-4">
                        <div class="ts-service-box">
                            <div class="ts-service-image-wrapper">
                                <img class="img-fluid" src="{{ asset($servicio->thumbnail) }}" alt="">
                            </div>
                            <div class="ts-service-content">
                                <h3 class="service-title">{{ $servicio->title }}</h3>
                                {{ \Illuminate\Support\Str::limit(html_entity_decode(strip_tags($servicio->description)), 100) }}
                                <p><a class="link-more" href="{{ route('blog.articulos.categorias', ['slug' => $servicio->slug]) }}">Más Información<i
                                            class="icon icon-right-arrow2"></i></a></p>
                            </div>
                        </div>

                    </div>
                @empty
                @endforelse


            </div>
            <!-- Content row end-->

        </div>
        <!-- Container end-->
    </section>
    <!-- Service end-->