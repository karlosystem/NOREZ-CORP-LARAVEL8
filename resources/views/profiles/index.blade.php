@extends('layouts.dashboard')

@section('title')
    Profile
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('profiles') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row d-flex align-items-stretch">
                        <div class="col-md-6">
                            <form action="{{ route('profiles.store') }}" method="POST">
                                @csrf
                                @method('PUT')
                                <!-- Telefono -->
                                <div class="form-group">
                                    <label for="input_profile_celular" class="font-weight-bold">
                                        Celular
                                    </label>
                                    <input id="input_profile_celular" value="{{ old('celular') }}" name="celular"
                                        type="text" class="form-control @error('celular') is-invalid @enderror"
                                        placeholder="celular" />
                                    @error('celular')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!-- email -->
                                <div class="form-group">
                                    <label for="input_profile_name" class="font-weight-bold">
                                        Email
                                    </label>
                                    <input id="input_profile_email" value="{{ old('email') }}" name="email"
                                        type="text" class="form-control @error('email') is-invalid @enderror"
                                        placeholder="Email" />
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!-- whastapp -->
                                <div class="form-group">
                                    <label for="input_profile_name" class="font-weight-bold">
                                        Whastapp
                                    </label>
                                    <input id="input_profile_whastapp" value="{{ old('whastapp') }}" name="whastapp"
                                        type="text" class="form-control @error('whastapp') is-invalid @enderror"
                                        placeholder="whastapp" />
                                    @error('whastapp')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!-- Facebook -->
                                <div class="form-group">
                                    <label for="input_profile_name" class="font-weight-bold">
                                        Facebook
                                    </label>
                                    <input id="input_profile_facebook" value="{{ old('facebook') }}" name="facebook"
                                        type="text" class="form-control @error('facebook') is-invalid @enderror"
                                        placeholder="Facebook" />
                                    @error('facebook')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!-- TikTok -->
                                <div class="form-group">
                                    <label for="input_profile_name" class="font-weight-bold">
                                        TikTok
                                    </label>
                                    <input id="input_profile_tiktok" value="{{ old('tiktok') }}" name="tiktok"
                                        type="text" class="form-control @error('tiktok') is-invalid @enderror"
                                        placeholder="Tiktok" />
                                    @error('tiktok')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!-- Youtube -->
                                <div class="form-group">
                                    <label for="input_profile_name" class="font-weight-bold">
                                        Youtube
                                    </label>
                                    <input id="input_profile_youtube" value="{{ old('youtube') }}" name="youtube"
                                        type="text" class="form-control @error('youtube') is-invalid @enderror"
                                        placeholder="youtube" />
                                    @error('youtube')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="float-right">
                                <a class="btn btn-warning px-4" href="{{ route('profiles.index') }}">Back</a>
                                <button type="submit" class="btn btn-primary px-4">
                                    Save
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
