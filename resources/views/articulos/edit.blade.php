@extends('layouts.dashboard')

@section('title', 'Editar Artículo')

@section('breadcrumbs')
    {{ Breadcrumbs::render('edit_articulos', $articulo) }}
@endsection

@section('content')
<form action="{{ route('articulos.update', ['articulo' => $articulo]) }}" method="POST">
    @csrf
    @method('PUT')
    
    <div class="row">
        <div class="col-md-8">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-white py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Información del Producto</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="font-weight-bold">Título del Artículo</label>
                        <input id="input_articulo_title" value="{{ old('title', $articulo->title) }}"
                            name="title" type="text" class="form-control @error('title') is-invalid @enderror"
                            placeholder="Ej: Roll Screen Premium" />
                        @error('title') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Resumen Corto</label>
                        <textarea id="input_articulo_resumen" name="resumen" 
                            class="form-control @error('resumen') is-invalid @enderror">{{ old('resumen', $articulo->resumen) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Presentación</label>
                        <textarea id="input_articulo_presentacion" name="presentacion" 
                            class="form-control @error('presentacion') is-invalid @enderror">{{ old('presentacion', $articulo->presentacion) }}</textarea>
                    </div>

                    <div class="form-group mb-0">
                        <label class="font-weight-bold">Contenido Detallado</label>
                        <textarea id="input_articulo_contenido" name="contenido" 
                            class="form-control @error('contenido') is-invalid @enderror">{{ old('contenido', $articulo->contenido) }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-light py-3">
                    <h6 class="m-0 font-weight-bold text-secondary">Publicación</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="small font-weight-bold">Estado</label>
                        <select name="status" class="custom-select custom-select-sm">
                            @foreach ($statuses as $key => $value)
                                <option value="{{ $key }}" {{ old('status', $articulo->status) == $key ? 'selected' : '' }}>{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label class="small font-weight-bold">Destacado</label>
                            <select name="destacado" class="custom-select custom-select-sm">
                                @foreach ($destacados as $key => $value)
                                    <option value="{{ $key }}" {{ old('destacado', $articulo->destacado) == $key ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6">
                            <label class="small font-weight-bold">Portada</label>
                            <select name="portada" class="custom-select custom-select-sm">
                                @foreach ($portadas as $key => $value)
                                    <option value="{{ $key }}" {{ old('portada', $articulo->portada) == $key ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('articulos.index') }}" class="btn btn-sm btn-outline-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-sm btn-primary px-4">Guardar Cambios</button>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <div class="form-group">
                        <label class="font-weight-bold small">Categoría</label>
                        <select id="select_articulo_categoria" name="articulo_categoria" class="custom-select">
                             @php $selected = old('articulo_categoria') ? \App\Models\Servicios::find(old('articulo_categoria')) : $rowSelected; @endphp
                             @if ($selected) <option value="{{ $selected->id }}" selected>{{ $selected->title }}</option> @endif
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold small">Imagen Principal</label>
                        <div class="input-group">
                            <input id="input_articulo_thumbnail" name="thumbnail" readonly
                                value="{{ old('thumbnail', asset($articulo->thumbnail)) }}" type="text" class="form-control form-control-sm">
                            <div class="input-group-append">
                                <button id="button_articulo_thumbnail" data-input="input_articulo_thumbnail" class="btn btn-sm btn-dark" type="button">Buscar</button>
                            </div>
                        </div>
                        <div id="holder" style="margin-top:15px;max-height:150px; overflow:hidden; border-radius:8px;">
                            <img src="{{ asset($articulo->thumbnail) }}" class="img-fluid border">
                        </div>
                    </div>
                    
                    <div class="form-group mb-0">
                        <label class="font-weight-bold small text-muted">URL Amigable (Slug)</label>
                        <input id="input_articulo_slug" value="{{ old('slug', $articulo->slug) }}" name="slug" type="text" class="form-control form-control-sm bg-light" readonly />
                    </div>
                </div>
            </div>

            <div class="card shadow-sm">
                <div class="card-header bg-light py-2">
                    <h6 class="m-0 font-weight-bold small">Configuración SEO</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="small">Meta Título</label>
                        <textarea class="form-control form-control-sm" name="metatitle" rows="2">{{ old('metatitle', $articulo->metatitle) }}</textarea>
                    </div>
                    <div class="form-group mb-0">
                        <label class="small">Meta Descripción</label>
                        <textarea class="form-control form-control-sm" name="metadescription" rows="3">{{ old('metadescription', $articulo->metadescription) }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
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
                height: 500, // <--- Añade esto (valor en píxeles) para aumentar el alto
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
