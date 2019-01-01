@extends('layouts.app')
@section('content')
<div class="container">


<form id="reg" method="POST" action="{{ route('register') }}">
        @csrf
            <input id="fname" class="form-control{{ $errors->has('fname') ? ' is-invalid' : '' }}" placeholder ="First Name" name="fname" value="{{ old('fname') }}" type="text" required autofocus>

                                @if ($errors->has('fname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('fname') }}</strong>
                                    </span>
                                @endif

              <input id="mname" class="form-control{{ $errors->has('mname') ? ' is-invalid' : '' }}" placeholder ="Middle Name" name="mname" value="{{ old('mname') }}" type="text">

                                  @if ($errors->has('mname'))
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('mname') }}</strong>
                                      </span>
                                  @endif

              <input id="lname" class="form-control{{ $errors->has('lname') ? ' is-invalid' : '' }}" placeholder ="Last Name" name="lname" value="{{ old('lname') }}" type="text">

                                  @if ($errors->has('lname'))
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('lname') }}</strong>
                                      </span>
                                  @endif

            <input id="tel_no" type="text" class="form-control" placeholder = "Telephone Number" name="tel" required>

                                @if ($errors->has('tel_no'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tel_no') }}</strong>
                                    </span>
                                @endif

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
          </div>

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
              </div>


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
