@extends (layouts.app)

@section('content')
  <h1>Add a product</h1>
  {!! Form::open(['action' => 'ProductsController@store', 'method' => 'POST']) !!}
    <div class="form-group">
      {{Form::label('brandName', 'Brand Name')}}
      {{Form::text('brandName', '', ['class' => 'form-control', 'placeholder' => 'Panadol'])}}
    </div>
    <div class="form-group">
      {{Form::label('medicalName', 'Medical Name')}}
      {{Form::text('medicalName', '', ['class' => 'form-control', 'placeholder' => 'Paracitamol'])}}
    </div>
    <div class="form-group">
      {{Form::label('price', 'Price')}}
      {{Form::text('price', '', ['class' => 'form-control', 'placeholder' => 'Rs.120'])}}
    </div>
    <div class="">
      {{Form::submit('Submit', ['class'=> 'btn btn-primary'])}}
    </div>
  {!! Form::close() !!}
@endsection
