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
                {{$products->links()}}

            </div>
        </section>
    @else

    @endguest

@endsection
  
       

