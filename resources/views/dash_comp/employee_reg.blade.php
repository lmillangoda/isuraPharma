<div class ="section">
<div class ="container col-10">
<div class="col-10">
    <div class="card bg-secondary shadow">
      <div class="card-header bg-white border-0">
        <div class="row align-items-center">
          <div class="col-12">
            <h3 class="mb-0">Employee Registration Form</h3>
          </div>
        </div>
      </div>
      <div class="card-body">
          <form method="POST" action="{{ route('empregister') }}">
              @csrf

            <h6 class="heading-small mb-4">Basic Info</h6>

            <div class="pl-lg-4">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label class="form-control-label" for="input-email">Email address</label>
                      <input id="input-email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder ="example@123.com" required>
  
                              @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                              @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                      <div class="form-group">
                          <label class="form-control-label" for="input-fname">First Name</label>
                          <input id="input-fname" class="form-control{{ $errors->has('fname') ? ' is-invalid' : '' }}" placeholder ="First Name" name="fname" value="{{ old('fname') }}" type="text" required autofocus>
    
                                    @if ($errors->has('fname'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('fname') }}</strong>
                                        </span>
                                    @endif
                        </div>
                  </div>
                  <div class="col-lg-6">
                      <div class="form-group">
                          <label class="form-control-label" for="input-mname">Middle Name</label>
                          <input id="input-mname" class="form-control{{ $errors->has('mname') ? ' is-invalid' : '' }}" placeholder ="Middle Name" name="mname" value="{{ old('mname') }}" type="text" required autofocus>
    
                                    @if ($errors->has('mname'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('mname') }}</strong>
                                        </span>
                                    @endif
                        </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                          <label class="form-control-label" for="input-lname">Last Name</label>
                          <input id="input-lname" class="form-control{{ $errors->has('lname') ? ' is-invalid' : '' }}" placeholder ="Last Name" name="lname" value="{{ old('lname') }}" type="text" required autofocus>
    
                                    @if ($errors->has('lname'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('lname') }}</strong>
                                        </span>
                                    @endif
                      </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="input-tel">Telephone NO</label>
                            <input id="input-tel" class="form-control{{ $errors->has('tel') ? ' is-invalid' : '' }}" placeholder ="Telephone NO" name="tel" value="{{ old('tel') }}" type="text" required autofocus>
      
                                      @if ($errors->has('tel'))
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('tel') }}</strong>
                                          </span>
                                      @endif
                        </div>
                      </div>
                  </div>
              </div>

                <hr class="my-4" />
                <h6 class="heading-small mb-4">Address</h6>

                <div class="pl-lg-4">
                    <div class="row">
                      <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label" for="input-hno">Home Address NO</label>
                            <input id="input-hno" class="form-control{{ $errors->has('hno') ? ' is-invalid' : '' }}" placeholder ="Home Address NO" name="hno" value="{{ old('hno') }}" type="text" required autofocus>

                            @if ($errors->has('hno'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('hno') }}</strong>
                                </span>
                            @endif
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label" for="input-line1">Address Line 1</label>
                            <input id="input-line1" class="form-control{{ $errors->has('line1') ? ' is-invalid' : '' }}" placeholder ="Line 1" name="line1" value="{{ old('line1') }}" type="text" required autofocus>

                            @if ($errors->has('line1'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('line1') }}</strong>
                                </span>
                            @endif
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label" for="input-line2">Address Line 2</label>
                            <input id="input-line2" class="form-control{{ $errors->has('line2') ? ' is-invalid' : '' }}" placeholder ="Line 2" name="line2" value="{{ old('line2') }}" type="text" required autofocus>

                            @if ($errors->has('line2'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('line2') }}</strong>
                                </span>
                            @endif
                        </div>
                      </div>
                    </div>
                    <div class="row">
                            <div class="col-lg-12">
                              <div class="form-group">
                                <label class="form-control-label" for="input-email">Town</label>
                                <input id="input-town" type="town" class="form-control{{ $errors->has('town') ? ' is-invalid' : '' }}" name="town" value="{{ old('town') }}" placeholder ="Town" required>
            
                                        @if ($errors->has('town'))
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('town') }}</strong>
                                          </span>
                                        @endif
                              </div>
                            </div>
                          </div>
                </div>

                <hr class="my-4" />
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                              <div class="form-group">
                                <label class="form-control-label" for="input-password">Password</label>
                                <input id="input-password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                              </div>
                            </div>
                            <div class="col-lg-6">
                              <div class="form-group">
                                <label class="form-control-label" for="input-password">Confirm Password</label>
                                <input id="input-password-confirm" type="password" class="form-control" name="password_confirmation" placeholder= "Confirm Password" required>
                              </div>
                            </div>
                          </div>
                        </div>
                          <hr class="my-4" />
                             
                            <hr class="my-4" />

                          <div class="row">
                              <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-branch">Branch</label>
                                    <select class = "form-control" id = "input-branch" name = "branch">
                                      @foreach ($branch as $item)
                                         <option value ="{{$item->id}}">{{$item->id}} - {{$item->town}}</option> 
                                      @endforeach 
                                    </select>
                                </div>
                              </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                  <div class="form-group">
                                      <label class="form-control-label" for="role">Role</label>
                                      <select class = "form-control" id = "role" name = "role">
                                           <option value = "1">Pharmacist</option>
                                           <option value = "2">Cashier</option>  
                                      </select>
                                  </div>
                                </div>
                              </div>

   
                    <div class="pl-lg-4">
                        <center><button class="btn btn-primary" type="submit">Submit</button></center>
                        </div>
        </form>
    </div>
      </div>
    </div>
  </div>
</div> 


