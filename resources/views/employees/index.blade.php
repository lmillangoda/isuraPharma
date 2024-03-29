@extends('layouts.admin')
@section('content')
    <div class="header bg-gradient-default pb-6 pt-5 pt-md-6">
        <div class="container-fluid">
            <div class="header-body">
                <center><a href="employees/create">
                        <button class="btn btn-danger">Add New Employee</button>
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
            @if (\Session::has('update'))
            <div class="alert alert-default alert-dismissible fade show">              
              <p>{{ \Session::get('update') }}</p>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>  
            </div>
            @endif 
            @if (\Session::has('delete'))
            <div class="alert alert-warning alert-dismissible fade show">              
              <p>{{ \Session::get('delete') }}</p>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>  
            </div>
            @endif   
        <div class="row mt-5">
            <div class="col">
                <div class="card bg-default shadow">
                    <div class="card-header bg-transparent border-0">
                        <h3 class="text-white mb-0">Employees</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-dark table-flush">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">E-Mail</th>
                                <th scope="col">Branch_ID</th>
                                <th scope="col">Role</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($pharmacist as $item)
                                <tr>
                                    <td>
                                        {{$item->id}}
                                    </td>
                                    <td>
                                        {{$item->fName}}
                                    </td>
                                    <td>
                                        {{$item->lName}}
                                    </td>
                                    <td>
                                        {{$item->email}}
                                    </td>
                                    <td>
                                        {{$item->branch_id}}
                                    </td>
                                    <td>
                                        Pharmacist
                                    </td>
                                    <td><a href="/employees/{{$item->id}}/edit" class="btn btn-sm btn-warning">Edit</a>
                                    </td>
                                    <td>
                                        {!! Form::open(['action' => ['EmployeeController@destroy', $item->id],'method' => 'POST', 'class' => 'pull-right'])!!}
                                        {{  Form::hidden('_method', 'DELETE')}}
                                        {{  Form::Submit('Delete', ['class' => 'btn btn-sm btn-danger'])}}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            @foreach ($cashier as $item)
                                <tr>
                                    <td>
                                        {{$item->id}}
                                    </td>
                                    <td>
                                        {{$item->fName}}
                                    </td>
                                    <td>
                                        {{$item->lName}}
                                    </td>
                                    <td>
                                        {{$item->email}}
                                    </td>
                                    <td>
                                        {{$item->branch_id}}
                                    </td>
                                    <td>
                                        Cashier
                                    </td>
                                    <td><a href="/employees/{{$item->id}}/edit" class="btn btn-sm btn-warning">Edit</a>
                                    </td>
                                    <td>
                                        {!! Form::open(['action' => ['EmployeeController@destroy', $item->id],'method' => 'POST', 'class' => 'pull-right'])!!}
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
        </div>
    </div>
@endsection
