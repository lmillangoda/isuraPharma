
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Isura Pharmacies</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="{{ URL::asset('assets_w/lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="{{ URL::asset('assets_w/lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
  <link href="{{ URL::asset('assets_w/lib/animate/animate.min.css')}}" rel="stylesheet">
  <link href="{{ URL::asset('assets_w/lib/ionicons/css/ionicons.min.css')}}" rel="stylesheet">
  <link href="{{ URL::asset('assets_w/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
  <link href="{{ URL::asset('assets_w/lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="{{ URL::asset('assets_w/css/style.css')}}" rel="stylesheet">

</head>

<body>

  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container-fluid">

      <div id="logo" class="pull-left">
        <h1><a href="#intro" class="scrollto">Isura Pharmacies</a></h1>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="#intro">Intro</a></li>
          <li class="menu-active"><a href="/products">Products</a></li>
          <li class="menu-active"><a href="#footer">Contact Us</a></li>
          @guest
                          <li class="nav-item">
                              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>

          @else
                              <li><a class="nav-link" href = "/profile">Profile</a></li>
                          <li class="nav-item dropdown">
                              </i>
                              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                  {{ Auth::user()->fName }} <span class="caret"></span>
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
                      @endguest
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <!--==========================
    Intro Section
  ============================-->
  <section id="intro">
    <div class="intro-container">
      <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">

        <ol class="carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <div class="carousel-item active">
            <div class="carousel-background"><img src="{{URL::asset('assets_w/img/intro-carousel/1.jpg')}}" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>For All Your Pharmaceutical & Cosmetic Needs</h2>
                <p></p>
                <a href="/register" class="btn-get-started scrollto">Register</a>
              </div>
            </div>
          </div>

          <div class="carousel-item">
            <div class="carousel-background"><img src="{{URL::asset('assets_w/img/intro-carousel/2.jpg')}}" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>For A Professional Experience</h2>
                <p></p>
                <a href="/register" class="btn-get-started scrollto">Register</a>
              </div>
            </div>
          </div>

          <div class="carousel-item">
            <div class="carousel-background"><img src="{{URL::asset('assets_w/img/intro-carousel/3.jpg')}}" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>A Friendly Staff</h2>
                <p></p>
                <a href="/register" class="btn-get-started scrollto">Register</a>
              </div>
            </div>
          </div>

        </div>

        <a class="carousel-control-prev" href="#introCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon ion-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#introCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon ion-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

      </div>
    </div>
  </section><!-- #intro -->
  <main id="main">
    @yield('content')
  </main>
  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-6 col-md-6 footer-info">
            <h3>Isura Pharmacies (PVT) Ltd</h3>
            <p>Find the best Pharmacetical & cosmetic products at our branches. A friendly and proffesional Staff to meet all your every needs</p><br>
            <h4>Come Join Our Customer Pool<h4>
          </div>

          <div class="col-lg-6 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              A108 Adam Street <br>
              New York, NY 535022<br>
              United States <br>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br>
            </p>

            <div class="social-links">
              <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
              <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
              <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
              <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
              <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
            </div>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong></strong>. All Rights Reserved
      </div>
      <div class="credits">
        Designed by <a href=""></a>
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <div id="preloader"></div>

  <!-- JavaScript Libraries -->

  <script src="{{ URL::asset('assets_w/lib/jquery/jquery.min.js')}}"></script>
  <script src="{{ URL::asset('assets_w/lib/jquery/jquery-migrate.min.js')}}"></script>
  <script src="{{ URL::asset('assets_w/lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ URL::asset('assets_w/lib/easing/easing.min.js')}}"></script>
  <script src="{{ URL::asset('assets_w/lib/superfish/hoverIntent.js')}}"></script>
  <script src="{{ URL::asset('assets_w/lib/superfish/superfish.min.js')}}"></script>
  <script src="{{ URL::asset('assets_w/lib/wow/wow.min.js')}}"></script>
  <script src="{{ URL::asset('assets_w/lib/waypoints/waypoints.min.js')}}"></script>
  <script src="{{ URL::asset('assets_w/lib/counterup/counterup.min.js')}}"></script>
  <script src="{{ URL::asset('assets_w/lib/owlcarousel/owl.carousel.min.js')}}"></script>
  <script src="{{ URL::asset('assets_w/lib/isotope/isotope.pkgd.min.js')}}"></script>
  <script src="{{ URL::asset('assets_w/lib/lightbox/js/lightbox.min.js')}}"></script>
  <script src="{{ URL::asset('assets_w/lib/touchSwipe/jquery.touchSwipe.min.js')}}"></script>
  <!-- Contact Form JavaScript File -->
  <script src="{{ URL::asset('assets_w/contactform/contactform.js')}}"></script>

  <!-- Template Main Javascript File -->
  <script src="{{ URL::asset('assets_w/js/main.js')}}"></script>

</body>
</html>
