@extends('layouts.prof')

@section('content')
<section class="section-profile-cover section-shaped my-0">
        <!-- Circles background -->
        <div class="shape shape-style-1 shape-primary alpha-4">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
        </div>
        <!-- SVG separator -->
        <div class="separator separator-bottom separator-skew">
          <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
            <polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
          </svg>
        </div>
      </section>
      <section class="section">
        <div class="container">
          <div class="card card-profile shadow mt--300">
            <div class="px-4">
              <div class="row justify-content-center">
                <div class="col-xl-8 order-xl-1">
                  <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                    <div class="card-body">

                          <div class="pl-lg-4">
                                  <div class="d-flex justify-content-between">
                                          <h5 class="heading-small text-muted mb-4">Edit User Profile</h5>
                                        </div>
                          </div>


                              <div class="pl-lg-4">
                                      <div class="row justify-content-center">
                                          <img src="" class="rounded-circle" width ="200" height ="200">  
                                      </div>
                                  </div>
                <form action = "store" method = "POST" enctype = "multipart/form-data">
                                    <hr class="my-4">
                        <h6 class="heading-small text-muted mb-4">User information</h6>
                        <div class="pl-lg-4">
                                <div class="row">
                                        <div class="col-md-12">
                                          <div class="form-group focused">
                                            <label class="form-control-label" for="image">Select Image</label>
                                            <input name="image" class="form-control form-control-alternative" type="file">
                                          </div>
                                        </div>
                                      </div>
                              <div class="row">
                                      <div class="col-md-12">
                                        <div class="form-group focused">
                                          <label class="form-control-label" for="input-name">Name</label>
                                          <input name="input-name" class="form-control form-control-alternative" placeholder="{{$user2->name}}"  type="text">
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                          <div class="col-md-12">
                                            <div class="form-group focused">
                                              <label class="form-control-label" for="input-email">E-mail</label>
                                              <input name="input-email" class="form-control form-control-alternative" placeholder="{{$user2->email}}"  type="text">
                                            </div>
                                          </div>
                                        </div>
                                        <div class="row">
                                              <div class="col-md-12">
                                                <div class="form-group focused">
                                                  <label class="form-control-label" for="input-address">Address</label>
                                                  <input name="input-address" class="form-control form-control-alternative" placeholder="{{$user2->address}}" type="text">
                                                </div>
                                              </div>
                                            </div>
                                            <div class="row">
                                                  <div class="col-md-12">
                                                    <div class="form-group focused">
                                                      <label class="form-control-label" for="input-telno">Tel-NO</label>
                                                      <input name="input-telno" class="form-control form-control-alternative" placeholder="{{$user2->tel_no}}"  type="text">
                                                    </div>
                                                  </div>
                                                </div>                         
                        </div>
                        <hr class="my-4">
                        <input type = "hidden" name = "_token" value = "{{csrf_token()}}">
                        <div class="d-flex justify-content-between">
                        <div class="pl-lg-4">
                                <div class="d-flex justify-content-between">
                                    <button type ="submit" class="btn btn-sm btn-default float-right">Save Changes</button>
                                </div>
                        </div>
                        <a href="/profile" class="btn btn-sm btn-danger">Discard Changes</a>
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
      </section>


@endsection
