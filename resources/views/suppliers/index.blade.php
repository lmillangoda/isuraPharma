@extends('layouts.admin')
@section('content')
    <div class="header bg-gradient-default pb-6 pt-5 pt-md-6">
        <div class="container-fluid">
            <div class="header-body">
                <center><a href="suppliers/create">
                        <button class="btn btn-danger">Add New Supplier</button>
                    </a></center>
            </div>
        </div>
    </div>
    <div class="container">
            @if (\Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show">              
              <p>{{ \Session::get('success') }}</p>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>  
            </div>
            @endif  
            @if (\Session::has('deleted'))
            <div class="alert alert-warning alert-dismissible fade show">              
              <p>{{ \Session::get('deleted') }}</p>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>  
            </div>
            @endif
            @if (\Session::has('update'))
            <div class="alert alert-default alert-dismissible fade show">              
              <p>{{ \Session::get('update') }}</p>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>  
            </div>
            @endif
        <div class="row mt-5">
            <div class="col">
                <div class="card bg-default shadow">
                    <div class="card-header bg-transparent border-0">
                        <h3 class="text-white mb-0">Suppliers</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-dark table-flush">
                            <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Contact No.</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($suppliers as $supplier)
                                <tr>
                                    <td>{{$supplier->id}}</td>
                                    <td>{{$supplier->name}}</td>
                                    <td>{{$supplier->email}}</td>
                                    <td>{{$supplier->telephone}}</td>
                                    <td><a href="/suppliers/{{$supplier->id}}/edit"
                                           class="btn btn-sm btn-warning">Edit</a></td>
                                    <td>
                                        {!! Form::open(['action' => ['SuppliersController@destroy', $supplier->id],'method' => 'POST', 'class' => 'pull-right'])!!}
                                        {{  Form::hidden('_method', 'DELETE')}}
                                        {{  Form::Submit('Delete', ['class' => 'btn btn-sm btn-danger'])}}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>


@endsection
