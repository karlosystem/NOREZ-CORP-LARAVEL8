<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
   <meta charset="utf-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
   <title>{{ config('app.name')}} - @yield('title')</title>
   <link rel="stylesheet" href="{{ asset('vendor/my-auth/css/bootstrap.min.css')}}">
   <link rel="stylesheet" href="{{ asset('vendor/my-auth/css/main.css')}}">
   <link rel="stylesheet" href="{{ asset('vendor/my-auth/css/util.css')}}">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
   
   <div class="limiter">
      <div class="container-login100" style="background-image: url('{{ asset('vendor/my-auth/images/img-01.jpg') }}')">
         <div class="wrap-login100 p-t-190 p-b-30">
            @yield('content')
         </div>
      </div>
   </div>

   <script src="{{asset('vendor/jquery/jquery-3.6.0.min.js')}}"></script>
   <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
   <script src="{{asset('vendor/my-auth/js/auth.js')}}"></script>

</body>

</html>
