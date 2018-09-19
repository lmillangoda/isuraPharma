@extends('layouts.app')
@section('content')
<div class="well">
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
    <h1>Add a supplier</h1>
  @endif
      <div class="form-group">
        {{Form::label('name', 'Name')}}
        {{Form::text('name',
        isset($supplier->name) ? $supplier->name : null,
        ['class' => 'form-control', 'placeholder' => 'Glaxo Smith (Pvt) Ltd.'])}}
      </div>
      <div class="form-group">
        {{Form::label('email', 'Email Address')}}
        {{Form::text('email',
        isset($supplier->email) ? $supplier->email : null,
        ['class' => 'form-control', 'placeholder' => 'ruwan@glaxo.com'])}}
      </div>
      <div class="form-group">
        {{Form::label('telephone', 'Telephone Number')}}
        {{Form::text('telephone',
        isset($supplier->telephone) ? $supplier->telephone : null,
        ['class' => 'form-control', 'placeholder' => '0715687456'])}}
      </div>
      <div class="">
        {{Form::submit('Submit', ['class'=> 'btn btn-primary'])}}
      </div>
    {!! Form::close() !!}
</div>
@endsection()
