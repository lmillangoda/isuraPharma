@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Upload Your Profile Picture</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                </div>
                <div>
                    <form action = "store" method = "POST" enctype = "multipart/form-data">

                        <label for = "image">Image</label>
                        <input type = "file" name = "image"><br/>

                        <label for = "name">Name</label>
                        <input type = "text" name = "name"><br/>

                        <label for = "email">Email</label>
                        <input type = "text" name = "email"><br/>

                    <input type = "hidden" name = "_token" value = "{{csrf_token()}}">

                    <button type = "submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
