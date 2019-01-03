@extends('layouts.admin')   
@section('content')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
      <div class="header-body">

      </div>
    </div>
  </div>
  <div class="container">
    <div id="stock" class="">
      Manage Stock for {{$product->medicalName}}
      <br>
      for {{$branch->town}} Branch
      <br>
      <h3>Remaining Stocks : {{$product->pivot->amount}}</h3>
      <form id="form" class="form" action="#" method="post">
        @method('PUT')
        @csrf
        <label for="amount">Amount : </label>
        <input class="form-control" type="text" name="amount" value="">
        <br>
        <label for="expire">Expire Date : </label>
        <input class="form-control" type="date" name="expire" value="{{$product->pivot->expDate}}">
        <button form="form" class="btn btn-primary" formaction="{{action('StockController@update',['branch_id'=>$branch, 'product_id'=>$product])}}" formenctype="multipart/form-data" formmethod="post" type="submit" name="addBtn">Add to Stock</button>
        <button form="form" class="btn btn-warning" formaction="{{action('StockController@substract',['branch_id'=>$branch, 'product_id'=>$product])}}" formenctype="multipart/form-data" formmethod="post" type="submit" name="subBtn">Substract from Stock</button>
      </form>
    </div>
  </div>
@endsection
