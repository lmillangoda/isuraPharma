@extends('layouts.app')
@section('content')
  <div class="container">
    <form class="form" action="#" method="post" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <div class="col-md-2">
          <label for="product_id">Product ID</label>
        </div>
        <div class="col-md-2">
          <input id='product' type="text" name="product_id" value="">
        </div>
        <div class="col-md-2">
          <label for="">Amount</label>
        </div>
        <div class="col-md-2">
          <input id='amount' type="text" name="amount" value="">
        </div>
        <div class="col-md-3">
          <button class="btn btn-primary" type="button" onclick="displayBill(document.getElementById('product').value,document.getElementById('amount').value)" name="add">Add to Bill</button>
        </div>
      </div>
    </form>
  </div>
@endsection

<script type="text/javascript">
  function displayBill(product_id, amount)
  {
    // console.log(product_id, amount);
    $.ajax({
      url: "{{route('bill.display')}}",
      method: 'GET',
      data: {amount:amount},
      dataType: 'json',
    })
  }
</script>
