@extends('layouts.dashboard')

@section('title')
    Editar
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('edit_servicios', $servicio) }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('servicios.update', ['servicio' => $servicio]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-body">
                        <div class="row d-flex align-items-stretch">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="input_servicio_name" class="font-weight-bold">
                                        Titulo
                                    </label>
                                    <input id="input_servicio_title" value="{{ old('title', $servicio->title) }}"
                                        name="title" type="text"
                                        class="form-control form-control-sm @error('title') is-invalid @enderror"
                                        placeholder="Nombre de Servicio" />
                                    @error('servicio')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!-- slug -->
                                <div class="form-group">
                                    <label for="lbl_servicio_slug" class="font-weight-bold">
                                        Slug
                                    </label>
                                    <input id="input_servicio_slug" value="{{ old('slug', $servicio->slug) }}"
                                        name="slug" type="text"
                                        class="form-control form-control-sm @error('slug') is-invalid @enderror"
                                        placeholder="Slug" readonly />
                                    @error('slug')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!-- thumbnail -->
                                <div class="form-group">
                                    <label for="input_servicio_thumbnail" class="font-weight-bold">
                                        Imagen (800px de ancho - 600px de alto) formato jpg, png, jpeg
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <button id="button_servicio_thumbnail" data-input="input_servicio_thumbnail"
                                                class="btn btn-primary" type="button">
                                                Browse
                                            </button>
                                        </div>
                                        <input id="input_servicio_thumbnail" name="thumbnail"
                                            value="{{ old('thumbnail', asset($servicio->thumbnail)) }}" type="text"
                                            class="form-control @error('thumbnail') is-invalid @enderror"
                                            placeholder="Seleccionar Imagen" />
                                        @error('thumbnail')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- description -->
                                <div class="form-group">
                                    <label for="lbl_evento_description" class="font-weight-bold">
                                        Description
                                    </label>
                                    <textarea onkeyup='charLimit(this, 100);' id="input_servicio_description" name="description" placeholder="Descripcion"
                                        class="form-control @error('description') is-invalid @enderror" rows="10">{{ old('description', $servicio->description) }}</textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>



                            </div>
                            <div class="col-md-6">
                                <!-- content -->
                                <div class="form-group">
                                    <label for="lbl_evento_content" class="font-weight-bold">
                                        Contenido
                                    </label>
                                    <textarea onkeyup='charLimit(this, 100);' id="input_servicio_content" name="content" placeholder="Contenido"
                                        class="form-control form-control-sm @error('content') is-invalid @enderror" rows="10">{{ old('content', $servicio->content) }}</textarea>
                                    @error('content')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- status -->
                                <div class="form-group">
                                    <label for="select_servicio_status" class="font-weight-bold">
                                        Status
                                    </label>
                                    <select id="select_servicio_status" name="status"
                                        class="custom-select @error('status') is-invalid @enderror">
                                        @foreach ($statuses as $key => $value)
                                            <option value="{{ $key }}"
                                                {{ old('status', $servicio->status) == $key ? 'selected' : null }}>
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

                                 <!-- destacado -->
                                <div class="form-group">
                                    <label for="select_servicio_destacado" class="font-weight-bold">
                                        Destacado
                                    </label>
                                    <select id="select_servicio_destacado" name="destacado"
                                        class="custom-select @error('destacado') is-invalid @enderror">
                                        @foreach ($destacados as $key => $value)
                                            <option value="{{ $key }}"
                                                {{ old('destacado', $servicio->destacado) == $key ? 'selected' : null }}>
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

                                 <div class="form-group">
                                    <label for="lbl_servicio_metatitle" class="font-weight-bold">
                                        Meta Titulo
                                    </label>
                                    <input id="input_meta_title" value="{{ old('metatitle', $servicio->metatitle) }}" name="metatitle"
                                        type="text"
                                        class="form-control form-control-sm @error('metatitle') is-invalid @enderror"
                                        placeholder="Meta Titulo de Servicio" />
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
                                    <input id="input_meta_description" value="{{ old('metadescription', $servicio->metadescription) }}" name="metadescription"
                                        type="text"
                                        class="form-control form-control-sm @error('metadescription') is-invalid @enderror"
                                        placeholder="Meta Description de Servicio" />
                                    @error('metadescription')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="col-md-12 mt-5">
                                <div class="float-right">
                                    <a class="btn btn-warning px-4" href="{{ route('servicios.index') }}">Back</a>
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
            $('#input_servicio_title').change(function(event) {
                $('#input_servicio_slug').val(generateSlug(event.target.value));
            });
            //file manager
            $('#button_servicio_thumbnail').filemanager('image')

            //texarea
            $("#input_servicio_description").tinymce({
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

            //texarea
            $("#input_servicio_content").tinymce({
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
