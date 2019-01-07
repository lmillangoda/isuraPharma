@extends('layouts.admin')
@section('content')
<div class="header bg-gradient-default pb-5 pt-5 pt-md-5">
    <div class="container-fluid">
      <div class="header-body">

      </div>
    </div>
  </div>
  <div class="section">
      <div class="container fluid">
          <div class="card bg-secondary shadow">
              <div class="card-header bg-white border-0">
                <div class="row align-items-center">
                  <div class="col-12">
                    <h3 class="mb-0">Add New Stock</h3>
                  </div>
                </div>
              </div>
              <div class="card-body">
    <div id="stock" class="">
      Manage Stock for {{$product->medicalName}}
      <br>
      for {{$branch->town}} Branch
      <br>
      <h3>Remaining Stocks : {{$amount}}</h3>
      <form id="form" class="form" action="#" method="post">
        @method('PUT')
        @csrf
        <label for="amount">Amount : </label>
        <input class="form-control" type="text" name="amount" value="">
        <br>
        <label for="expire">Expire Date : </label>
        <input class="form-control" type="date" name="expire" value="{{$expDate}}">
        <button form="form" class="btn btn-primary" formaction="{{action('StockController@update',['branch_id'=>$branch, 'product_id'=>$product])}}" formenctype="multipart/form-data" formmethod="post" type="submit" name="addBtn">Add to Stock</button>
        <button form="form" class="btn btn-warning" formaction="{{action('StockController@substract',['branch_id'=>$branch, 'product_id'=>$product])}}" formenctype="multipart/form-data" formmethod="post" type="submit" name="subBtn">Substract from Stock</button>
      </form>
      <form class="delete" action="{{route('stock.delete',['branch_id'=>$branch, 'product_id'=>$product])}}" method="post">
        @csrf
        @method('delete')
        <input class="btn btn-danger" type="submit" name="delete" value="Empty Stock">
      </form>
    </div>
  </div>
</div>
</div>
</div>
@endsection
