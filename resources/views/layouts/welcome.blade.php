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
    <link type="text/css" href="{{URL::asset('assets-dash/css/argon.css?v=1.0.0')}}" rel="stylesheet">

  </head>
  <style>
      
  </style>
  <body>

    @yield('welcome')
    <footer class="footer has-cards" hidden>
      <div class="container container-lg">
      <div class="container">
          <div class="row">
              <div class="col">
                <div class="card shadow border-0">
                  <div id="map-canvas" class="map-canvas" data-lat="7.0316" data-lng="79.9222" style="height: 400px;"></div>
                </div>
              </div>
            </div>
        <div class="row row-grid align-items-center my-md">
          <div class="col-lg-6">
            <h3 class="text-primary font-weight-light mb-2">Thank you for supporting us!</h3>
            <h4 class="mb-0 font-weight-light">Come Join Our Customer Pool.</h4>
          </div>
        </div>
        <hr>
        <div class="row align-items-center justify-content-md-between">
          <div class="col-md-6">
            <div class="copyright">
              &copy; 2018
              <a>Isura Pharmacies (PVT) Ltd</a>.
            </div>
          </div>
        </div>
      </div>
    </div>
    </footer>

    <!-- Core -->
    <script src="{{URL::asset('assets-dash/vendor/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{URL::asset('assets-dash/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Optional JS -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAxkZBrDJNxRlReduc7v-z4NMvgzvNTgLw "></script>
    <!-- Argon JS -->
    <script src="{{URL::asset('assets-dash/js/argon.js?v=1.0.0')}}"></script>
  
  </body>
  
  
  </html>