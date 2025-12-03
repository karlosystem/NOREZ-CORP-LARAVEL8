@extends('layouts.dashboard')

@section('title')
    Articulos
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('articulos') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="" method="GET" class="form-inline form-row">
                                <div class="col">
                                    <div class="input-group mx-1">
                                        <label class="font-weight-bold mr-2">Status</label>
                                        <select name="status" class="custom-select custom-select-sm">
                                            @foreach ($statuses as $value => $label)
                                                <option value="{{ $value }}"
                                                    {{ $statusSelected == $value ? 'selected' : null }}>
                                                    {{ $label }}</option>
                                            @endforeach
                                        </select>
                                        <div class="input-group-append">
                                            <button class="btn btn-sm btn-primary" type="submit">Apply</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="input-group mx-1">
                                        <input name="keyword" value="{{ request()->get('keyword') }}" type="search"
                                            class="form-control form-control-sm" placeholder="Search for Articulos">
                                        <div class="input-group-append">
                                            <button class="btn btn-sm btn-primary" type="submit">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('articulos.create') }}" class="btn btn-sm btn-primary float-right" role="button">
                                Add new
                                <i class="fas fa-plus-square"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-condensed table-bordered  table-stripedcol text-center mx-auto">
                         <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Categoria</th>
                                <th scope="col">Image</th>
                                <th scope="col">Date</th>
                                <th scope="col">Modifica</th>
                                <th scope="col">Status</th>
                                <th scope="col">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($articulos as $articulo)
                            <tr>
                                <td scope="row">{{ $articulo->id }}</td>
                                <td class="text-left" scope="row">{{ $articulo->title }}</td>
                                <td class="text-left" scope="row">{{ $articulo->servicio->title ?? 'Sin servicio' }}</td>
                                 <td>
                                    @if (file_exists(public_path($articulo->thumbnail)))
                                        <img class="img-fluid" src="{{ asset($articulo->thumbnail) }}"
                                            style="width: auto; height: 75px;">
                                    @endif
                                </td>
                                <td>{{ \Carbon\Carbon::parse($articulo->created_at)->format('d-m-Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($articulo->updated_at)->format('d-m-Y') }}</td>
                                <td>{{ $articulo->status }}</td>
                                  <td>
                                        <div>                                          
                                            <!-- edit -->
                                            <a href="{{ route('articulos.edit', ['articulo' => $articulo]) }}"
                                                class="btn btn-sm btn-info" role="button">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <!-- delete -->
                                            <form class="d-inline formulario-eliminar" role="alert"
                                                alert-text="{{ trans('artistas.alert.delete.message.confirm', ['title' => $articulo->title]) }}"
                                                action="{{ route('articulos.destroy', ['articulo' => $articulo]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                            </tr>
                            @empty
                                 <p>
                                    <strong>
                                        @if (request()->get('keyword'))
                                            {{ trans('artistas.label.no_data.search', ['keyword' => request()->get('keyword')]) }}
                                        @else
                                            No hay registros
                                        @endif
                                    </strong>
                                </p>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                @if ($articulos->hasPages())
                    <div class="card-footer">
                        {{ $articulos->links('vendor.pagination.bootstrap-4') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
