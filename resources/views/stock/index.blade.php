@extends('layouts.admin')

@section('content')
    <div class="header bg-gradient-default pb-6 pt-5 pt-md-6">
        <div class="container-fluid">
            <div class="header-body">
                <center><a href="stock/create">
                        <button class="btn btn-danger">Add New Stock</button>
                    </a></center>
            </div>
        </div>
    </div>
    <!--  Branch wise stock details -->
    @include('branches.index')
@endsection
