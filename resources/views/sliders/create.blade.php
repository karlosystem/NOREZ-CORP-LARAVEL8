@extends('layouts.dashboard')

@section('title')
    Crear
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('sliders') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row d-flex align-items-stretch">
                        <div class="col-md-6">
                            <form action="{{ route('sliders.store') }}" method="POST">
                                @csrf
                                <!-- title -->
                                <div class="form-group">
                                    <label for="input_slider_name" class="font-weight-bold">
                                        Titulo
                                    </label>
                                    <input id="input_slider_name" value="{{ old('name') }}" name="name" type="text"
                                        class="form-control form-control-sm @error('name') is-invalid @enderror"
                                        placeholder="Titulo de Slider" />
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                 <div class="form-group">
                                    <label for="input_slider_name" class="font-weight-bold">
                                        Leyenda
                                    </label>
                                    <input id="input_slider_leyenda" value="{{ old('leyenda') }}" name="leyenda" type="text"
                                        class="form-control form-control-sm @error('leyenda') is-invalid @enderror"
                                        placeholder="Leyenda de Slider" />
                                    @error('leyenda')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                 <div class="form-group">
                                    <label for="input_slider_name" class="font-weight-bold">
                                        Descripcion
                                    </label>
                                    <input id="input_slider_descripcion" value="{{ old('descripcion') }}" name="descripcion" type="text"
                                        class="form-control form-control-sm @error('descripcion') is-invalid @enderror"
                                        placeholder="Descripcion de Slider" />
                                    @error('descripcion')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- slug -->
                                <div class="form-group">
                                    <label for="input_slider_slug" class="font-weight-bold">
                                        Slug
                                    </label>
                                    <input id="input_slider_slug" value="{{ old('value') }}" name="slug" type="text"
                                        class="form-control form-control-sm @error('slug') is-invalid @enderror" placeholder="Slug"
                                        readonly />
                                    @error('slug')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!-- link -->
                                <div class="form-group">
                                    <label for="input_slider_name" class="font-weight-bold">
                                        Link
                                    </label>
                                    <input id="input_slider_link" value="{{ old('link') }}" name="link" type="text"
                                        class="form-control form-control-sm @error('link') is-invalid @enderror"
                                        placeholder="Link de Slider" />
                                    @error('link')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!-- thumbnail -->
                                <div class="form-group">
                                    <label for="input_slider_thumbnail" class="font-weight-bold">
                                        Imagen en formato : jpg, png o jpeg . tamaño 1599px ancho - 719px alto
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <button id="button_slider_thumbnail" data-input="input_slider_thumbnail"
                                                class="btn btn-primary" type="button">
                                                Browse
                                            </button>
                                        </div>
                                        <input id="input_slider_thumbnail" name="cover_image"
                                            value="{{ old('cover_image') }}" type="text"
                                            class="form-control form-control-sm @error('cover_image') is-invalid @enderror"
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
                                        <option value="draft">Draft</option>
                                        <option value="publish">Publish</option>
                                    </select>
                                    @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="float-right">
                                    <a class="btn btn-info px-4" href="{{ route('sliders.index') }}">Back</a>
                                    <button type="submit" class="btn btn-primary px-4">Save</button>
                                </div>

                            </form>
                        </div>
                    </div>
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
            $('#input_slider_name').change(function(event) {
                $('#input_slider_slug').val(generateSlug(event.target.value));
            });

            //file manager
            $('#button_slider_thumbnail').filemanager('image')


        });
    </script>
@endpush
