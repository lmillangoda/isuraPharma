@extends("layouts.admin")
@section('content')

<div class="header bg-gradient-default pb-5 pt-5 pt-md-5">
  <div class="container-fluid">
    <div class="header-body">

    </div>
  </div>
</div>

        <div class="container">
          <div class="card card-profile shadow">
            <div class="px-4">
              <div class="row justify-content-center">
                <div class="col-xl-8 order-xl-1">
                  <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                    <div class="card-body">
                                      <div class="d-flex justify-content-center">
                                          <div class="col-md-4">
                                              <button type="button" class="btn btn-block btn-default" data-toggle="modal" data-target="#modal-form">Change Password</button>
                                              <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                                                <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
                                                  <div class="modal-content">
                                                    <div class="modal-body p-0">
                                                      <div class="card bg-secondary shadow border-0">
                                                        <div class="card-body px-lg-5 py-lg-5">
                                                          <div class="text-center text-muted mb-4">
                                                          </div>
                                                          <form role="form" method = "post" action ="">
                                                            <div class="form-group mb-3">
                                                              <div class="input-group input-group-alternative">
                                                                <div class="input-group-prepend">
                                                                  <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                                                </div>
                                                                <input class="form-control" placeholder="Email" type="email">
                                                              </div>
                                                            </div>
                                                            <div class="form-group">
                                                              <div class="input-group input-group-alternative">
                                                                <div class="input-group-prepend">
                                                                  <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                                                </div>
                                                                <input class="form-control" placeholder="Password" type="password">
                                                              </div>
                                                            </div>
                                                            <div class="custom-control custom-control-alternative custom-checkbox">
                                                              <input class="custom-control-input" id=" customCheckLogin" type="checkbox">
                                                              <label class="custom-control-label" for=" customCheckLogin">
                                                                <span>Remember me</span>
                                                              </label>
                                                            </div>
                                                            <div class="text-center">
                                                              <button type="button" class="btn btn-primary my-4">Sign in</button>
                                                            </div>
                                                          </form>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                              </div>
                              <div class="pl-lg-4">
                                  <div class="row">
                                    <div class="col-lg-12">
                                      <div class="form-group">
                                        <label class="form-control-label" for="email">Email address</label>
                                      <input style ="font-color:" id="email" type="email" class="form-control" name="email" value ="{{$user->email}}" disabled>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-fname">First Name</label>
                                            <input id="input-fname" class="form-control" name="fname" value="{{$user->fName}}" type="text" disabled>
                                          </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-mname">Middle Name</label>
                                            <input id="input-mname" class="form-control" name="mname" value="{{$user->mName}}" type="text" disabled>
                                          </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-lname">Last Name</label>
                                            <input id="input-lname" class="form-control" name="lname" value="{{$user->lName}}" type="text" disabled>
                                        </div>
                                      </div>
                
                                        <div class="col-lg-6">
                                          <div class="form-group">
                                              <label class="form-control-label" for="input-tel">Telephone NO</label>
                                              <input id="input-tel" class="form-control" placeholder ="{{$user->tel}}" name="tel" value="" type="text" disabled>
                                          </div>
                                        </div>
                                      </div>
                                </div>
                  
                                  <h6 class="heading-small mb-4">Address</h6>
                  
                                  <div class="pl-lg-4">
                                      <div class="row">
                                        <div class="col-lg-4">
                                          <div class="form-group">
                                              <label class="form-control-label" for="input-hno">Home Address NO</label>
                                              <input id="input-hno" class="form-control" placeholder ="{{$user->hNo}}" name="hno" value="" type="text" disabled>
                                          </div>
                                        </div>
                                        <div class="col-lg-4">
                                          <div class="form-group">
                                              <label class="form-control-label" for="input-line1">Address Line 1</label>
                                              <input id="input-line1" class="form-control" placeholder ="{{$user->add1}}" name="line1" value="" type="text" disabled>
                                          </div>
                                        </div>
                                        <div class="col-lg-4">
                                          <div class="form-group">
                                              <label class="form-control-label" for="input-line2">Address Line 2</label>
                                              <input id="input-line2" class="form-control" placeholder ="{{$user->add2}}" name="line2" value="" type="text" disabled>
  
                                          </div>
                                        </div>
                                      </div>
                                  </div>
                
                                  <div class="pl-lg-4">
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="form-group">
                                          <label class="form-control-label" for="input-lname">Town</label>
                                          <input id="input-town" class="form-control" placeholder ="{{$user->town}}" name="town" value="" type="text" disabled>
                                      </div>
                                    </div>
                                  </div>
                                </div>
  
                  </div>
                </div>
          </div>
  
        </div>
      </div>
      
  </div>
  </div>
      </section>
@endsection