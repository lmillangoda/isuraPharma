@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="alert alert-dark">
          <p class="text-right">Cashier : {{Auth::user()->fName}}</p>
          <p class="text-right">Time : {{date("Y-m-d H:i:s")}}</p>
          <table class="table table-light bill-table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Product</th>
                <th scope="col">Price</th>
                <th scope="col">Amount</th>
                <th scope="col">Price</th>
              </tr>
            </thead>
            <tbody id="bill-table-body">

            </tbody>
          </table>
      </div>
    <form class="form" action="{{route('bills.store')}}" method="post" enctype="multipart/form-data">
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
          <button id="display" class="btn btn-primary" type="button" name="add">Add to Bill</button>
        </div>
        <input class="btn btn-primary" type="submit" name="submit" value="Checkout">
      </div>
    </form>
  </div>
@endsection

<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script>
$(document).ready(function () {
  $('#display').click(function(e){
    e.preventDefault();
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    $.ajax({
      url: '{{route('bill.display')}}',
      type: 'post',
      data: {
        product: $('#product').val(),
        amount: $('#amount').val()
      },
      success: function(data)
      {
        // console.log(data);
        $('#bill-table-body').empty();
        $('#bill-table-body').append(data.table_data);
        $('#product').val("");
        $('#amount').val("");
      }
    });
  });
  });

  function removeItem(item) {
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    $.ajax({
      url: '{{route('bill.removeItem')}}',
      type: 'post',
      data: {
        product: item
      },
      success: function(data)
      {
        // console.log(data);
        $('#bill-table-body').empty();
        $('#bill-table-body').append(data.table_data);
      }
    });
  }
</script>
