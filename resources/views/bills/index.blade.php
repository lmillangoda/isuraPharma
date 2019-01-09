@extends('layouts.admin')

@section('content')
  <div class="header bg-gradient-default pb-5 pt-5 pt-md-5">
    <div class="container-fluid">
      <div class="header-body">

      </div>
    </div>
  </div>
  <br>

  <div class="container">
    <div class="row mt-5">
      <div class="col">
        <div class="card bg-default shadow">
          <div class="card-header bg-transparent border-0">
            <h3 class="text-white mb-0">Bills</h3>
          </div>
          <div class="container">

          <input id="search" class="form-control" type="text" name="" value="" placeholder="Search by Cashier ID or Bill ID">
        </div>


          <div class="table-responsive">
            <table class="table align-items-center table-dark table-flush">
              <thead class="thead-dark">
                <tr>
        <th>Bill ID</th>
        <th>Cashier ID</th>
        <th>Cashier</th>
        <th>Created At</th>
                </tr>
      </thead>
      <tbody>

      </tbody>
    </table>
  </div>
</div>
</div>
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
        url: '{{route('bills.search')}}',
        type: 'post',
        data: {
          keyword : $('#search').val()
        },
        success: function(data)
        {
          // console.log(data);
          // $('#bill-table-body').empty();
          $('tbody').html(data.rows);
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
