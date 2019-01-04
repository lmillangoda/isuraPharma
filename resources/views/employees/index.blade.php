@extends('layouts.admin')   
@section('content')
<div class="header bg-gradient-default pb-6 pt-5 pt-md-6">
    <div class="container-fluid">
      <div class="header-body">
            <center><a href = "employees/create"><button  class="btn btn-danger">Add New Employee</button></a></center>
      </div>
    </div>
  </div>

  <div class="container">
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
