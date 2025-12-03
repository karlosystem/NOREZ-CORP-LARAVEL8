@extends('layouts.dashboard')

@section('title')
    Crear
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('albums') }}
@endsection


@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('albums.store') }}" method="POST">
                        @csrf
                        <!-- title -->
                        <div class="form-group">
                            <label for="input_album_name" class="font-weight-bold">
                                Name
                            </label>
                            <input id="input_album_name" value="{{ old('name') }}" name="name" type="text"
                                class="form-control @error('name') is-invalid @enderror" placeholder="Nombre de Album" />
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!-- slug -->
                        <div class="form-group">
                            <label for="input_album_slug" class="font-weight-bold">
                                Slug
                            </label>
                            <input id="input_album_slug" value="{{ old('value') }}" name="slug" type="text"
                                class="form-control @error('slug') is-invalid @enderror" placeholder="Slug" readonly />
                            @error('slug')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!-- thumbnail -->
                        <div class="form-group">
                            <label for="input_album_thumbnail" class="font-weight-bold">
                                Thumbnail
                            </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button id="button_album_thumbnail" data-input="input_album_thumbnail"
                                        class="btn btn-primary" type="button">
                                        Browse
                                    </button>
                                </div>
                                <input id="input_album_thumbnail" name="cover_image" value="{{ old('cover_image') }}"
                                    type="text" class="form-control @error('cover_image') is-invalid @enderror"
                                    placeholder="Seleccionar Imagen" readonly />
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
                            <textarea id="input_album_description" name="description"
                                class="form-control @error('description') is-invalid @enderror" rows="3">{{ old('description') }}</textarea>
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
                                <option value="publish">Publish</option>
                                <option value="draft">Draft</option>                                
                            </select>
                            @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="float-right">
                            <a class="btn btn-info px-4" href="{{ route('albums.index') }}">Back</a>
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
            $('#input_album_name').change(function(event) {
                $('#input_album_slug').val(generateSlug(event.target.value));
            });

            //file manager
            $('#button_album_thumbnail').filemanager('image')
        });
    </script>
@endpush
