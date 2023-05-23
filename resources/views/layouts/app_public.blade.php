<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>FICHE DE CONTACT BEM</title>
  <link rel="shortcut icon" type="image/ico" href="{{ asset('favicon (2).ico') }}" >

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css') }}">

  @stack('style')

</head>

<body>
<div>
             
                      
      @yield('content')
                       
</div>
<!-- jQuery -->
<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE -->
<script src="{{asset('assets/dist/js/adminlte.js')}}"></script>


@stack('scripts')
</body>
</html>