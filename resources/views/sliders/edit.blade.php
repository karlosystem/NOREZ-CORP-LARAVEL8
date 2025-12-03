@extends('layouts.dashboard')

@section('title')
    Editar
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('edit_sliders', $slider) }}
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('sliders.update', ['slider' => $slider]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-body">
                        <div class="row d-flex align-items-stretch">
                            <div class="col-md-6">
                                <!-- title -->
                                <div class="form-group">
                                    <label for="input_album_name" class="font-weight-bold">
                                        Titulo de slider
                                    </label>
                                    <input id="input_slider_name" value="{{ old('name', $slider->name) }}" name="name"
                                        type="text" class="form-control form-control-sm @error('name') is-invalid @enderror"
                                        placeholder="Nombre de Slider" />
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- slug -->
                                <div class="form-group">
                                    <label for="input_post_slug" class="font-weight-bold">
                                        Slug
                                    </label>
                                    <input id="input_slider_slug" value="{{ old('slug', $slider->slug) }}" name="slug"
                                        type="text" class="form-control form-control-sm @error('slug') is-invalid @enderror"
                                        placeholder="Slug" readonly />
                                    @error('slug')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                 <div class="form-group">
                                    <label for="lbl_slider_leyenda" class="font-weight-bold">
                                        Leyenda de slider
                                    </label>
                                    <input id="input_slider_leyenda" value="{{ old('leyenda', $slider->leyenda) }}" name="leyenda"
                                        type="text" class="form-control form-control-sm @error('leyenda') is-invalid @enderror"
                                        placeholder="Nombre de leyenda" />
                                    @error('leyenda')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                  <div class="form-group">
                                    <label for="lbl_slider_description" class="font-weight-bold">
                                        Descripcion de slider
                                    </label>
                                    <input id="input_slider_description" value="{{ old('descripcion', $slider->descripcion) }}" name="descripcion"
                                        type="text" class="form-control form-control-sm @error('descripcion') is-invalid @enderror"
                                        placeholder="descripcion de leyenda" />
                                    @error('descripcion')
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
                                                class="btn btn-sm btn-primary" type="button">
                                                Browse
                                            </button>
                                        </div>
                                        <input id="input_slider_thumbnail" name="cover_image"
                                            value="{{ old('cover_image', asset($slider->cover_image)) }}" type="text"
                                            class="form-control form-control-sm @error('cover_image') is-invalid @enderror"
                                            placeholder="Seleccionar Imagen" />
                                        @error('cover_image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Link -->
                                <div class="form-group">
                                    <label for="input_album_name" class="font-weight-bold">
                                        Link
                                    </label>
                                    <input id="input_slider_link" value="{{ old('link', $slider->link) }}" name="link"
                                        type="text" class="form-control form-control-sm @error('link') is-invalid @enderror"
                                        placeholder="Link de Slider" />
                                    @error('link')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>

                                <!-- status -->
                                <div class="form-group">
                                    <label for="select_post_status" class="font-weight-bold">
                                        Status
                                    </label>
                                    <select id="select_post_status" name="status"
                                        class="custom-select @error('status') is-invalid @enderror">
                                        @foreach ($statuses as $key => $value)
                                            <option value="{{ $key }}"
                                                {{ old('status', $slider->status) == $key ? 'selected' : null }}>
                                                {{ $value }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="float-right">
                                    <a class="btn btn-warning px-4" href="{{ route('sliders.index') }}">Back</a>
                                    <button type="submit" class="btn btn-primary px-4">
                                        Edit
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
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
