<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>FICHE DE CONTACT BEM</title>
  <link rel="shortcut icon" type="image/ico" href="{{ asset('favicon (2).ico') }}" >
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- IonIcons -->
   {{-- <script src="{{ asset('assets/script.js') }}"></script> --}}
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css') }}">

  @stack('style')

</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">
                <div class="preloader flex-column justify-content-center align-items-center">
                  <img class="animation__shake" src="{{ asset('img/logo.png') }}" alt="BEM" height="60" width="60">
                </div>
                  @include("./layouts/navbar") 
                  @include("./layouts/sidbar")
                <div class="content-wrapper">
             
                    <div class="content">
                        <div class="container-fluid">
                          @if(Session::has('success'))
                            <p class="alert alert-success">{{ Session::get('success') }}</p>
                          @endif
                          @if(Session::has('error'))
                          <p class="alert alert-danger">{{ Session::get('error') }}</p>
                          @endif
                           @yield('content')
                        </div>
                    </div>
                </div>
</div>
<!-- jQuery -->
<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/plugins/chart.js/Chart.min.js')}}"></script>
<!-- AdminLTE -->
<script src="{{asset('assets/dist/js/adminlte.js')}}"></script>


<!-- AdminLTE for demo purposes -->
<script src="{{asset('assets/dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('assets/dist/js/pages/dashboard3.js')}}"></script>

@stack('scripts')
</body>
</html>