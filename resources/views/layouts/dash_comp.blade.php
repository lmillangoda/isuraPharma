<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
      <meta charset="utf-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Isura Pharmacies</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="{{URL::asset('assets-dash/vendor/nucleo/css/nucleo.css')}}" rel="stylesheet">
  <link href="{{URL::asset('assets-dash/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="{{URL::asset('assets-dash/css/argon.css?v=1.0.0" rel=')}}" rel ="stylesheet">
</head>

<body>
   
    @yield('content')
 
  <!-- Core -->
  <script src="{{URL::asset('assets-dash/vendor/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{URL::asset('assets-dash/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <!-- Optional JS -->
  <script src="{{URL::asset('assets-dash/vendor/chart.js/dist/Chart.min.js')}}"></script>
  <script src="{{URL::asset('assets-dash/vendor/chart.js/dist/Chart.extension.js')}}"></script>
  <!-- Argon JS -->
  <script src="{{URL::asset('assets-dash/js/argon.js?v=1.0.0')}}"></script>
</body>

</html>