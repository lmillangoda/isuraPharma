@extends('layouts.home')

@section('content')

  <div class="container-fluid">
      <!-- Page Heading -->
      <h1 class="my-4">Our Products</h1>
      <div class="row">
        @foreach($products as $product)
        <div class="col-xl-3">
            <div class="card" style="width: 18rem;">
              <a href="/products/{{$product->id}}">
                <img class="card-img-top" src="storage/product_images/{{$product->image}}" alt="Card image cap">
              </a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="/products/{{$product->id}}/">{{$product->medicalName}}</a>
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
</div>

@endsection