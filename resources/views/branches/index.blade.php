@extends('layouts.admin')
@section('content')
<!-- Page Content -->
<div class="header bg-gradient-default pb-6 pt-5 pt-md-6">
  <div class="container-fluid">
    <div class="header-body">
        <center><a href = "branches/create"><button  class="btn btn-danger">Add New Branch</button></a></center>
    </div>
  </div>
</div>
  <div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">Find Us
      <br>
      <small>Our Branches</small>
    </h1>

    <!-- Project One -->
    @foreach($branches as $branch)
    <center><div class="row">
      <div class="col-md-7">
        <a href="#">
          <img class="img-fluid rounded mb-3 mb-md-0" src="http://placehold.it/700x300" alt="">
        </a>
      </div>
      <div class="col-md-5">
        <h3>{{$branch->name}}</h3>
        <p>{{$branch->town}}</p>
        <a class="btn btn-primary" href="/branches/{{$branch->id}}/">Branch Stock Overview
          <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
      </div>
    </div></center>
    <!-- /.row -->
    <hr>
    @endforeach

  </div>
  <!-- /.container -->


</body>
@endsection('content')
