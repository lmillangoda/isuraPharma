@extends('layouts.app')

@section('content')
<!-- Page Content -->
    <div class="container">

      <!-- <div class="row">

        <div class="col-lg-3">
          <h1 class="my-4">Shop Name</h1>
          <div class="list-group">
            <a href="#" class="list-group-item active">Category 1</a>
            <a href="#" class="list-group-item">Category 2</a>
            <a href="#" class="list-group-item">Category 3</a>
          </div>
        </div> -->
        <!-- /.col-lg-3 -->

        <!-- <div class="col-lg-9"> -->

          <div class="card mt-4">
            <img class="card-img-top img-fluid" src="/storage/product_images/{{$product->image}}" alt="Image for {{$product->medicalName}}">
            <div class="card-body">
              <h3 class="card-title">Medical Name : {{$product->medicalName}}</h3>
              <h4>Maximum retail price : {{$product->price}}LKR</h4>

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

        <!-- </div> -->
        <!-- /.col-lg-9 -->

      </div>

    </div>
    <!-- /.container -->
@endsection
