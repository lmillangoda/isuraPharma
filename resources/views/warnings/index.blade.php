@extends('layouts.admin')
@section('content')

<div class="header bg-gradient-default pb-5 pt-5 pt-md-5">
  <div class="container-fluid">
    <div class="header-body">

    </div>
  </div>
</div>

<div class="container">
    <div class="row mt-5">
  @for($i=0; $i<sizeof($warnings); $i++)
  <div class="col-lg-4 col-sm-6 portfolio-item">
    <div class="alert alert-default" role="alert">
      <p>Branch : {{$warnings[$i]['branch']->town}}</p>
      <p>Product : {{$warnings[$i]['product']->medicalName}}</p>
      <p>Reorder Level : {{$warnings[$i]['product']->reorder_level}}</p>
      <p>Currently Available : {{$warnings[$i]['available']}}</p>
      <a class="btn btn-sm btn-danger" href="{{route('products.show',['product'=>$warnings[$i]['product']])}}">View Suppliers</a>
      <a class="btn btn-sm btn-danger" href="{{route('stock.edit',['product'=>$warnings[$i]['product'], 'branch'=>$warnings[$i]['branch'], 'batch'=>2])}}">Update Backup Stocks</a>
    </div>
  </div>
  @endfor
  </div>
@endsection
