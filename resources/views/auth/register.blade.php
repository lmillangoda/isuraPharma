@extends('layouts.auth')
@section('content')
<div class="container">


<form id="reg" method="POST" action="{{ route('register') }}">
        @csrf
            <input id="fname" class="form-control" placeholder ="First Name" name="fname" value="" type="text" required autofocus>

              <input id="mname" class="form-control" placeholder ="Middle Name" name="mname" value="" type="text">

              <input id="lname" class="form-control" placeholder ="Last Name" name="lname" value="" type="text">

            <input id="tel_no" type="text" class="form-control" placeholder = "Telephone Number" name="tel" required>

            <input id="hNo" type="text" class="form-control" placeholder = "Home No." name="hNo" required>

            <input id="add1" type="text" class="form-control" placeholder = "Address Line 1" name="add1" required>

            <input id="add2" type="text" class="form-control" placeholder = "Address Line 2" name="add2">

            <input id="town" type="text" class="form-control" placeholder = "Town" name="town" required>

            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder ="E-Mail" required>

            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif

          <!-- Brnaches -->

            <select class="form-control" name="branch" form="reg" required>
              @foreach($branches as $branch)
                <option value="{{$branch->id}}">{{$branch->town}}</option>
              @endforeach
            </select>

          <!-- Roles -->

            <select class="form-control" name="role" form="reg" required>
              @foreach($roles as $role)
                <option value="{{$role->id}}">{{$role->role}}</option>
              @endforeach
            </select>

                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>

                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif


                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder= "Confirm Password" required>

                <button class="btn btn-primary" type="submit">Register</button>
        <div class="text-center">
                <h6>
                  <a href="/login" class="link">Already have an account? Login</a>
                </h6>
              </div>

      </form>
      </div>

@endsection
