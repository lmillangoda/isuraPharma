@extends('layouts.admin')
@section('content')

<div class="header bg-gradient-default pb-5 pt-5 pt-md-5">
    <div class="container-fluid">
      <div class="header-body">

      </div>
    </div>
  </div>

<div class="container col-7">
    <div class="card bg-secondary shadow">
        <div class="card-body col-12">
  @if(isset($branch))
    {!! Form::model($branch, [
      'action' => ['BranchesController@update', $branch->id],
      'method' => 'PUT',
      'enctype' => 'multipart/form-data'
      ])
    !!}
    <center><h1>Edit branch details</h1></center>
  @else
    {!! Form::open([
      'action' => 'BranchesController@store',
      'method' => 'POST',
      'enctype' => 'multipart/form-data'
      ])
    !!}
    <center><h1>Add a branch</h1></center>
  @endif
      <div class="form-group">
          <div class = "col-12">
        <center>{{Form::label('town', 'Town',['style' => "color:black;" ,'class'=>"form-control-label"])}}</center>
        {{Form::text('town',
        isset($branch->town) ? $branch->town : null,
        ['class' => 'form-control'])}}
        </div>
      </div>
      <center><div class="">
        {{Form::submit('Submit', ['class'=> 'btn btn-primary'])}}
      </div></center>
    {!! Form::close() !!}
  </div>
</div>
</div>


@endsection()
