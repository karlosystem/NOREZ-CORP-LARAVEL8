    <section class="clients-area " id="clients-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 owl-carousel owl-theme text-center partners" id="partners-carousel">
                    @forelse ($clientes as $cliente)
                    <figure class="item partner-logo">
                        <a href="{{ route('clientes.index') }}">
                            <img class="img-fluid" src="{{ asset($cliente->cover_image) }}">
                        </a>
                    </figure>
                    @empty
                    @endforelse
                </div>
                <!-- Owl carousel end-->
            </div>
            <!-- Content row end-->
        </div>
        <!-- Container end-->
    </section>
    <!-- Partners end-->