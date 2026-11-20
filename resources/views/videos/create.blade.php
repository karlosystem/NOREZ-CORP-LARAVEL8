@extends('layouts.dashboard')

@section('title')
    Crear
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('clientes') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('videos.store') }}" method="POST">
                        @csrf
                        <div class="row d-flex align-items-stretch">
                            <div class="col-md-6">
                                <!-- title -->
                                <div class="form-group">
                                    <label for="input_video_name" class="font-weight-bold">
                                        Razon Social
                                    </label>
                                    <input id="input_video_name" value="{{ old('name') }}" name="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror"
                                        placeholder="Razon Social" />
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!-- slug -->
                                <div class="form-group">
                                    <label for="input_video_slug" class="font-weight-bold">
                                        Slug
                                    </label>
                                    <input id="input_video_slug" value="{{ old('value') }}" name="slug" type="text"
                                        class="form-control @error('slug') is-invalid @enderror" placeholder="Slug"
                                        readonly />
                                    @error('slug')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!-- link -->
                                <div class="form-group">
                                    <label for="input_video_name" class="font-weight-bold">
                                        Link
                                    </label>
                                    <input id="input_video_link" value="{{ old('link') }}" name="link" type="text"
                                        class="form-control @error('link') is-invalid @enderror"
                                        placeholder="Link de Video" />
                                    @error('link')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!-- thumbnail -->
                                <div class="form-group">
                                    <label for="input_video_thumbnail" class="font-weight-bold">
                                        Logotipo de la empresa
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <button id="button_video_thumbnail" data-input="input_video_thumbnail"
                                                class="btn btn-primary" type="button">
                                                Browse
                                            </button>
                                        </div>
                                        <input id="input_video_thumbnail" name="cover_image"
                                            value="{{ old('cover_image') }}" type="text"
                                            class="form-control @error('cover_image') is-invalid @enderror"
                                            placeholder="Seleccionar Imagen" readonly />
                                        @error('cover_image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- status -->
                                <div class="form-group">
                                    <label for="select_post_status" class="font-weight-bold">
                                        Status
                                    </label>
                                    <select id="select_post_status" name="status"
                                        class="custom-select @error('status') is-invalid @enderror">
                                        <option value="publish">Publish</option>
                                        <option value="draft">Draft</option>                                        
                                    </select>
                                    @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">

                                <!-- nombre -->
                                <div class="form-group">
                                    <label for="input_nombre_cliente" class="font-weight-bold">
                                        Nombre de Cliente
                                    </label>
                                    <input id="input_nombre_cliente" value="{{ old('cliente') }}" name="cliente" type="text"
                                        class="form-control @error('cliente') is-invalid @enderror"
                                        placeholder="Nombre de Cliente" />
                                    @error('cliente')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- cargo -->
                                <div class="form-group">
                                    <label for="input_nombre_cliente" class="font-weight-bold">
                                        Cargo de Cliente
                                    </label>
                                    <input id="input_cargo_cliente" value="{{ old('cargo') }}" name="cargo" type="text"
                                        class="form-control @error('cargo') is-invalid @enderror"
                                        placeholder="Cargo de Cliente" />
                                    @error('cargo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- cargo -->
                                <div class="form-group">
                                    <label for="input_testimonio_cliente" class="font-weight-bold">
                                        Testimonio
                                    </label>                         
                                    <textarea class="form-control @error('cargo') is-invalid @enderror" placeholder="Testimonio" name="testimonio" id="testimonio" cols="30" rows="5">{{ old('testimonio') }}</textarea>
                                    @error('testimonio')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- thumbnail -->
                                <div class="form-group">
                                    <label for="input_foto_cliente" class="font-weight-bold">
                                        Foto de Cliente
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <button id="button_foto_cliente" data-input="button_foto_cliente"
                                                class="btn btn-primary" type="button">
                                                Buscar Foto
                                            </button>
                                        </div>
                                        <input id="input_foto_cliente" name="foto"
                                            value="{{ old('foto') }}" type="text"
                                            class="form-control @error('foto') is-invalid @enderror"
                                            placeholder="Seleccionar Foto" readonly />
                                        @error('foto')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="float-right">
                            <a class="btn btn-info px-4" href="{{ route('videos.index') }}">Back</a>
                            <button type="submit" class="btn btn-primary px-4">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('javascript-internal')
    <script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
    <script src="{{ asset('vendor/tinymce5/jquery.tinymce.min.js') }}"></script>
    {{-- textarea --}}
    <script src="{{ asset('vendor/tinymce5/tinymce.min.js') }}"></script>
@endpush

@push('javascript-internal')
    <script>
        $(document).ready(function() {
            const generateSlug = (value) => {
                return value.trim()
                    .toLowerCase()
                    .replace(/[^a-z\d-]/gi, '-')
                    .replace(/-+/g, '-').replace(/^-|-$/g, "");
            }
            //generar slug
            $('#input_video_name').change(function(event) {
                $('#input_video_slug').val(generateSlug(event.target.value));
            });

            //file manager
            $('#button_video_thumbnail').filemanager('image')
            $('#button_foto_cliente').filemanager('image')

        });
    </script>
@endpush
