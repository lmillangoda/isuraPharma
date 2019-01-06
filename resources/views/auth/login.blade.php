@extends('layouts.auth')

@section('content')
<div class="card bg-default col-7">
<form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="card-header text-center">
          <div class="logo-container">
            <img src="{{URL::asset('assets/img/logo.png')}}" alt="">
          </div>
        </div>
        <div class="card-body">
          <div class = "row justify-content-center">
          <div class="input-group no-border input-lg col-8">
            <div class="input-group-prepend">
              <span class="input-group-text">
                <i class="now-ui-icons users_circle-08"></i>
              </span>
            </div>
            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder ="E-Mail"required autofocus>

            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
          </div>
          </div>
          <div class = "row justify-content-center">
          <div class="input-group no-border input-lg col-8">
            <div class="input-group-prepend">
              <span class="input-group-text">
                <i class="now-ui-icons ui-1_lock-circle-open"></i>
              </span>
            </div>
            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder = "Password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
          </div>
          </div>

          <div class="form-check">
                <label class="form-check-label">
                  <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                  <span class="form-check-sign"></span>
                  Remember me
                </label>
              </div>

        </div>
        <div class="card-footer text-center">
            <div class = "row">
                <div class="col-6">
                    <h6>
                      <a href="/register" class="link">Register</a>
                    </h6>
                  </div>
                  <div class="col-6">
                        <h6>
                          <a href="{{ route('password.request') }}" class="link">Forgot Your Password?</a>
                        </h6>
                      </div>
                    </div>
                <button class="btn btn-primary" type="submit">Login</button>
        </div>
              
      </form>
</div>
@endsection
