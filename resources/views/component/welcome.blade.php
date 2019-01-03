@extends('layouts.welcome')
@section('welcome')
<div class="position-relative">
<section class="section section-lg section-hero section-shaped">
    
    <div class = "shape shape-style-1 shape-primary">
    <div id="carouselMed" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselMed" data-slide-to="0" class="active"></li>
          <li data-target="#carouselMed" data-slide-to="1" class=""></li>
          <li data-target="#carouselMed" data-slide-to="2" class=""></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="./assets/img/C1.jpg" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="./assets/img/C2.jpg" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="./assets/img/C3.jpg" alt="Third slide">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselMed" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselMed" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
</section>

</div>
<section class="section section-lg section-hero section-shaped">
    <div class="container">

        <!-- Page Heading -->
        <h1 class="my-4">Our Products</h1>
        <div class="row">
          @foreach($products as $product)
            <div class="col-lg-4 col-sm-6 portfolio-item">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="storage/product_images/{{$product->image}}" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#">{{$product->medicalName}}</a>
                  </h4>
                  <p class="card-text">Price : {{$product->price}}LKR</p>
                </div>
              </div>
            </div>
          @endforeach
        </div>
        <!-- /.row -->
      
        <!-- Pagination -->
        <ul class="pagination justify-content-center">
          <li class="page-item">
            <a class="page-link" href="#" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
              <span class="sr-only">Previous</span>
            </a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">1</a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">2</a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">3</a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
        </ul>
      
      </div>
</section>