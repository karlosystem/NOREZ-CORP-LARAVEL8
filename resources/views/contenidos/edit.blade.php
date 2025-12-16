@extends('layouts.dashboard')

@section('title')
    Editar
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('edit_contenido', $contenido) }}
@endsection

@section('content')
      <form action="{{ route('contenidos.update', ['contenido' => $contenido]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">

                        <!-- title -->
                        <div class="form-group">
                            <label for="input_album_name" class="font-weight-bold">
                                Name
                            </label>
                            <input id="input_contenidos_title" value="{{ old('title', $contenido->title) }}" name="title" type="text"
                                class="form-control form-control-sm @error('title') is-invalid @enderror"
                                placeholder="Nombre de Contenido" />
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- slug -->
                        <div class="form-group">
                            <label for="input_contenidos_slug" class="font-weight-bold">
                                Slug
                            </label>
                            <input id="input_contenidos_slug" value="{{ old('value', $contenido->slug) }}" name="slug" type="text"
                                class="form-control form-control-sm @error('slug') is-invalid @enderror" placeholder="Slug"
                                readonly />
                            @error('slug')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- thumbnail -->
                        <div class="form-group">
                            <label for="input_contenido_thumbnail" class="font-weight-bold">
                                Thumbnail
                            </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button id="button_contenido_thumbnail" data-input="input_contenido_thumbnail"
                                        class="btn btn-sm btn-primary" type="button">
                                        Browse
                                    </button>
                                </div>
                                <input id="input_contenido_thumbnail" name="thumbnail" value="{{ old('thumbnail', asset($contenido->thumbnail)) }}"
                                    type="text"
                                    class="form-control form-control-sm @error('thumbnail') is-invalid @enderror"
                                    placeholder="Seleccionar Imagen" readonly />
                                @error('thumbnail')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- description -->
                        <div class="form-group">
                            <label for="input_contenido_description" class="font-weight-bold">
                                Description
                            </label>
                            <textarea id="input_contenido_description" name="description"
                                class="form-control @error('description') is-invalid @enderror" rows="3">{{ old('description', $contenido->description) }}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">

                <div class="card">
                    <div class="card-body">
                        <!-- status -->
                        <div class="form-group">
                            <label for="select_post_status" class="font-weight-bold">
                                Status
                            </label>
                            <select id="select_post_status" name="status"
                                class="custom-select @error('status') is-invalid @enderror">
                                @foreach ($statuses as $key => $value)
                                    <option value="{{ $key }}"
                                        {{ old('status', $contenido->status) == $key ? 'selected' : null }}>
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

                        <!-- content -->
                        <div class="form-group">
                            <label for="input_contenido_description" class="font-weight-bold">
                                Content
                            </label>
                            <textarea id="input_contenido_content" name="content" class="form-control @error('content') is-invalid @enderror"
                                rows="3">{{ old('content', $contenido->content) }}</textarea>
                            @error('content')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="lbl_contenido_metatitle" class="font-weight-bold">
                                Meta Titulo
                            </label>
                            <input id="input_meta_title" value="{{ old('metatitle', $contenido->metatitle) }}" name="metatitle" type="text"
                                class="form-control form-control-sm @error('metatitle') is-invalid @enderror"
                                placeholder="Meta Titulo de Contenido" />
                            @error('metatitle')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="lbl_servicio_metadescription" class="font-weight-bold">
                                Meta Description
                            </label>
                            <input id="input_meta_description" value="{{ old('metadescription', $contenido->metadescription) }}" name="metadescription"
                                type="text"
                                class="form-control form-control-sm @error('metadescription') is-invalid @enderror"
                                placeholder="Meta Description de Contenido" />
                            @error('metadescription')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                    </div>
                </div>
            </div>

        </div>

        <div class="row pt-4">
            <div class="col-md-12">
                <div class="float-right">
                    <a class="btn btn-info px-4" href="{{ route('contenidos.index') }}">Back</a>
                    <button type="submit" class="btn btn-primary px-4">Update</button>
                </div>
            </div>
        </div>
    </form>
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
            $('#input_contenidos_title').change(function(event) {
                $('#input_contenidos_slug').val(generateSlug(event.target.value));
            });

            //file manager
            $('#button_contenido_thumbnail').filemanager('image')

            //texarea
            $("#input_contenido_description").tinymce({
                relative_urls: false,
                language: "en",
                plugins: [
                    "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                    "searchreplace wordcount visualblocks visualchars code fullscreen",
                    "insertdatetime media nonbreaking save table directionality",
                    "emoticons template paste textpattern",
                ],
                toolbar2: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
                file_picker_callback: function(callback, value, meta) {
                    let x = window.innerWidth || document.documentElement.clientWidth || document
                        .getElementsByTagName('body')[0].clientWidth;
                    let y = window.innerHeight || document.documentElement.clientHeight || document
                        .getElementsByTagName('body')[0].clientHeight;

                    let cmsURL = "{{ route('unisharp.lfm.show') }}" + '?editor=' + meta.fieldname;
                    if (meta.filetype == 'image') {
                        cmsURL = cmsURL + "&type=Images";
                    } else {
                        cmsURL = cmsURL + "&type=Files";
                    }

                    tinyMCE.activeEditor.windowManager.openUrl({
                        url: cmsURL,
                        title: 'Filemanager',
                        width: x * 0.8,
                        height: y * 0.8,
                        resizable: "yes",
                        close_previous: "no",
                        onMessage: (api, message) => {
                            callback(message.content);
                        }
                    });
                }
            });

            $("#input_contenido_content").tinymce({
                relative_urls: false,
                language: "en",
                plugins: [
                    "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                    "searchreplace wordcount visualblocks visualchars code fullscreen",
                    "insertdatetime media nonbreaking save table directionality",
                    "emoticons template paste textpattern",
                ],
                toolbar2: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
                file_picker_callback: function(callback, value, meta) {
                    let x = window.innerWidth || document.documentElement.clientWidth || document
                        .getElementsByTagName('body')[0].clientWidth;
                    let y = window.innerHeight || document.documentElement.clientHeight || document
                        .getElementsByTagName('body')[0].clientHeight;

                    let cmsURL = "{{ route('unisharp.lfm.show') }}" + '?editor=' + meta.fieldname;
                    if (meta.filetype == 'image') {
                        cmsURL = cmsURL + "&type=Images";
                    } else {
                        cmsURL = cmsURL + "&type=Files";
                    }

                    tinyMCE.activeEditor.windowManager.openUrl({
                        url: cmsURL,
                        title: 'Filemanager',
                        width: x * 0.8,
                        height: y * 0.8,
                        resizable: "yes",
                        close_previous: "no",
                        onMessage: (api, message) => {
                            callback(message.content);
                        }
                    });
                }
            });

        });
    </script>
@endpush