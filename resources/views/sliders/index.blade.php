@extends('layouts.dashboard')

@section('title')
    SLIDERS
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('sliders') }}
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
                                            class="form-control" placeholder="Search for sliders">
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
                            <a href="{{ route('sliders.create') }}" class="btn btn-primary float-right" role="button">
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
                                <th scope="col">Nombre</th>
                                <th scope="col">Leyenda</th>
                                <th scope="col">Image</th>
                                <th scope="col">Date</th>
                                <th scope="col">Status</th>
                                <th scope="col">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($sliders as $slider)
                                <tr>
                                    <td scope="row">{{ $slider->id }}</td>
                                    <td class="text-left">{{ $slider->name }}</td>
                                    <td class="text-left">{{ $slider->leyenda }}</td>
                                    <td>

                                            <img class="img-fluid" src="{{ asset($slider->cover_image) }}"
                                                style="width: auto; height: 75px;">
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($slider->created_at)->format('d-m-Y') }}</td>
                                    <td>{{ $slider->status }}</td>
                                    <td>
                                        <div>                                           
                                            <!-- edit -->
                                            <a href="{{ route('sliders.edit', ['slider' => $slider]) }}"
                                                class="btn btn-sm btn-info" role="button">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <!-- delete -->
                                            <form class="d-inline" role="alert"
                                                alert-text="{{ trans('artistas.alert.delete.message.confirm', ['name' => $slider->name]) }}"
                                                action="{{ route('sliders.destroy', ['slider' => $slider]) }}"
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
                @if ($sliders->hasPages())
                    <div class="card-footer">
                        {{ $sliders->links('vendor.pagination.bootstrap-4') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
