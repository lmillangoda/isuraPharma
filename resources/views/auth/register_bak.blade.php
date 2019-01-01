


<form id="reg" method="POST" action="{{ route('register') }}">
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
            <input id="fname" class="form-control{{ $errors->has('fname') ? ' is-invalid' : '' }}" placeholder ="First Name" name="fname" value="{{ old('fname') }}" type="text" required autofocus>

                                @if ($errors->has('fname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('fname') }}</strong>
                                    </span>
                                @endif
          </div>

            <div class="input-group no-border input-lg">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="now-ui-icons users_circle-08"></i>
                </span>
              </div>
              <input id="mname" class="form-control{{ $errors->has('mname') ? ' is-invalid' : '' }}" placeholder ="Middle Name" name="mname" value="{{ old('mname') }}" type="text">

                                  @if ($errors->has('mname'))
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('mname') }}</strong>
                                      </span>
                                  @endif
            </div>

            <div class="input-group no-border input-lg">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="now-ui-icons users_circle-08"></i>
                </span>
              </div>
              <input id="lname" class="form-control{{ $errors->has('lname') ? ' is-invalid' : '' }}" placeholder ="Last Name" name="lname" value="{{ old('lname') }}" type="text">

                                  @if ($errors->has('lname'))
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('lname') }}</strong>
                                      </span>
                                  @endif
            </div>

          <div class="input-group no-border input-lg">
            <div class="input-group-prepend">
              <span class="input-group-text">
                <i class="now-ui-icons tech_mobile"></i>
              </span>
            </div>
            <input id="tel_no" type="text" class="form-control" placeholder = "Telephone Number" name="tel" required>

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
            <input id="hNo" type="text" class="form-control" placeholder = "Home No." name="hNo" required>
          </div>

          <div class="input-group no-border input-lg">
            <div class="input-group-prepend">
              <span class="input-group-text">
                <i class="now-ui-icons location_compass-05"></i>
              </span>
            </div>
            <input id="add1" type="text" class="form-control" placeholder = "Address Line 1" name="add1" required>
          </div>

          <div class="input-group no-border input-lg">
            <div class="input-group-prepend">
              <span class="input-group-text">
                <i class="now-ui-icons location_compass-05"></i>
              </span>
            </div>
            <input id="add2" type="text" class="form-control" placeholder = "Address Line 2" name="add2">
          </div>

          <div class="input-group no-border input-lg">
            <div class="input-group-prepend">
              <span class="input-group-text">
                <i class="now-ui-icons location_compass-05"></i>
              </span>
            </div>
            <input id="town" type="text" class="form-control" placeholder = "Town" name="town" required>
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

          <!-- Brnaches -->
          <div class="input-group no-border input-lg">
            <div class="input-group-prepend">
              <span class="input-group-text">
                <i class="now-ui-icons location_compass-05"></i>
              </span>
            </div>
            <select class="form-control" name="branch" form="reg" required>
              @foreach($branches as $branch)
                <option value="{{$branch->id}}">{{$branch->town}}</option>
              @endforeach
            </select>
          </div>

          <!-- Roles -->
          <div class="input-group no-border input-lg">
            <div class="input-group-prepend">
              <span class="input-group-text">
                <i class="now-ui-icons location_compass-05"></i>
              </span>
            </div>
            <select class="form-control" name="branch" form="reg" required>
              @foreach($roles as $role)
                <option value="{{$role->id}}">{{$role->role}}</option>
              @endforeach
            </select>
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
