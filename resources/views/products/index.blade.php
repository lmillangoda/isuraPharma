@extends('layouts.admin')

@section('content')
<div class="header bg-gradient-default pb-6 pt-5 pt-md-6">
    <div class="container-fluid">
      <div class="header-body">
          <center><a href = "products/create"><button  class="btn btn-danger">Add New Product</button></a></center>
      </div>
    </div>
  </div>
  <div class="container-fluid">
      <!-- Page Heading -->
      <h1 class="my-4">Our Products</h1>
      <div class="row">
        @foreach($products as $product)
        <div class="col-xl-4">
            <div class="card" style="width: 18rem;">
              <a href="/products/{{$product->id}}">
                <img class="card-img-top" src="storage/product_images/{{$product->image}}" alt="Card image cap">
              </a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="/products/{{$product->id}}/">{{$product->medicalName}}</a>
                </h4>
                <p class="card-text">Price : {{$product->price}}LKR</p>
                <div class= "row">
                  <div class = "col-8">
                    <a href="/products/{{$product->id}}/edit" class="btn btn-primary">Edit</a>
                  </div>
                  <div>
                    {!! Form::open(['action' => ['ProductsController@destroy', $product->id],'method' => 'POST', 'class' => 'pull-right'])!!}
                    {{  Form::hidden('_method', 'DELETE')}}
                    {{  Form::Submit('Delete', ['class' => 'btn btn-danger'])}}
                    {!! Form::close() !!}
                  </div>
                </div>
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

@endsection
