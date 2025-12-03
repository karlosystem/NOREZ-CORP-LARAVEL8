@extends('layouts.dashboard')

@section('title')
    Editar
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('edit_albums', $album) }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('albums.update', ['album' => $album]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-body">
                        <div class="row d-flex align-items-stretch">
                            <div class="col-md-8">
                                <!-- title -->
                                <div class="form-group">
                                    <label for="input_album_name" class="font-weight-bold">
                                        Nombre de Album
                                    </label>
                                    <input id="input_album_name" value="{{ old('name', $album->name) }}" name="name"
                                        type="text" class="form-control @error('name') is-invalid @enderror"
                                        placeholder="Nombre de Album" />
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
                                    <input id="input_album_slug" value="{{ old('slug', $album->slug) }}" name="slug"
                                        type="text" class="form-control @error('slug') is-invalid @enderror"
                                        placeholder="Slug" readonly />
                                    @error('slug')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- thumbnail -->
                                <div class="form-group">
                                    <label for="input_album_thumbnail" class="font-weight-bold">
                                        Imagen
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <button id="button_album_thumbnail" data-input="input_album_thumbnail"
                                                class="btn btn-primary" type="button">
                                                Browse
                                            </button>
                                        </div>
                                        <input id="input_album_thumbnail" name="cover_image"
                                            value="{{ old('cover_image', asset($album->cover_image)) }}" type="text"
                                            class="form-control @error('cover_image') is-invalid @enderror"
                                            placeholder="Seleccionar Imagen" />
                                        @error('cover_image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- description -->
                                <div class="form-group">
                                    <label for="input_album_description" class="font-weight-bold">
                                        Description
                                    </label>
                                    <textarea id="input_album_description" name="description" placeholder="Descripcion"
                                        class="form-control @error('description') is-invalid @enderror" rows="3">{{ old('description', $album->description) }}</textarea>
                                    @error('description')
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
                                                {{ old('status', $album->status) == $key ? 'selected' : null }}>
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
                                    <a class="btn btn-warning px-4" href="{{ route('albums.index') }}">Back</a>
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
            $('#input_album_name').change(function(event) {
                $('#input_album_slug').val(generateSlug(event.target.value));
            });

            //file manager
            $('#button_album_thumbnail').filemanager('image')
        });
    </script>
@endpush
