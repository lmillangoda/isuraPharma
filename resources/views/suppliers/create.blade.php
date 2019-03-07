@extends('layouts.admin')
@section('content')
    <!--<div class="header bg-gradient-default pb-5 pt-5 pt-md-5">
        <div class="container-fluid">
            <div class="header-body">

            </div>
        </div>
    </div>-->
    <section class="section">
        <div class="container col-6">
            <div class="card bg-secondary shadow">
                <div class="card-body col-12">

                    <div class="well">
                        @if(isset($supplier))
                            {!! Form::model($supplier, [
                              'action' => ['SuppliersController@update', $supplier->id],
                              'method' => 'PUT',
                              'enctype' => 'multipart/form-data'
                              ])
                            !!}
                            <center><h1>Edit supplier details</h1></center>
                        @else
                            {!! Form::open([
                              'action' => 'SuppliersController@store',
                              'method' => 'POST',
                              'enctype' => 'multipart/form-data'
                              ])
                            !!}
                            <center><h1>Add a supplier</h1></center>
                        @endif
                        <div class="form-group">
                            <center>{{Form::label('name', 'Name',['style' => "color:black;" ,'class'=>"form-control-label"])}}</center>
                            {{Form::text('name',
                            isset($supplier->name) ? $supplier->name : null,
                            ['class' => 'form-control', 'placeholder' => 'Glaxo Smith (Pvt) Ltd.'])}}
                        </div>
                        <div class="form-group">
                            <center>{{Form::label('email', 'Email Address',['style' => "color:black;" ,'class'=>"form-control-label"])}}</center>
                            {{Form::text('email',
                            isset($supplier->email) ? $supplier->email : null,
                            ['class' => 'form-control', 'placeholder' => 'ruwan@glaxo.com'])}}
                        </div>
                        <div class="form-group">
                            <center>{{Form::label('telephone', 'Telephone Number',['style' => "color:black;" ,'class'=>"form-control-label"])}}</center>
                            {{Form::text('telephone',
                            isset($supplier->telephone) ? $supplier->telephone : null,
                            ['class' => 'form-control', 'placeholder' => '0715687456'])}}
                        </div>
                        <center>
                            <div class="">
                                {{Form::submit('Submit', ['class'=> 'btn btn-primary'])}}
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>

        </div>
@endsection()
