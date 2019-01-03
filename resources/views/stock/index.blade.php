@extends('layouts.admin')

@section('content')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
          <div class="header-body">
              <center><a href = "stock/create"><button  class="btn btn-danger">Add New Stock</button></a></center>
          </div>
        </div>
      </div>
<!--  Branch wise stock details -->
@include('branches.index')
@endsection
