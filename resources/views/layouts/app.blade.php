<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/bootstrap-datepicker.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
    <!-- Scripts -->
   
    <script src="{{asset('/js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('/js/custom-js.js')}}"></script>

</head>
  
<body class="pms-bg-type-1">

<section class="pms-login">
    <div class="pms-login-wrapper">
        <div class="pms-login-from">
        
            <div class="auth-logo-box text-center">
                <img src="{{ asset('/images/Logo.svg') }}" alt="logo" />
            </div>  
            @yield('content')
        </div>
    </div>
</section>



</body>
</html>
