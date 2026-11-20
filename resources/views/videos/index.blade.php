@extends('layouts.dashboard')

@section('title')
    Clientes y sus Testimonios
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('clientes') }}
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
                                            class="form-control" placeholder="Search for Clientes">
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
                            <a href="{{ route('videos.create') }}" class="btn btn-primary float-right" role="button">
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
                                <th scope="col">Razon Social</th>
                                <th scope="col">Logo</th>
                                <th scope="col">Date</th>
                                <th scope="col">Status</th>
                                <th scope="col">Cliente</th>
                                <th scope="col">Cargo</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($videos as $video)
                                <tr>
                                    <td scope="row">{{ $video->id }}</td>
                                    <td class="text-left">{{ $video->name }}</td>
                                    <td>
                                        @if (file_exists(public_path($video->cover_image)))
                                            <img class="img-fluid" src="{{ asset($video->cover_image) }}"
                                                style="width: auto; height: 95px;">
                                        @endif
                                    </td>
                                    <td>{{ $video->created_at }}</td>
                                    <td>{{ $video->status }}</td>
                                    <td>{{ $video->cliente }}</td>
                                    <td>{{ $video->cargo }}</td>
                                    <td>
                                        @if (file_exists(public_path($video->foto)))
                                            <img class="img-fluid" src="{{ asset($video->foto) }}"
                                                style="width: auto; height: 95px;">
                                        @endif
                                    </td>
                                    <td>
                                        <div>                                         
                                            <!-- edit -->
                                            <a href="{{ route('videos.edit', ['video' => $video]) }}"
                                                class="btn btn-sm btn-info" role="button">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <!-- delete -->
                                            <form class="d-inline formulario-eliminar" role="alert"
                                                alert-text="{{ trans('artistas.alert.delete.message.confirm', ['name' => $video->name]) }}"
                                                action="{{ route('videos.destroy', ['video' => $video]) }}" method="POST">
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
                            @endforelse
                        </tbody>
                    </table>
                </div>
                @if ($videos->hasPages())
                    <div class="card-footer">
                        {{ $videos->links('vendor.pagination.bootstrap-4') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
