@extends('layouts.auth')

@section('title')
    Login
@endsection

@section('content')
    <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="login100-form-avatar">
            <img src="{{ asset('vendor/my-auth/images/logo-login.png') }}" alt="AVATAR">
        </div>

        <span class="login100-form-title p-t-10 p-b-35">
            @yield('title')
        </span>

        <div class="wrap-input100 validate-input m-b-10">
            <input name="email" value="{{ old('email') }}" class="input100 @error('email') is-invalid @enderror" id="email" type="text" placeholder="Nombre de Usuario o Correo" autocomplete="Nombre de Usuario o Email"/>

            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <span class="focus-input100"></span>
            <span class="symbol-input100">
                <i class="fa fa-user"></i>
            </span>
        </div>

        <div class="wrap-input100 validate-input m-b-10">
             <input name="password" class="input100 @error('password') is-invalid @enderror" id="password" type="password" placeholder="Enter password" autocomplete="current-password" />

              @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
              @enderror

            <span class="focus-input100"></span>
            <span class="symbol-input100">
                <i class="fa fa-lock"></i>
            </span>
        </div>

        <div class="container-login100-form-btn p-t-10">
            <button type="submit" class="login100-form-btn">
                Login
            </button>
        </div>

        <div class="text-center w-full p-t-25 p-b-230">
            <a href="#" class="txt1">
                ¿Olvidaste tu Password?
            </a>
        </div>
    @endsection
