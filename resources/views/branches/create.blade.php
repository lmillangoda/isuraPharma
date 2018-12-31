@extends('layouts.admin')
@section('content')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
      <div class="header-body">

      </div>
    </div>
  </div>
<div class="container">
  @if(isset($branch))
    {!! Form::model($branch, [
      'action' => ['BranchesController@update', $branch->id],
      'method' => 'PUT',
      'enctype' => 'multipart/form-data'
      ])
    !!}
    <h1>Edit branch details</h1>
  @else
    {!! Form::open([
      'action' => 'BranchesController@store',
      'method' => 'POST',
      'enctype' => 'multipart/form-data'
      ])
    !!}
    <h1>Add a branch</h1>
  @endif
      <div class="form-group">
        {{Form::label('town', 'Town')}}
        {{Form::text('town',
        isset($branch->town) ? $branch->town : null,
        ['class' => 'form-control'])}}
      </div>
      <div class="">
        {{Form::submit('Submit', ['class'=> 'btn btn-primary'])}}
      </div>
    {!! Form::close() !!}
</div>
@endsection()
