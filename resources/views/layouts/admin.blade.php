<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Admin Dashboard</title>

<<<<<<< HEAD
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="{{URL::asset('assets-dash/vendor/nucleo/css/nucleo.css')}}" rel="stylesheet">
  <link href="{{URL::asset('assets-dash/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="{{URL::asset('assets-dash/css/argon.css?v=1.0.0')}}" rel ="stylesheet">
</head>

<body>
<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-dark bg-dark" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-brand pt-0" href="admin">
        <img src="{{URL::asset('assets-dash/img/theme/isura.jpg')}}" class="navbar-brand-img" alt="..."><br>
        Isura Pharmacies
      </a>
      <!-- User -->
      <ul class="nav align-items-center d-md-none">
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              <span>
                <i class="ni ni-button-power text-orange"></i>
              </span>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <div class=" dropdown-header noti-title">
              <h6 class="text-overflow m-0">Goodbye!</h6>
            </div>
            <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="ni ni-user-run"></i>
                            Logout
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
            </a>
          </div>
        </li>
      </ul>
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="admin">
                <img src="{{URL::asset('assets-dash/img/theme/isura.jpg')}}">
              </a>

            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>

        <!-- Navigation -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="/admin">
              <i class="ni ni-tv-2 text-primary"></i> Dashboard
            </a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="/admin/profile">
                <i class="ni ni-circle-08 text-orange"></i> Profile
              </a>
            </li>
          <li class="nav-item">
            <a class="nav-link" href="/products">
              <i class="ni ni-bag-17 text-orange"></i> Products
            </a>
          </li>

            <li class="nav-item">
                <a class="nav-link" href="/branches">
                  <i class="ni ni-building text-orange"></i> Branches
                </a>
              </li>

              <li class="nav-item">
                  <a class="nav-link" href="/suppliers">
                    <i class="ni ni-ambulance text-orange"></i> Suppliers
                  </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/employees">
                      <i class="ni ni-ambulance text-orange"></i> Employees
                    </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="/bills/create">
                        <i class="ni ni-money-coins text-orange"></i> Billing
                      </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/reports">
                          <i class="ni ni-money-coins text-orange"></i> Reports
                        </a>
                      </li>
                          <li class="nav-item">
                              <a class="nav-link" href="/warnings">
                                <i class="ni ni-money-coins text-orange"></i> Warnings
                                <span class="badge badge-warning"> 4 </span>
                              </a>
                            </li>
        </ul>
        <!-- Divider -->
        <hr class="my-3">
        <!-- Heading -->
        <h6 class="navbar-heading text-muted">Documentation</h6>
        <!-- Navigation -->
        <ul class="navbar-nav mb-md-3">
          <li class="nav-item">
            <a class="nav-link" href="">
              <i class="ni ni-spaceship"></i> Getting started
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content">
    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="admin"></a>
        <!-- Form -->
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span>
                  <i class="ni ni-button-power text-orange"></i>
                </span>
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold">{{ Auth::user()->fName }}</span>
                </div>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">Goodbye!</h6>
              </div>
              <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <i class="ni ni-user-run"></i>
                <span>Logout</span>
              </a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
@yield('content')

</div>

<!-- Argon Scripts -->
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
