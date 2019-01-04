@extends('layouts.admin')

@section('content')
<div class="header bg-gradient-default pb-6 pt-5 pt-md-6">
    <div class="container-fluid">
      <div class="header-body">
          <center><a href = "products/create"><button  class="btn btn-danger">Add New Product</button></a></center>
      </div>
    </div>
  </div>
  <div class="container-fluid">
      <!-- Page Heading -->
      <h1 class="my-4">Our Products</h1>
      <input id="search" class="form-control" type="text" name="" value="" placeholder="Search by Medical Name, Brand Name">
      <br>
      <div id="product-row" class="row">

        </div>
</div>

@endsection

<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script>
  $(document).ready(function() {

    search();

    function search() {
      $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
      });
      $.ajax({
        url: '{{route('products.search')}}',
        type: 'post',
        data: {
          keyword : $('#search').val()
        },
        success: function(data)
        {
          // console.log(data);
          // $('#bill-table-body').empty();
          $('#product-row').html(data.cards);
          // $('#product').val("");
          // $('#amount').val("");
        }
    });
  }

    $(document).on('keyup', '#search', function(){
      var keyword = $(this).val();
      search();
    })
  });
</script>
