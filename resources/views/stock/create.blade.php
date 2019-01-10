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
            @if (\Session::has('status'))
            <div class="alert alert-success alert-dismissible fade show">              
              <p>{{ \Session::get('status') }}</p>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>  
            </div>
            @endif
          <div class="card bg-secondary shadow">
              <div class="card-header bg-white border-0">
                <div class="row align-items-center">
                  <div class="col-12">
                    @if($batch==1)
                    <h3 class="mb-0">Update Main Stock</h3>
                    @elseif($batch==2)
                    <h3 class="mb-0">Update Backup Stock</h3>
                    @endif
                  </div>
                </div>
              </div>
              <div class="card-body">
    <div id="stock" class="">
      <p>Manage Stock for
        <br>
        Medical Name : {{$product->medicalName}}
        <br>
        Brand Name : {{$product->brandName}}
      </p>
      <br>
      for {{$branch->town}} Branch
      <br>
      <h3>Remaining Stocks : {{$amount}}</h3>
      <form id="form" class="form" action="#" method="post" onsubmit="return validateForm()">
        @method('PUT')
        @csrf
        <label for="amount">Amount : </label>
        <input id="amount" class="form-control" type="number" name="amount" value="">
        <br>
        <label for="expire">Expire Date : </label>
        <input id="expire" class="form-control" type="date" name="expire" value="{{$expDate}}">
        <br>
        <button form="form" class="btn btn-primary" formaction="{{action('StockController@update',['branch_id'=>$branch, 'product_id'=>$product, 'batch'=>$batch])}}" formenctype="multipart/form-data" formmethod="post" type="submit" name="addBtn">Add to Stock</button>
        <button form="form" class="btn btn-warning" formaction="{{action('StockController@substract',['branch_id'=>$branch, 'product_id'=>$product, 'batch'=>$batch])}}" formenctype="multipart/form-data" formmethod="post" type="submit" name="subBtn">Substract from Stock</button>
        <button form="form" class="btn btn-danger" formaction="{{action('StockController@empty',['branch_id'=>$branch, 'product_id'=>$product, 'batch'=>$batch])}}" formenctype="multipart/form-data" formmethod="post" type="submit" name="delBtn">Empty Stock</button>
      </form>



    </div>
@endsection

<script type="text/javascript">
  function validateForm()
  {
    var amount = $('#amount').val();
    if(amount<1)
    {
      alert("Please enter a valid Number!");
    }
  }
</script>
