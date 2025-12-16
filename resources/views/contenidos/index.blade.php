@extends('layouts.dashboard')

@section('title')
    Contenidos
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('contenidos') }}
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
                                        <select name="status" class="custom-select">
                                             @foreach ($statuses as $value => $label)
                                                <option value="{{ $value }}"
                                                    {{ $statusSelected == $value ? 'selected' : null }}>
                                                    {{ $label }}</option>
                                            @endforeach
                                        </select>
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit">Apply</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="input-group mx-1">
                                        <input name="keyword" value="{{ request()->get('keyword') }}" type="search"
                                            class="form-control" placeholder="Search for Contenidos">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('contenidos.create') }}" class="btn btn-primary float-right" role="button">
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
                                <th scope="col">Image</th>
                                <th scope="col">Date</th>
                                <th scope="col">Status</th>
                                <th scope="col">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($contenidos as $contenido)
                            <tr>
                                <td scope="row">{{ $contenido->id }}</td>
                                <td>{{ $contenido->title }}</td>
                                <td>
                                     <img class="img-fluid" src="{{ asset($contenido->thumbnail) }}"
                                                style="width: auto; height: 95px;">
                                </td>
                                <td>{{ \Carbon\Carbon::parse($contenido->created_at)->format('d-m-Y') }}</td>
                                <td>{{ $contenido->status }}</td>
                                <td>
                                     <div>                                          
                                            <!-- edit -->
                                            <a href="{{ route('contenidos.edit', ['contenido' => $contenido]) }}"
                                                class="btn btn-sm btn-info" role="button">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <!-- delete -->
                                            <form class="d-inline formulario-eliminar" role="alert"
                                                alert-text="{{ trans('artistas.alert.delete.message.confirm', ['name' => $contenido->title]) }}"
                                                action="{{ route('contenidos.destroy', ['contenido' => $contenido]) }}"
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
                @if ($contenidos->hasPages())
                    <div class="card-footer">
                        
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
