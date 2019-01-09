@extends('layouts.welcome')
@section('content')
    @guest
        <section id="products" class="section section-lg section-hero section-shaped">
            <div class="container">

                <!-- Page Heading -->
                <h1 class="my-4">Our Products</h1>
                <div class="row">
                    @foreach($products as $product)
                        <div class="col-lg-4 col-sm-6 portfolio-item">
                            <div class="card h-100">
                                <a href="#"><img class="card-img-top" src="storage/product_images/{{$product->image}}"
                                                 alt=""></a>
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
    @else

    @endguest

@endsection
  
       

