@extends('layouts.admin')

@section('content')

<div class="header bg-gradient-default pb-5 pt-5 pt-md-5">
<div class="container-fluid">
  <div class="header-body">
  </div>
</div>
</div>

<!-- Stock Details -->
<div class="stock container col-12">
    <div class="row mt-5">
        <div class="col-12">
          <div class="card bg-default shadow">
            <div class="card-header bg-transparent border-0">
              <h3 class="text-white mb-0">{{$branch->town}} Branch - Products</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-dark table-flush">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Medical Name</th>
                    <th scope="col">Brand Name</th>
                    <th scope="col">Expire Date</th>
                    <th scope="col">Main Stock</th>
                    <th scope="col">Backup Stock</th>
                    <th scope="col">Total Stock</th>
                    <th scope="col">Last Main Stock Update</th>
                    <th scope="col">Last Backup Stock Update</th>
                  </tr>
                </thead>
                <tbody>
                    @for($i=0; $i<(sizeof($main_products)); $i++)
                    
                      <tr>
                      <td>{{$main_products[$i]->id}}</td>
                      <td>{{$main_products[$i]->medicalName}}</td>
                      <td>{{$main_products[$i]->brandName}}</td>
                      <td>{{$main_products[$i]->pivot->expDate}}</td>
                      <td>{{$main_products[$i]->pivot->amount}}</td>
                      <td>{{$backup_products[$i]->pivot->amount}}</td>
                      <td>{{$main_products[$i]->pivot->amount + $backup_products[$i]->pivot->amount}}</td>
                      <td>{{$main_products[$i]->pivot->updated_at}}</td>
                      <td>{{$backup_products[$i]->pivot->updated_at}}</td>
                        <td>
                          <a class="btn btn-sm btn-primary "href="{{route('backup_stock.create',['branch'=>$branch, 'product'=>$main_products[$i]])}}">Update Backup Stock</a>
                        </td>
                        <td>
                          <a class="btn btn-sm btn-primary" href="{{route('stock.edit',['branch'=>$branch, 'product'=>$main_products[$i]])}}">Update Main Stock</a>
                        </td>
                      </tr>
                    
                  @endfor
              </tbody>
                </table>
</div>
</div>
</div>
</div>
</div>
@endsection
