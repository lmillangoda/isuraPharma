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
    <table class="table align-items-center table-dark table-flush">
      <thead>
        <th>Bill ID</th>
        <th>Cashier ID</th>
        <th>Cashier</th>
      </thead>
      <tbody>
        @foreach($bills as $bill)
        <tr>
        <td>{{$bill->id}}</td>
        <td>{{$bill->cashier->id}}</td>
        <td>{{$bill->cashier->fName}}</td>
        <td><a class="btn btn-primary" href="{{route('bills.show',['bill'=>$bill->id])}}">View Bill Details</a></td>
      </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
