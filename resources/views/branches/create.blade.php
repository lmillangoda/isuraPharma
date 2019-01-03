@extends('layouts.admin')
@section('content')

<div class="header bg-gradient-default pb-5 pt-5 pt-md-5">
    <div class="container-fluid">
      <div class="header-body">

      </div>
    </div>
  </div>

<div class="container">
    <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
          <div class="row align-items-center">
            <div class="col-12">
              <h3 class="mb-0">Branch Registration</h3>
            </div>
          </div>
        </div>
        <div class="card-body">
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
</div>
</div>


@endsection()
