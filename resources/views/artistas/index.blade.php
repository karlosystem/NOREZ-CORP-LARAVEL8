@extends('layouts.dashboard')

@section('title')
    {{ trans('artistas.title.index') }}
@endsection


@section('breadcrumbs')
    {{ Breadcrumbs::render('artistas') }}
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
                                            class="form-control" placeholder="Search for artists">
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
                            {{-- permisos --}}
                            @can('post_create')
                                <a href="{{ route('artistas.create') }}" class="btn btn-primary float-right" role="button">
                                    Add new
                                    <i class="fas fa-plus-square"></i>
                                </a>
                            @endcan
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-condensed table-bordered  table-stripedcol text-center mx-auto">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Artista</th>
                                <th scope="col">Image</th>
                                <th scope="col">Date</th>
                                <th scope="col">Status</th>
                                <th scope="col">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($posts as $post)
                                <tr>
                                    <td scope="row">{{ $post->id }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>
                                        @if (file_exists(public_path($post->thumbnail)))
                                            <img class="img-fluid" src="{{ asset($post->thumbnail) }}"
                                                style="width: auto; height: 195px;">
                                        @endif
                                    </td>
                                    <td>{{ $post->created_at }}</td>
                                    <td>{{ $post->status }}</td>
                                    <td>
                                        <div class="float-right">
                                            <!-- detail -->
                                            <a href="{{ route('artistas.show', ['artista' => $post]) }}"
                                                class="btn btn-sm btn-primary" role="button">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <!-- edit -->
                                            <a href="{{ route('artistas.edit', ['artista' => $post]) }}"
                                                class="btn btn-sm btn-info" role="button">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <!-- delete -->
                                            <form class="d-inline" role="alert"
                                                alert-text="{{ trans('artistas.alert.delete.message.confirm', ['title' => $post->title]) }}"
                                                action="{{ route('artistas.destroy', ['artista' => $post]) }}"
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
                @if ($posts->hasPages())
                    <div class="card-footer">
                        {{ $posts->links('vendor.pagination.bootstrap-4') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@push('javascript-internal')
    <script>
        $(document).ready(function() {
            $("form[role='alert']").submit(function(event) {
                event.preventDefault();
                Swal.fire({
                    title: $(this).attr('alert-title'),
                    text: $(this).attr('alert-text'),
                    icon: 'warning',
                    allowOutsideClick: false,
                    showCancelButton: true,
                    cancelButtonText: "{{ trans('tags.button.cancel.value') }}",
                    reverseButtons: true,
                    confirmButtonText: "{{ trans('tags.button.delete.value') }}",
                }).then((result) => {
                    if (result.isConfirmed) {
                        event.target.submit();
                    }
                });
            });
        })
    </script>
@endpush
