@extends('layouts.app')
@section('content')
<div class="well">
  <!-- Same Form is used for Inserting and editing -->
  @if(isset($supplier))
    {!! Form::model($supplier, [
      'action' => ['SuppliersController@update', $supplier->id],
      'method' => 'PUT',
      'enctype' => 'multipart/form-data'
      ])
    !!}
    <h1>Edit supplier details</h1>
  @else
    {!! Form::open([
      'action' => 'SuppliersController@store',
      'method' => 'POST',
      'enctype' => 'multipart/form-data'
      ])
    !!}
    <h1>Add a Supplier</h1>
  @endif
      <div class="form-group">
        {{Form::label('name', 'Name')}}
        {{Form::text('name',
        isset($supplier->name) ? $supplier->name : null,
        ['class' => 'form-control', 'placeholder' => 'Glaxo Smith (pvt) Ltd.'])}}
      </div>
      <div class="form-group">
        {{Form::label('email', 'email Address')}}
        {{Form::text('email',
        isset($supplier->email) ? $supplier->email : null,
        ['class' => 'form-control', 'placeholder' => 'ruwan@glaxo.lk'])}}
      </div>
      <div class="form-group">
        {{Form::label('telephone', 'telephone')}}
        {{Form::text('telephone',
        isset($supplier->telephone) ? $supplier->telephone : null,
        ['class' => 'form-control', 'placeholder' => 'Rs.120'])}}
      </div>
      <div class="">
        {{Form::submit('Submit', ['class'=> 'btn btn-primary'])}}
      </div>
    {!! Form::close() !!}
</div>
@endsection()
