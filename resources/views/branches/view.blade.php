@extends('layouts.admin')

@section('content')

<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
      <div class="header-body">

      </div>
    </div>
  </div>

<!-- Stock Details -->
<div class="stock container">
    <div class="row mt-5">
        <div class="col">
          <div class="card bg-default shadow">
            <div class="card-header bg-transparent border-0">
              <h3 class="text-white mb-0">Employee Table</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-dark table-flush">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Medical Name</th>
                    <th scope="col">Brand Name</th>
                    <th scope="col">Expire Date</th>
                    <th scope="col">Remaining Stock</th>
                    <th scope="col">Last Stock Update</th>
                  </tr>
                </thead>
              @foreach($products as $product)
              <tbody>
              <th scope="row">1</th>
              <td>{{$product->medicalName}}</td>
              <td>{{$product->brandName}}</td>
              <td>{{$product->pivot->expDate}}</td>
              <td>{{$product->pivot->amount}}</td>
              <td>{{$product->pivot->updated_at}}</td>
              <td>
                <a class="btn btn-primary" href="{{route('stock.edit',['branch'=>$branch, 'product'=>$product])}}">Update Stock</a>
              </td>
              </tbody>
                @endforeach
                </table>
</div>
</div>
</div>
</div>
</div>
@endsection
