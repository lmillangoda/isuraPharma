@extends('layouts.auth')

@section('content')

<form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="card-header text-center">
          <div class="logo-container">
            <img src="{{URL::asset('assets/img/logo.png')}}" alt="">
          </div>
        </div>
        <div class="card-body">
          <div class="input-group no-border input-lg">
            <div class="input-group-prepend">
              <span class="input-group-text">
                <i class="now-ui-icons users_circle-08"></i>
              </span>
            </div>
            <input id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder ="Name" name="name" value="{{ old('name') }}" type="text" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
          </div>

          <div class="input-group no-border input-lg">
            <div class="input-group-prepend">
              <span class="input-group-text">
                <i class="now-ui-icons tech_mobile"></i>
              </span>
            </div>
            <input id="tel_no" type="text" class="form-control" placeholder = "Telephone Number" name="tel_no" required>

                                @if ($errors->has('tel_no'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tel_no') }}</strong>
                                    </span>
                                @endif
          </div>

          <div class="input-group no-border input-lg">
            <div class="input-group-prepend">
              <span class="input-group-text">
                <i class="now-ui-icons location_compass-05"></i>
              </span>
            </div>
            <input id="address" type="text" class="form-control" placeholder = "Address" name="address" required>
          </div>

          <div class="input-group no-border input-lg">
            <div class="input-group-prepend">
              <span class="input-group-text">
                <i class="now-ui-icons ui-1_email-85"></i>
              </span>
            </div>
            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder ="E-Mail" required>

            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
          </div>

          <div class="input-group no-border input-lg">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="now-ui-icons ui-1_lock-circle-open"></i>
                  </span>
                </div>
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>

                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
              </div>

              <div class="input-group no-border input-lg">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="now-ui-icons ui-1_lock-circle-open"></i>
                      </span>
                    </div>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder= "Confirm Password" required>
                  </div>

        </div>
        <div class="card-footer text-center">
                <button class="btn btn-primary" type="submit">Register</button>
        </div>
        <div class="text-center">
                <h6>
                  <a href="/login" class="link">Already have an account? Login</a>
                </h6>
              </div>
              
      </form>
@endsection

