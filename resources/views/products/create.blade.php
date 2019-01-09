@extends('layouts.admin')
@section('content')
    <div class="header bg-gradient-default pb-5 pt-5 pt-md-5">
        <div class="container-fluid">
            <div class="header-body">
            </div>
        </div>
    </div>
    <div class="section">
        <div class="container col-8">
            <div class="card bg-secondary shadow">
                <div class="card-body col-12">
                    @if(isset($product))
                        <form class="" action="{{route('products.update',['id'=>$product->id])}}" method="post"
                              enctype="multipart/form-data">
                            @method('PUT')
                            <center><h1>Edit product details</h1></center>
                            @else
                                <form class="" action="{{route('products.store')}}" method="post"
                                      enctype="multipart/form-data">
                                    <center><h1>Add new product</h1></center>
                                    @endif
                                    @csrf
                                    <div class="pl-lg-4">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <center><label style="color:black;" class="form-control-label"
                                                                   for="branName">Brand Name</label></center>
                                                    <input class="form-control" type="text" name="brandName"
                                                           value="{{isset($product->brandName) ? $product->brandName : null}}"
                                                           placeholder="Panadol">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <center><label style="color:black;" class="form-control-label"
                                                                   for="medicalName">Medical Name</label></center>
                                                    <input class="form-control" type="text" name="medicalName"
                                                           value="{{isset($product->medicalName) ? $product->medicalName : null}}"
                                                           placeholder="Paracitol">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="pl-lg-4">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <center><label style="color:black;" class="form-control-label"
                                                                   for="price">Unit Price</label></center>
                                                    <input class="form-control" type="text" name="price"
                                                           value="{{isset($product->price) ? $product->price : null}}"
                                                           placeholder="10">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <center><label style="color:black;" class="form-control-label"
                                                                   for="buying_price">Buying Price</label></center>
                                                    <input class="form-control" type="text" name="buying_price"
                                                           value="{{isset($product->buying_price) ? $product->buying_price : null}}"
                                                           placeholder="10">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pl-lg-4">
                                        <div class="row">
                                            <div class="col-6">
                                                <div style="color:black;" class="form-control-label">
                                                    <center><label style="color:black;" class="form-control-label"
                                                                   for="reorder_level">Reorder Level</label></center>
                                                    <input class="form-control" type="text" name="reorder_level"
                                                           value="{{isset($product->reorder_level) ? $product->reorder_level : null}}"
                                                           placeholder="10">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label style="color:black;" class="form-control-label" for="image">Image</label>
                                                    <input class="form-control-file" type="file" name="image">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Supplier Section -->
                                    @if (isset($product))
                                        <?php
                                        $idArray = array();
                                        foreach ($product->suppliers as $supplier) {
                                            $idArray[] = $supplier->id;
                                        }
                                        ?>
                                    @endif

                                    <div class="container col-8">
                                        <div class="card bg-secondary">
                                            <div class="card-body col-12">
                                                <div class="pl-lg-4">
                                                    <label style="color:black;" class="form-control-label"
                                                           for="suppliers">Suppliers</label>
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        @foreach($suppliers as $supplier)
                                                            @if (isset($product))
                                                                <input type="checkbox" name="suppliers[]"
                                                                       value="{{$supplier->id}}" {{ (in_array($supplier->id, $idArray)) ? 'checked' : null }}>
                                                                {{$supplier->name}}
                                                                <br>
                                                            @else
                                                                <input type="checkbox" name="suppliers[]"
                                                                       value="{{$supplier->id}}">
                                                                {{$supplier->name}}
                                                                <br>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pl-lg-4">
                                        <center><input class="btn btn-primary" type="submit" name="submit"
                                                       value="Submit"></center>
                                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
