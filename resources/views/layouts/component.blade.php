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
    <link href="{{ URL::asset('assets/vendor/nucleo/css/nucleo.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- Argon CSS -->
    <link type="text/css" href="{{URL::asset('assets/css/argon.css?v=1.0.1')}}" rel="stylesheet">

</head>

<body>

@yield('comp')

<footer class="footer has-cards" hidden>
    <div class="container container-lg">
        <div class="container">

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
<script src="{{URL::asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{URL::asset('vendor/popper/popper.min.js')}}"></script>
<script src="{{URL::asset('vendor/bootstrap/bootstrap.min.js')}}"></script>
<script src="{{URL::asset('vendor/headroom/headroom.min.js')}}"></script>
<!-- Optional JS -->
<script src="{{URL::asset('vendor/onscreen/onscreen.min.js')}}"></script>
<script src="{{URL::asset('vendor/nouislider/js/nouislider.min.js')}}"></script>
<script src="{{URL::asset('vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
<!-- Argon JS -->
<script src="{{URL::asset('js/argon.js?v=1.0.1')}}"></script>
</body>

</html>
