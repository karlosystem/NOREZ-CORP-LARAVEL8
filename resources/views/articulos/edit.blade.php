@extends('layouts.dashboard')

@section('title')
    Editar
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('edit_articulos', $articulo) }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('articulos.update', ['articulo' => $articulo]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-body">
                        <div class="row d-flex align-items-stretch">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="lbl_articulo_title" class="font-weight-bold">
                                        Titulo
                                    </label>
                                    <input id="input_articulo_title" value="{{ old('title', $articulo->title) }}"
                                        name="title" type="text"
                                        class="form-control form-control-sm @error('title') is-invalid @enderror"
                                        placeholder="Nombre de Articulo" />
                                    @error('articulo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!-- slug -->
                                <div class="form-group">
                                    <label for="lbl_articulo_slug" class="font-weight-bold">
                                        Slug
                                    </label>
                                    <input id="input_articulo_slug" value="{{ old('slug', $articulo->slug) }}"
                                        name="slug" type="text"
                                        class="form-control form-control-sm @error('slug') is-invalid @enderror"
                                        placeholder="Slug" readonly />
                                    @error('slug')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!-- parent_category -->
                                <div class="form-group">
                                    <label for="lbl_articulo_categoria" class="font-weight-bold">
                                        Categoria
                                    </label>
                                    <select id="select_articulo_categoria" name="articulo_categoria"
                                        class="custom-select custom-select-sm w-100">
                                        @php
                                            $selected = old('articulo_categoria')
                                                ? \App\Models\Servicios::find(old('articulo_categoria'))
                                                : $rowSelected;
                                        @endphp
                                        @if ($selected)
                                            <option value="{{ $selected->id }}" selected>
                                                {{ $selected->title }}
                                            </option>
                                        @endif
                                    </select>
                                </div>

                                <!-- thumbnail -->
                                <div class="form-group">
                                    <label for="input_articulo_thumbnail" class="font-weight-bold">
                                        Imagen
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <button id="button_articulo_thumbnail" data-input="input_articulo_thumbnail"
                                                class="btn btn-primary" type="button">
                                                Browse
                                            </button>
                                        </div>
                                        <input id="input_articulo_thumbnail" name="thumbnail"
                                            value="{{ old('thumbnail', asset($articulo->thumbnail)) }}" type="text"
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
                                    <label for="lbl_articulo_resumen" class="font-weight-bold">
                                        Resumen
                                    </label>
                                    <textarea onkeyup='charLimit(this, 100);' id="input_articulo_resumen" name="resumen" placeholder="Resumen"
                                        class="form-control @error('resumen') is-invalid @enderror" rows="10">{{ old('resumen', $articulo->resumen) }}</textarea>
                                    @error('resumen')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">

                                <div class="form-group">
                                    <label for="input_description_description" class="font-weight-bold">
                                        Presentacion
                                    </label>
                                    <textarea onkeyup='charLimit(this, 300);' id="input_articulo_presentacion" name="presentacion"
                                        class="form-control @error('presentacion') is-invalid @enderror" rows="10">{{ old('presentacion', $articulo->presentacion) }}</textarea>
                                    @error('presentacion')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Contenido -->
                                <div class="form-group">
                                    <label for="input_contenido_articulo" class="font-weight-bold">
                                        Contenido
                                    </label>
                                    <textarea onkeyup='charLimit(this, 300);' id="input_articulo_contenido" name="contenido"
                                        class="form-control @error('contenido') is-invalid @enderror" rows="10">{{ old('contenido', $articulo->contenido) }}</textarea>
                                    @error('contenido')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                            </div>
                            <div class="col-md-4">

                                <div class="form-group">
                                    <label for="lbl_articulo_metatitle" class="font-weight-bold">
                                        Meta Titulo
                                    </label>
                                    <input id="input_meta_title" value="{{ old('metatitle', $articulo->metatitle) }}"
                                        name="metatitle" type="text"
                                        class="form-control form-control-sm @error('metatitle') is-invalid @enderror"
                                        placeholder="Meta Titulo de Articulo" />
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
                                    <input id="input_meta_description"
                                        value="{{ old('metadescription', $articulo->metadescription) }}"
                                        name="metadescription" type="text"
                                        class="form-control form-control-sm @error('metadescription') is-invalid @enderror"
                                        placeholder="Meta Description de Articulo" />
                                    @error('metadescription')
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
                                                {{ old('status', $articulo->status) == $key ? 'selected' : null }}>
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
                                    <label for="select_post_status" class="font-weight-bold">
                                        Destacado
                                    </label>
                                    <select id="select_post_destacado" name="destacado"
                                        class="custom-select @error('destacado') is-invalid @enderror">
                                        @foreach ($destacados as $key => $value)
                                            <option value="{{ $key }}"
                                                {{ old('destacado', $articulo->destacado) == $key ? 'selected' : null }}>
                                                {{ $value }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('destacado')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="select_post_portada" class="font-weight-bold">
                                        Portada
                                    </label>
                                    <select id="select_post_destacado" name="portada"
                                        class="custom-select @error('portada') is-invalid @enderror">
                                        @foreach ($portadas as $key => $value)
                                            <option value="{{ $key }}"
                                                {{ old('portada', $articulo->portada) == $key ? 'selected' : null }}>
                                                {{ $value }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('portada')
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
                                    <a class="btn btn-warning px-4" href="{{ route('articulos.index') }}">Back</a>
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

@push('css-external')
    <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2-bootstrap4.min.css') }}">
@endpush


@push('javascript-internal')
    <script src="{{ asset('vendor/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('vendor/select2/js/i18n/' . app()->getLocale() . '.js') }}"></script>
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
            $('#input_articulo_title').change(function(event) {
                $('#input_articulo_slug').val(generateSlug(event.target.value));
            });

            $('#select_articulo_categoria').select2({
                theme: 'bootstrap4',
                language: "{{ app()->getLocale() }}",
                allowClear: true,
                ajax: {
                    url: "{{ route('servicios.select') }}",
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: item.title,
                                    id: item.id
                                }
                            })
                        };
                    }
                }
            });


            //file manager
            $('#button_articulo_thumbnail').filemanager('image')

            //texarea
            $("#input_articulo_resumen").tinymce({
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
            $("#input_articulo_presentacion").tinymce({
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
            $("#input_articulo_contenido").tinymce({
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
