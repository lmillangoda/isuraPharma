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
          <div class="table-responsive">
            <table class="table align-items-center table-dark table-flush">
              <thead class="thead-dark">
                <tr>
        <th>Bill ID</th>
        <th>Cashier ID</th>
        <th>Cashier</th>
                </tr>
      </thead>
      <tbody>
        @foreach($bills as $bill)
        <tr>
        <td>{{$bill->id}}</td>
        <td>{{$bill->cashier->id}}</td>
        <td>{{$bill->cashier->fName}}</td>
        <td><a class="btn btn-sm btn-primary" href="{{route('bills.show',['bill'=>$bill->id])}}">View Bill Details</a></td>
      </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
</div>
</div>
</div>
@endsection
