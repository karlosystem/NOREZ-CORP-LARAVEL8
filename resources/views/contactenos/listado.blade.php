@extends('layouts.dashboard')

@section('title')
    Contactenos
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('contactenos') }}
@endsection

@section('content')
    <!-- section:content -->
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
                                            {{-- @foreach ($statuses as $value => $label)
                                                <option value="{{ $value }}"
                                                    {{ $statusSelected == $value ? 'selected' : null }}>
                                                    {{ $label }}</option>
                                            @endforeach --}}
                                        </select>
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit">Apply</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="input-group mx-1">
                                        <input name="keyword" value="{{ request()->get('keyword') }}" type="search"
                                            class="form-control" placeholder="Search for contacts">
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
                            
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-condensed table-bordered  table-stripedcol text-center mx-auto">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombres</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Telefono</th>
                                <th scope="col">Mensaje</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                             @forelse ($contactenos_todo as $contacto)
                             <tr>
                                <td scope="row">{{ $contacto->id }}</td>
                                <td scope="row">{{ $contacto->nombres }}</td>
                                <td scope="row">{{ $contacto->email }}</td>
                                <td scope="row">{{ $contacto->telefono }}</td>
                                <td scope="row">{{ $contacto->consulta }}</td>
                                <td scope="row">{{ $contacto->created_at }}</td>
                                <td>
                                    <div>
                                        <!-- edit -->
                                        <a href="#"
                                            class="btn btn-sm btn-info" role="button">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <!-- delete -->
                                        <form class="d-inline formulario-eliminar" role="alert" alert-text="{{ trans('artistas.alert.delete.message.confirm', ['name' => '']) }}"
                                            action="#" method="POST">
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
            </div>
        </div>
    </div>
@endsection
