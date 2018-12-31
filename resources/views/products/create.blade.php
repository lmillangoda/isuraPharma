@extends('layouts.admin')
@section('content')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
      <div class="header-body">

      </div>
    </div>
  </div>
<div class="container">
  @if(isset($product))
    <form class="" action="{{route('products.update',['id'=>$product->id])}}" method="post" enctype="multipart/form-data">
      @method('PUT')
    <h1>Edit product details</h1>
  @else
    <form class="" action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
    <h1>Add a product</h1>
  @endif
    @csrf
      <div class="form-group">
        <label for="brandName">Brand Name</label>
        <input class="form-control" type="text" name="brandName" value="{{isset($product->brandName) ? $product->brandName : null}}" placeholder="Panadol">
      </div>
      <div class="form-group">
        <label for="medicalName">Medical Name</label>
        <input class="form-control" type="text" name="medicalName" value="{{isset($product->medicalName) ? $product->medicalName : null}}" placeholder="Paracitol">
      </div>
      <div class="form-group">
        <label for="price">Unit Price</label>
        <input class="form-control" type="text" name="price" value="{{isset($product->price) ? $product->price : null}}" placeholder="10">
      </div>
      <div class="form-group">
        <label for="image">Image</label>
        <input class="form-control-file" type="file" name="image">
      </div>

      <!-- Supplier Section -->
      @if (isset($product))
          <?php
            $idArray = array();
            foreach ($product->suppliers as $supplier){
              $idArray[] = $supplier->id;
            }
           ?>
      @endif

      <div class="checkbox">
          <label for="suppliers">Suppliers</label>
          @foreach($suppliers as $supplier)
            @if (isset($product))
              <input type="checkbox" name="suppliers[]" value="{{$supplier->id}}" {{ (in_array($supplier->id, $idArray)) ? 'checked' : null }}>
                {{$supplier->name}}
                <br>
            @else
              <input type="checkbox" name="suppliers[]" value="{{$supplier->id}}">
                {{$supplier->name}}
                <br>
            @endif
          @endforeach
      </div>

        <input class="btn btn-primary" type="submit" name="submit" value="Submit">

</div>
@endsection
