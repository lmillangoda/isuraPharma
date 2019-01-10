@extends('layouts.home')

@section('content')
<section>
    <div class="container-fluid mt-5">
 
            @if (isset($verify))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <span class="alert-inner--icon"><i class="ni ni-badge"></i></span>
                    <span class="alert-inner--text">{{$verify }}</span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div> 
            @endif  

        <!-- Page Heading -->
        <h1 class="my-4">Our Products</h1>
        <div class="row">
            @foreach($products as $product)
                <div class="col-xl-3">
                    <div class="card" style="width: 18rem;">
                        <a href="/products/{{$product->id}}">
                            <img class="card-img-top" src="storage/product_images/{{$product->image}}"
                                 alt="Card image cap">
                        </a>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="/products/{{$product->id}}/">{{$product->medicalName}}</a>
                            </h4>
                            <p class="card-text">Price : {{$product->price}}LKR</p>
                        </div>
                    </div>
                </div>
            @endforeach
            
        </div>
        <!-- Pagination -->
        
       
    </div>
    
</section>
{{$products->links()}}
@endsection
