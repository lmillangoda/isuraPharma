@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h1>Profile<h1></div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action = "profile" method = "get" enctype = "multipart/form-data">
                        <div><img src="{{$user->name}}" alt = "" width ="150" height ="150">
                    </form>
                    <form action = "propic" method = "get" enctype = "multipart/form-data">
                        <div><button type = "submit">Change Profile Picture</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
