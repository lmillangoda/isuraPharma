@extends('layouts.admin')
@section('content')
<div class="header bg-gradient-default pb-5 pt-5 pt-md-5">
    <div class="container-fluid">
      <div class="header-body">

      </div>
    </div>
  </div>

  <div class="container-fluid">
      <div class="row mt-5">
        <div class="col-9">
          <div class="card bg-default shadow">
            <div class="card-header bg-transparent border-0">
                <p style="color:white;" class="text-center">Cashier : {{Auth::user()->fName}}</p>
                <p style="color:white;"class="text-center">Time : {{date("Y-m-d H:i:s")}}</p>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-dark table-flush">
                <thead class="thead-dark">
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
            </div>
          </div>
<div class="col-xl-3">
<div class="card bg-default shadow" style="width: 18rem;">
    <div class="card-body">
    <form action="{{route('bills.store')}}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="pl-lg-4">
        <div class="row">
            <div class="col-lg-12">
            <label style="color: white;" for="product_id">Product ID</label>
            <input class="form-control" id='product' type="text" name="product_id" value="">
          </div>
          <div class="col-lg-12">
            <label style="color: white;" for="amount">Amount</label>
            <input class="form-control" id='amount' type="text" name="amount" value="">
          </div>
        </div>
      </div>
      <div class = "card-footer bg-default">
      <div class="row">
        <div class = "col-6">
        <button id="display" class="btn btn-sm btn-primary" type="button" name="add">Add to Bill</button>
        </div>
        <div>
        <input class="btn btn-sm btn-danger" type="submit" name="submit" value="Checkout">
      </div>
      </div>
    </div>

        </form>
        </div>
      </div>
    </div>
      </div>
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

      },
      error: function()
      {
        alert('Something went wrong. Check your product ID or There are no stocks');
      }
    })
    .always(function() {
      $('#product').val("");
      $('#amount').val("");
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
