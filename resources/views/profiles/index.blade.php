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
                    <form action="{{ route('profiles.update', ['profile' => $profile]) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">

                            <!-- ========== CONTACTO ========== -->

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Celular</label>
                                    <input name="mobile" type="text" value="{{ old('mobile', $profile->mobile ?? '') }}"
                                        class="form-control form-control-sm @error('mobile') is-invalid @enderror">
                                    @error('mobile')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">WhatsApp</label>
                                    <input name="whastapp" type="text"
                                        value="{{ old('whastapp', $profile->whastapp ?? '') }}"
                                        class="form-control form-control-sm @error('whastapp') is-invalid @enderror">
                                    @error('whastapp')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Email</label>
                                    <input name="email" type="email" value="{{ old('email', $profile->email ?? '') }}"
                                        class="form-control form-control-sm @error('email') is-invalid @enderror">
                                    @error('email')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>

                            <!-- ========== UBICACIÓN ========== -->

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Dirección</label>
                                    <input name="direccion" type="text"
                                        value="{{ old('direccion', $profile->direccion ?? '') }}"
                                        class="form-control form-control-sm @error('direccion') is-invalid @enderror">
                                    @error('direccion')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Ciudad</label>
                                    <input name="city" type="text" value="{{ old('city', $profile->city ?? '') }}"
                                        class="form-control form-control-sm @error('city') is-invalid @enderror">
                                    @error('city')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>

                            <!-- ========== PRESENCIA DIGITAL ========== -->

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Web</label>
                                    <input name="web" type="text" value="{{ old('web', $profile->web ?? '') }}"
                                        class="form-control form-control-sm @error('web') is-invalid @enderror">
                                    @error('web')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Facebook</label>
                                    <input name="facebook" type="text"
                                        value="{{ old('facebook', $profile->facebook ?? '') }}"
                                        class="form-control form-control-sm @error('facebook') is-invalid @enderror">
                                    @error('facebook')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">TikTok</label>
                                    <input name="tiktok" type="text"
                                        value="{{ old('tiktok', $profile->tiktok ?? '') }}"
                                        class="form-control form-control-sm @error('tiktok') is-invalid @enderror">
                                    @error('tiktok')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">YouTube</label>
                                    <input name="youtube" type="text"
                                        value="{{ old('youtube', $profile->youtube ?? '') }}"
                                        class="form-control form-control-sm @error('youtube') is-invalid @enderror">
                                    @error('youtube')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <!-- ========== BOTONES ========== -->

                        <div class="row mt-3">
                            <div class="col-md-12 text-right">
                                <a href="{{ route('profiles.index') }}" class="btn btn-warning px-4">
                                    Volver
                                </a>
                                <button type="submit" class="btn btn-primary px-4">
                                    Actualizar
                                </button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
