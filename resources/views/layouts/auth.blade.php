<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>
        Isura Pharmacies
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
          name='viewport'/>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet"/>
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="{{URL::asset('assets--/css/bootstrap.min.css')}}" rel="stylesheet"/>
    <link href="{{URL::asset('assets--/css/now-ui-kit.css?v=1.2.0')}}" rel="stylesheet"/>

</head>

<body class="login-page sidebar-collapse">
<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-default fixed-top navbar-transparent " color-on-scroll="50">
    <div class="container">
        <div class="navbar-translate">
            <a class="navbar-brand" href="/" rel="tooltip" title="Welcome" data-placement="bottom">
                Isura Pharmacies
            </a>
            <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                    aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-bar top-bar"></span>
                <span class="navbar-toggler-bar middle-bar"></span>
                <span class="navbar-toggler-bar bottom-bar"></span>
            </button>
        </div>
    </div>
</nav>
<!-- End Navbar -->
<div class="page-header">
    <div class="page-header-image" style="background-image:url({{URL::asset('assets--/img/auth.jpg)')}}"></div>
    <div class="content">
        <div class="container">
            <div class="col-md-10 ml-auto mr-auto">

                @yield('content')
            </div>
        </div>
    </div>
</div>
</div>
<footer class="footer">
    <div class="container">
        <nav>
            <ul>
                <li>
                    <a href="/">
                        Isura Pharmacies
                    </a>
                </li>
            </ul>
        </nav>
        <div class="copyright" id="copyright">
            &copy;
            <script>
                document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script>
            , Designed by
            <a href="https://www.invisionapp.com" target="_blank">Invision</a>. Coded by
            <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>.
        </div>
    </div>
</footer>
</div>
<!--   Core JS Files   -->
<script src="{{URL::asset('assets--/js/core/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('assets--/js/core/popper.min.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('assets--/js/core/bootstrap.min.js')}}" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="{{URL::asset('assets--/js/plugins/bootstrap-switch.js')}}"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="{{URL::asset('assets--/js/plugins/nouislider.min.js')}}" type="text/javascript"></script>
<!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
<script src="{{URL::asset('assets--/js/plugins/bootstrap-datepicker.js')}}" type="text/javascript"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAxkZBrDJNxRlReduc7v-z4NMvgzvNTgLw"></script>
<!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
<script src="{{URL::asset('assets--/js/now-ui-kit.js?v=1.2.0')}}" type="text/javascript"></script>
</body>

</html>
