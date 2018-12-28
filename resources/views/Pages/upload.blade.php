@extends('layouts.uploader')
@section('content')
<div class="pl-lg-4">
    <div class="picture-container">
      <div class="picture">
          <img src="./assets/img/{{$user->name}}" class="picture-src" id="profile-picture" title="">
          <input name = "image" class="form-control form-control-alternative" type="file" id="profile-picture">
      </div>
      <h6>Choose Picture</h6>
  </div>
      </div>
@endsection