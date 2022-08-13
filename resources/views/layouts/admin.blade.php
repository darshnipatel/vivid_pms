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
    <link rel="stylesheet" href="{{asset('/css/image-uploader.min.css')}}">
    <!-- Scripts -->
   
    <script src="{{asset('/js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('/js/custom-js.js')}}"></script>
    <script src="{{asset('/js/image-uploader.min.js')}}"></script>
</head>
  <body>

  <!-- new header -->
  <div class="new-header-bacimge">
    <header class="pms-new-header">

      <div class="pms-newheader-topline">
        <div class="container">
          <div class="row">
            <div class="col-md-2">
              <div class="pms-header-logo">
                <a href="index.html">
                  <img src="{{ asset('/images/Logo.svg') }}" alt="Vivid Web Solution" />
                </a>
              </div>
            </div>
            <div class="col-md-2">
              <div class="logout_div">
                <a href="{{ route('logout') }}" class="logout_btn"  onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                  <img src="{{asset('/images/switch.png')}}" alt="logout">
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
              </div>
              <div class="pms-header-user pull-right">
                <a href="javascript:void(0);">
                  <img src="../images/tabs-2.jpg" alt="user" />
                  <div class="pms-header-user-info new-header-usename">
                    <label>{{ Auth::guard('admin')->user()->name }}</label>
                    <span>Web Designer</span>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="custom_nav">
        <div class="container">
          <nav class="navbar navbar-expand-lg navbar-light">
      
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link active" href="{{ route('admindashboard') }}">Dashboard</a>
                </li> 
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('project.index') }}">Add Project</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('holidays.index') }}">Holidays</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('leave.index')}}">Leave</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="Leave.html">Employees</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="attendance.html">Attendance</a>
                </li> 
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('client.index') }}">Client</a>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </header>
  </div>
  <section class="defult-pagesection">
        @yield('content')
  </scetion>
  
<footer class="site-footer">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <p class="text-center">© 2022 VIVID WEB SOLUTION</p>
      </div>
    </div>
  </div>
</footer>

</body>
</html>