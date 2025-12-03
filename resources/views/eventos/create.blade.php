@extends('layouts.dashboard')

@section('title')
    Crear
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('proyectos') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row d-flex align-items-stretch">
                        <div class="col-md-6">
                            <form action="{{ route('eventos.store') }}" method="POST">
                                @csrf
                                <!-- title -->
                                <div class="form-group">
                                    <label for="input_evento_name" class="font-weight-bold">
                                        Titulo
                                    </label>
                                    <input id="input_evento_name" value="{{ old('name') }}" name="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror"
                                        placeholder="Titulo de Proyecto" />
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!-- slug -->
                                <div class="form-group">
                                    <label for="input_evento_slug" class="font-weight-bold">
                                        Slug
                                    </label>
                                    <input id="input_evento_slug" value="{{ old('value') }}" name="slug" type="text"
                                        class="form-control @error('slug') is-invalid @enderror" placeholder="Slug"
                                        readonly />
                                    @error('slug')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!-- thumbnail -->
                                <div class="form-group">
                                    <label for="input_evento_thumbnail" class="font-weight-bold">
                                        Thumbnail
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <button id="button_evento_thumbnail" data-input="input_evento_thumbnail"
                                                class="btn btn-primary" type="button">
                                                Browse
                                            </button>
                                        </div>
                                        <input id="input_evento_thumbnail" name="cover_image"
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

                                <!-- description -->
                                <div class="form-group">
                                    <label for="input_evento_description" class="font-weight-bold">
                                        Description
                                    </label>
                                    <textarea onkeyup='charLimit(this, 100);' id="input_evento_description" name="description"
                                        class="form-control @error('description') is-invalid @enderror" rows="3">{{ old('description') }}</textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- content -->
                                <div class="form-group">
                                    <label for="input_post_content" class="font-weight-bold">
                                        Content
                                    </label>
                                    <textarea id="input_post_content" name="content" placeholder="Contenido de Texto"
                                        class="form-control @error('content') is-invalid @enderror" rows="20">{{ old('content') }}</textarea>
                                    @error('content')
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
                                    <a class="btn btn-info px-4" href="{{ route('eventos.index') }}">Back</a>
                                    <button type="submit" class="btn btn-primary px-4">Save</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6">

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
        function charLimit(limitField, limitNum) {
            if (limitField.value.length > limitNum) {
                limitField.value = limitField.value.substring(0, limitNum);
            }
        }
    </script>
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
            $('#input_evento_name').change(function(event) {
                $('#input_evento_slug').val(generateSlug(event.target.value));
            });

            //file manager
            $('#button_evento_thumbnail').filemanager('image')

            //texarea
            $("#input_post_content").tinymce({
                relative_urls: false,
                language: "en",
                plugins: [
                    "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                    "searchreplace wordcount visualblocks visualchars code fullscreen",
                    "insertdatetime media nonbreaking save table directionality",
                    "emoticons template paste textpattern",
                ],
                toolbar1: "fullscreen preview",
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
