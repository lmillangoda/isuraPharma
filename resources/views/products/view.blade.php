@extends('layouts.admin')

@section('content')
<div class="header bg-gradient-default pb-5 pt-5 pt-md-5">
    <div class="container-fluid">
      <div class="header-body">

      </div>
    </div>
  </div>
<!-- Page Content -->
<div class="section">
  <div class="container col-5">
      <div class="card bg-secondary shadow">
          <div class="card-header bg-white border-0">
            <div class="row justify-content-center">
              <div class="col-5">
                <h3 class="mb-0">Product Details</h3>
              </div>
            </div>
          </div>
          <div class="card mt-4">
            <div class="card-body">
            
            <img class="card-img-top img-fluid" src="/storage/product_images/{{$product->image}}" alt="Image for {{$product->medicalName}}">
              <h3 class="card-title">Medical Name : {{$product->medicalName}}</h3>
              <h4>Maximum retail price : {{$product->price}}LKR</h4>
            </div>
          </div>
        </div>
      </div>
      <div class="container col-11">
              <!-- Suppliers Table -->
              <h3>Suppliers' Details</h3>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">email</th>
                    <th scope="col">telephone</th>
                  </tr>
                </thead>

                <!-- Get all the corresponding suppliers -->

                <tbody>
                  @foreach($suppliers as $supplier)
                  <tr>
                    <th scope="row">{{$supplier->id}}</th>
                    <td>{{$supplier->name}}</td>
                    <td>{{$supplier->email}}</td>
                    <td>{{$supplier->telephone}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <!-- End of table -->

              <!-- Stock Details Table -->
              <h3>Stock Details</h3>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Branch</th>
                    <th scope="col">Expire Date</th>
                    <th scope="col">Remaining Stock</th>
                    <th scope="col">Last Stock Update</th>
                  </tr>
                </thead>

                <tbody>
                  @foreach($branches as $branch)
                  <tr>
                    <th scope="row">{{$branch->id}}</th>
                    <td>{{$branch->town}}</td>
                    <td>{{$branch->pivot->expDate}}</td>
                    <td>{{$branch->pivot->amount}}</td>
                    <td>{{$branch->pivot->updated_at}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <!-- End of table -->
            </div>
            </div>
    <!-- /.container -->
@endsection
