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
    <link href="./assets-dash/vendor/nucleo/css/nucleo.css" rel="stylesheet">
    <link href="./assets-dash/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <!-- Argon CSS -->
    <link type="text/css" href="./assets-dash/css/argon.css?v=1.0.0" rel="stylesheet">

  </head>
  
  <body>
    <header class="header-global">
      <nav id="navbar-main" class="navbar navbar-main navbar-expand-lg navbar-transparent navbar-light headroom">
        <div class="container">
          <a class="navbar-brand mr-lg-5" href="./">
            Isura Pharmacies
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="navbar-collapse collapse" id="navbar_global">
            <div class="navbar-collapse-header">
              <div class="row">
                <div class="col-6 collapse-brand">
                  Isura Pharmacies
                </div>
                <div class="col-6 collapse-close">
                  <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                    <span></span>
                    <span></span>
                  </button>
                </div>
              </div>
            </div>
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item d-none d-lg-block ml-lg-4">
                        <a href="" target="_blank" class="btn btn-neutral btn-icon">
                          <span class="btn-inner--icon">
                            <i class="fa fa-cloud-download mr-2"></i>
                          </span>
                          <span class="nav-link-inner--text">Download App</span>
                        </a>
                      </li>
                </ul>
    
                <!-- Right Side Of Navbar -->
                
                    <!-- Authentication Links -->
        @guest
        <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
          </li>
          </ul>
        @else
            
        
        <ul class="navbar-nav ml-auto">
            <li><a class="nav-link" href = "/home">Home</a></li>
                        <li class="nav-item dropdown">
                            
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
    
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
    
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
          </li>
        </ul>
        
                    @endguest
          </div>

        </div>
      </nav>
  
    </header>
    <main>

          <!-- SVG separator -->
          <div class="separator separator-bottom separator-skew zindex-100">
            <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
              <polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
            </svg>
          </div>

        </section>
      </div>

      @yield('content')
     
    </main>
    <footer class="footer has-cards">
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
    <script src="./assets-dash/vendor/jquery/dist/jquery.min.js"></script>
    <script src="./assets-dash/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Optional JS -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAxkZBrDJNxRlReduc7v-z4NMvgzvNTgLw "></script>
    <!-- Argon JS -->
    <script src="./assets-dash/js/argon.js?v=1.0.0"></script>
  </body>
  
  
  </html>