@extends('layouts.admin')

@section('content')
  <div class="container">
    <table class="table align-items-center table-dark table-flush">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Product</th>
          <th scope="col">Unit Price</th>
          <th scope="col">Amount</th>
          <th scope="col">Cost</th>
       </tr>
      </thead>
      <tbody>
        @foreach($products as $product)
        <tr>
          <td>{{$product->id}}</td>
          <td>{{$product->medicalName}}</td>
          <td>{{$product->price}}</td>
          <td>{{$product->pivot->amount}}</td>
          <td>{{$product->pivot->cost}}</td>
      </tr>
        @endforeach
      </tbody>
  </div>
@endsection