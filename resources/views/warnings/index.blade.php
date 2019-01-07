@extends('layouts.admin')
@section('content')

<div class="container">
  @for($i=0; $i<sizeof($warnings); $i++)
    <div class="alert alert-warning" role="alert">
      <p>Branch : {{$warnings[$i]['branch']->town}}</p>
      <p>Product : {{$warnings[$i]['product']->medicalName}}</p>
      <p>Reorder Level : {{$warnings[$i]['product']->reorder_level}}</p>
      <p>Currently Available : {{$warnings[$i]['available']}}</p>
      <a class="btn btn-primary" href="{{route('products.show',['product'=>$warnings[$i]['product']])}}">View Suppliers</a>
      <a class="btn btn-primary" href="{{route('backup_stock.create',['product'=>$warnings[$i]['product'], 'branch'=>$warnings[$i]['branch']])}}">Update Backup Stocks</a>
    </div>
  @endfor
  </div>
@endsection
