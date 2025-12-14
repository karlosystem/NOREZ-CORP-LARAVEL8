    <section class="quote-area solid-bg" id="quote-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="quote_form">
                        <h2 class="column-title "><span>Soluciones de Publicidad Grafica</span>Obtenga una cotización
                            rápida</h2>
                        <div class="quote-img">
                            <img class="img-fluid" src="{{ asset('vendor/my-blog/images/alltransport.png') }}"
                                alt="img">
                        </div>
                    </div>
                    <!-- Quote form end-->
                </div>
                <!-- Col end-->
                <div class="col-lg-7 qutoe-form-inner-le">

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form class="contact-form" action="{{ route('send.email.post') }}" method="POST">
                        @csrf
                        <h2 class="column-title "><span>Siempre estamos listos</span> 
                            Solicitar una devolución de llamada</h2>
                        <div class="error-container"></div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input class="form-control form-name" id="name" name="name"
                                        placeholder="Nombre Completo" type="text" value="{{ old('name') }}">
                                </div>
                            </div>
                            <!-- Col end-->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input class="form-control form-website" id="celular" name="celular"
                                        placeholder="Celular" type="text" value="{{ old('celular') }}">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input class="form-control form-email" id="email" name="email"
                                        placeholder="Email" type="text" value="{{ old('email') }}">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <textarea class="form-control form-message required-field" id="message" name="message" placeholder="Mensaje"
                                        rows="8">{{ old('message') }}</textarea>
                                </div>
                            </div>
                            <!-- Col 12 end-->
                        </div>
                        <!-- Form row end-->
                        <div class="text-right">
                            <button class="btn btn-primary tw-mt-30" type="submit">Enviar Mensaje</button>
                        </div>
                    </form>
                    <!-- Form end-->
                </div>
                <!-- Col end-->
            </div>
            <!-- Content row end-->
        </div>
        <!-- Container end-->
    </section>
    <!-- Quote area end-->
