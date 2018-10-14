@extends('layouts.Users')

@section('content')
<section class="section section-shaped section-lg">
    <div class="shape shape-style-1 bg-gradient-default">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
    </div>
    <div class="container pt-lg-md">
      <div class="row justify-content-center">
        <div class="col-lg-5">
          <div class="card bg-secondary shadow border-0">
            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">
                <small>Registration</small>
              </div>
              <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group row">
                    <div class="input-group input-group-alternative mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                      </div>
                       <input id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder ="Name" name="name" value="{{ old('name') }}" type="text" required autofocus>
  
                                  @if ($errors->has('name'))
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('name') }}</strong>
                                      </span>
                                  @endif
                      </div>
                    </div>
                    <div class="form-group row">
                        <div class="input-group input-group-alternative mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                          </div>
                                      <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder = "E-mail" value="{{ old('email') }}" required>
      
                                      @if ($errors->has('email'))
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('email') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                          </div>
                          <div class="form-group row">
                            <div class="input-group input-group-alternative mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                              </div>
                                          <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder = "Password"name="password" required>
          
                                          @if ($errors->has('password'))
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $errors->first('password') }}</strong>
                                              </span>
                                          @endif
                                      </div>
                              </div>
                              <div class="form-group row">
                                <div class="input-group input-group-alternative mb-3">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                  </div>
                                      <input id="password-confirm" type="password" class="form-control" placeholder = "Confirm Password" name="password_confirmation" required>
                                          </div>
                                  </div>
                                  <div class="form-group row">
                                    <div class="input-group input-group-alternative mb-3">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-building"></i></span>
                                      </div>
                                          <input id="address" type="text" class="form-control" placeholder = "Address" name="address" required>
                                              </div>
                                      </div>
                                      <div class="form-group row">
                                        <div class="input-group input-group-alternative mb-3">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-mobile-button"></i></span>
                                          </div>
                                              <input id="tel_no" type="text" class="form-control" placeholder = "Telephone Number" name="tel_no" required>
                                                  </div>
                                          </div>
                                  <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </div>
                                
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  </section>
@endsection
