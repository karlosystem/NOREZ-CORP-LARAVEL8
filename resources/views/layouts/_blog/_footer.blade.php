<!-- Footer start-->
<footer class="footer" id="footer">
    <div class="footer-main bg-overlay">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 footer-widget footer-about">
                    <div class="footer-logo">
                        <img src="{{ asset('vendor/my-blog/images/logo.png') }}">
                    </div>
                    <p>En Norez Corp S.A.C. somos especialistas en potenciar la comunicación de nuestros clientes. Desde hace más de 30 años damos cobertura a los principales anunciantes del país, nos adaptamos a tus necesidades.</p>

                    <h3 class="widget-title">Recibe nuestras ofertas!</h3>
                    <form class="newsletter-form" id="newsletter-form" action="#" method="post">
                        <div class="form-group">
                            <input class="form-control form-control-lg" id="newsletter-form-email" type="email"
                                name="email" placeholder="Email " autocomplete="off">
                            <button class="btn btn-primary"><i class="fa fa-paper-plane"></i></button>
                        </div>
                    </form>
                </div>
                <!-- About us end-->
                <div class="col-lg-4 col-md-6 footer-widget">
                    <h3 class="widget-title">Enlaces Rápidos</h3>
                    <ul class="list-dash">
                        <li><a href="{{ route('blog.paginas.contenidos', ['slug' => 'nosotros']) }}">Nosotros</a></li>
                        <li><a href="{{ route('servicios.mostrar') }}">Servicios</a></li>
                        <li><a href="{{ route('eventos.mostrar') }}">Proyectos</a></li>
                        <li><a href="{{ route('album.mostrar') }}">Fotos</a></li>
                        <li><a href="{{ route('clientes.index') }}">Clientes</a></li>
                        <li><a target="_new" href="https://norez-corp.com/blog/">Blog</a></li>
                        <li><a href="{{ route('blog.paginas.contenidos', ['slug' => 'tecnologia-de-punta']) }}">Tecnología de Punta</a></li>
                        <li><a href="{{ route('contacto.index') }}">Contácto</a></li>
                    </ul>
                    <h2 class="widget-tarjetas">Aceptamos Tarjetas de Crédito y Débito</h2>
                    <div class="footer-tarjetas">
                        <img class="img-fluid" src="{{ asset('vendor/my-blog/images/banner-tarjetas.png') }}">
                    </div>
                  </div>
                <div class="col-lg-4 col-md-6 footer-widget">
                    <h3 class="widget-title">Dirección y Teléfonos</h3>
                    <div class="ts-contact-info"><span class="ts-contact-icon float-left"><i
                                class="icon icon-map-marker2"></i></span>
                        <div class="ts-contact-content">
                            <h3 class="ts-contact-title">Dirección</h3>
                            <p>{{ $profile->direccion ?? '' }}</p>
                        </div>
                        <!-- Contact content end-->
                    </div>

                    <div class="ts-contact-info last"><span class="ts-contact-icon float-left"><i
                                class="icon icon-envelope"></i></span>
                        <div class="ts-contact-content">
                            <h3 class="ts-contact-title">Correo Electronico</h3>
                            <p>{{ $profile->email ?? '' }}</p>
                        </div>
                        <!-- Contact content end-->
                    </div>
                    <div class="ts-contact-info"><span class="ts-contact-icon float-left"><i
                                class="icon icon-phone3"></i></span>
                        <div class="ts-contact-content">
                            <h3 class="ts-contact-title">Teléfono</h3>
                            <p>{{ $profile->mobile ?? '' }}</p>
                        </div>
                        <!-- Contact content end-->
                    </div>
                </div>
            </div>
            <!-- Content row end-->
        </div>
        <!-- Container end-->
    </div>
    <!-- Footer Main-->
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="copyright-info"><span>Copyright © 2025 - Desarrollo por : <a
                                href="https://carlos-marquina.com">{{ $profile->web ?? '' }}</a></span></div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="footer-social text-right">
                        <ul>
                            <li><a href="https://facebook.com"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="https://twitter.com"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="https://plus.google.com"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="https://github.com"><i class="fa fa-github"></i></a></li>
                            <li><a href="https://instagram.com"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Row end-->
        </div>
        <!-- Container end-->
    </div>
    <!-- Copyright end-->
</footer>
<!-- Footer end-->
