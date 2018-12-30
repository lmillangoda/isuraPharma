@extends('layouts.app')

@section('content')
<?php echo url()->current(); ?>

<!-- Stock Details -->
<div class="stock container">
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Medical Name</th>
        <th scope="col">Brand Name</th>
        <th scope="col">Expire Date</th>
        <th scope="col">Remaining Stock</th>
        <th scope="col">Last Stock Update</th>
      </tr>
    </thead>
    @foreach($products as $product)
      <tr>
        <th scope="row">1</th>
        <td>{{$product->medicalName}}</td>
        <td>{{$product->brandName}}</td>
        <td>{{$product->pivot->expDate}}</td>
        <td>{{$product->pivot->amount}}</td>
        <td>{{$product->pivot->updated_at}}</td>
        <td>
          <a class="btn btn-primary" href="{{route('stock.edit',['branch'=>$branch, 'product'=>$product])}}">Update Stock</a>
        </td>
      </tr>
    @endforeach
  </table>
</div>
@endsection
