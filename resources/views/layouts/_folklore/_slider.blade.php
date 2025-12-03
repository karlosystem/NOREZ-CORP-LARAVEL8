        <!-- start of hero -->
        <section class="hero-slider hero-style-1">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    @forelse ($sliders as $slider)
                        <div class="swiper-slide">
                            @if (file_exists(public_path($slider->cover_image)))
                                <div class="slide-inner slide-bg-image"
                                    data-background="{{ asset($slider->cover_image) }}"
                                    data-text="<div><button>Women</button><h4>Nether then turned around out the elements Nuala haverle</h4><ul><li>5 Mins Read</li><li>24 Apr 2022</li></ul></div>">
                            @endif
                            <div class="container-full">
                                <div data-swiper-parallax="300" class="slide-author">
                                    <div>
                                        <img src="{{ asset('vendor/my-folklore/images/slider/author/img-1.jpg') }}">
                                        <p>Por: <a href="#">Danial morton</a></p>
                                    </div>
                                </div>
                                <div data-swiper-parallax="400" class="slide-title">
                                    <h2>{{ $slider->name }} </h2>
                                </div>
                                <div class="clearfix"></div>
                                <div data-swiper-parallax="500" class="slide-btns">
                                    <a href="#">
                                        Leer mas
                                        <svg xmlns="http://www.w3.org/2000/svg" width="33" height="13"
                                            viewBox="0 0 33 13">
                                            <g transform="translate(-1585 -1152)">
                                                <g data-name="Polygon 2" transform="translate(1618 1152) rotate(90)"
                                                    fill="none">
                                                    <path d="M6.5,0,13,11H0Z" stroke="none" />
                                                    <path
                                                        d="M 6.5 1.965688705444336 L 1.75245189666748 10 L 11.24754810333252 10 L 6.5 1.965688705444336 M 6.5 9.5367431640625e-07 L 13 11 L 0 11 L 6.5 9.5367431640625e-07 Z"
                                                        stroke="none" fill="#fff" />
                                                </g>
                                                <rect data-name="Rectangle 46" width="22" height="1"
                                                    transform="translate(1585 1158)" fill="#fff" />
                                            </g>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div> <!-- end slide-inner -->
                </div> <!-- end swiper-slide -->
            @empty
                @endforelse


            </div>
            <!-- end swiper-wrapper -->

            <!-- swipper controls -->
            <div class="swiper-cust-pagination"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            </div>
        </section>
        <!-- end of hero slider -->
