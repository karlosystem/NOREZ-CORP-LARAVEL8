@extends('layouts.dashboard')

@section('title')
    {{ trans('roles.title.edit') }}
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('edit_role', $role) }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form action="{{ route('roles.update', ['role' => $role]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="input_role_name" class="font-weight-bold">
                                Role name
                            </label>
                            <input id="input_role_name" value="{{ old('name', $role->name) }}" name="name"
                                type="text" class="form-control @error('name') is-invalid @enderror" />
                            @error('name')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!-- permission -->
                        <div class="form-group">
                            <label for="input_role_permission" class="font-weight-bold">
                                permission
                            </label>
                            <div class="form-control overflow-auto h-100 @error('permissions') is-invalid @enderror"
                                id="input_role_permission">
                                <div class="row">
                                    @foreach ($authorities as $manageName => $permissions)
                                        <!-- list manage name:start -->
                                        <ul class="list-group mx-1">
                                            <li class="list-group-item bg-dark text-white">
                                                {{ trans("permissions.{$manageName}") }}
                                            </li>
                                            @foreach ($permissions as $permission)
                                                <!-- list permission:start -->
                                                <li class="list-group-item">
                                                    <div class="form-check">
                                                        @if (old('permissions', $permissionChecked))
                                                            <input id="{{ $permission }}" class="form-check-input"
                                                                type="checkbox" name="permissions[]"
                                                                value="{{ $permission }}"
                                                                {{ in_array($permission, old('permissions', $permissionChecked)) ? 'checked' : null }}>
                                                        @else
                                                            <input id="{{ $permission }}" class="form-check-input"
                                                                type="checkbox" name="permissions[]"
                                                                value="{{ $permission }}">
                                                        @endif

                                                        <label for="{{ $permission }}" class="form-check-label">
                                                            {{ trans("permissions.{$permission}") }}
                                                        </label>
                                                    </div>
                                                </li>
                                                <!-- list permission:end -->
                                            @endforeach
                                        </ul>
                                        <!-- list manage name:end  -->
                                    @endforeach
                                </div>
                            </div>
                            @error('permissions')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="float-right mb-4">
                            <a class="btn btn-warning px-4 mx-2" href="{{ route('roles.index') }}">
                                Back
                            </a>
                            <button type="submit" class="btn btn-primary px-4">
                                Edit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
