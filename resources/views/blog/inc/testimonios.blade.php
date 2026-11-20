    <section class="testimonial-area" id="testimonial-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="accordion-title">
                        <h3 class="column-title"><span>Norez Corp S.A.C.</span>
                            Apuesta por Publicidad exterior y empieza a destacar</h3>
                    </div>
                    <div id="accordion" class="accordion-area">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <a href="#" class="btn btn-link" data-toggle="collapse"
                                        data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Gran visibilidad
                                    </a>
                                </h5>
                            </div>
                            <div class="collapse show" id="collapseOne" aria-labelledby="headingOne"
                                data-parent="#accordion">
                                <div class="card-body">
                                    <p>La publicidad exterior se sitúa en soportes estratégicos con alto tránsito—como
                                        mupis, pantallas LED y lonas urbanas—asegurando que tu mensaje de marca llegue a una
                                        audiencia amplia. Tanto conductores como peatones no pueden ignorar un formato de
                                        publicidad exterior bien ubicado, lo que lo convierte en una opción efectiva para
                                        generar una exposición masiva y continua de tu marca.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <h5 class="mb-0">
                                    <a href="#" class="btn btn-link collapsed" data-toggle="collapse"
                                        data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Segmentación geográfica:
                                    </a>
                                </h5>
                            </div>
                            <div class="collapse" id="collapseThree" aria-labelledby="headingThree"
                                data-parent="#accordion">
                                <div class="card-body">
                                    <p>La publicidad exterior permite seleccionar soportes y ubicaciones específicas para tu
                                        mensaje, brindándote la oportunidad de segmentar geográficamente a tu audiencia. Al
                                        colocar mupis, lonas o pantallas LED en zonas donde se concentra tu público
                                        objetivo, maximizas la relevancia de tu campaña y aumentas las probabilidades de que
                                        tu anuncio impacte precisamente a quienes tienen más interés en tu oferta.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingFour">
                                <h5 class="mb-0">
                                    <a href="#" class="btn btn-link collapsed" data-toggle="collapse"
                                        data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        Durabilidad y exposición continua:
                                    </a>
                                </h5>
                            </div>
                            <div class="collapse" id="collapseFour" aria-labelledby="headingFour"
                                data-parent="#accordion">
                                <div class="card-body">
                                    <p>La publicidad exterior, a diferencia de medios publicitarios efímeros como anuncios
                                        en línea o impresos, se caracteriza por su durabilidad y visibilidad ininterrumpida.
                                        Soportes como vallas, mupis, lonas urbanas y pantallas LED permanecen activos las 24
                                        horas del día, los 7 días de la semana. Esto garantiza que tu mensaje de marca esté
                                        presente de forma constante durante todo el periodo contratado, incrementando la
                                        probabilidad de generar un recuerdo duradero en la audiencia.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Accordion end -->
                </div>
                <!-- Col end-->
                <div class="col-lg-6 testimonial-client">
                    <h2 class="column-title "><span>Lo que dijerón</span> Testimonio de Clientes</h2>
                    <div class="owl-carousel owl-theme testimonial-slide owl-dark" id="testimonial-slide">

                        @forelse ($clientes as $cliente)
                        <div class="item">
                            <div class="quote-item quote-square">
                                <span class="quote-text">
                                    {{ $cliente->testimonio }}
                                </span>
                                <div class="quote-item-footer">
                                    <img class="testimonial-thumb"
                                        src="{{ $cliente->foto }}"
                                        alt="testimonial">
                                    <div class="quote-item-info">
                                        <p class="quote-author">{{ $cliente->cliente }}</p>
                                        <span class="quote-subtext">{{ $cliente->cargo }}</span>
                                    </div>
                                </div>
                            </div>
                            <!-- Quote item end-->
                        </div>
                        @empty
                        @endforelse 

                    </div>
                    <!-- Testimonial carousel end-->
                </div>
                <!-- Col end-->
            </div>
            <!-- Content row end-->
        </div>
        <!-- Container end-->
    </section>
    <!-- Quote area end-->