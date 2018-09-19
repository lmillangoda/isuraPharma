<nav class="navbar navbar-expand-md navbar-dark bg-dark">
   
      <a class="navbar-brand" href="#">Isura Pharmacies</a>
  
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample04">

        <ul class="navbar-nav mr-auto">
    
                @if (Route::has('login'))
                        @auth
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ url('/home') }}">Dashboard<span class="sr-only">(current)</span></a>
                        </li>
                        @else
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('login') }}">Login<span class="sr-only">(current)</span></a>
                        </li>
                            <li class="nav-item active">
                            <a class="nav-link" href="{{ route('register') }}">Register<span class="sr-only">(current)</span></a>
                            </li>
                        @endauth
                    @endif
          <li class="nav-item active">
            <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/branches">Find Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/products">Products</a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
          </li> -->
          <!-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="https://example.com" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
            <div class="dropdown-menu" aria-labelledby="dropdown04">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li> -->
        </ul>
        <form class="form-inline my-2 my-md-0">
          <input class="form-control" type="text" placeholder="Search">
        </form>
      </div>
    </nav>
