@extends('layouts.app')
@section('content')
<div class="well">
  @if(isset($product))
    {!! Form::model($product, [
      'action' => ['ProductsController@update', $product->id],
      'method' => 'PUT',
      'enctype' => 'multipart/form-data'
      ])
    !!}
    <h1>Edit product details</h1>
  @else
    {!! Form::open([
      'action' => 'ProductsController@store',
      'method' => 'POST',
      'enctype' => 'multipart/form-data'
      ])
    !!}
    <h1>Add a product</h1>
  @endif
      <div class="form-group">
        {{Form::label('brandName', 'Brand Name')}}
        {{Form::text('brandName',
        isset($product->brandName) ? $product->brandName : null,
        ['class' => 'form-control', 'placeholder' => 'Panadol'])}}
      </div>
      <div class="form-group">
        {{Form::label('medicalName', 'Medical Name')}}
        {{Form::text('medicalName',
        isset($product->medicalName) ? $product->medicalName : null,
        ['class' => 'form-control', 'placeholder' => 'Paracitamol'])}}
      </div>
      <div class="form-group">
        {{Form::label('price', 'Price')}}
        {{Form::text('price',
        isset($product->price) ? $product->price : null,
        ['class' => 'form-control', 'placeholder' => 'Rs.120'])}}
      </div>
      <div class="form-group">
        {{Form::label('image', 'Image')}}
        {{Form::file('image',   ['class' => 'form-control'])}}
      </div>

      <!-- Supplier Section -->
      <?php
          $idArray = $product->suppliers->pluck('id')->toArray();
       ?>

      <div class="checkbox">
          {{Form::label('suppliers', 'Suppliers')}}
          @foreach($suppliers as $supplier)
            @if (isset($product))
              <input type="checkbox" name="suppliers[]" value="{{$supplier->id}}" {{ (in_array($supplier->id, $idArray)) ? 'checked' : null }}>
                {{$supplier->name}}
                <br>
            @else
              <input type="checkbox" name="suppliers[]" value="{{$supplier->id}}">
                {{$supplier->name}}>
                <br>
            @endif
          @endforeach
      </div>

      <div class="">
        {{Form::submit('Submit', ['class'=> 'btn btn-primary'])}}
      </div>
    {!! Form::close() !!}
</div>
@endsection()
