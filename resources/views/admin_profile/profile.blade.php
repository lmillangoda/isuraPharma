@extends("layouts.admin")
@section('content')

    <div class="header bg-gradient-default pb-5 pt-5 pt-md-5">
        <div class="container-fluid">
            <div class="header-body">

            </div>
        </div>
    </div>

    <div class="container col-12 mt-5">
            @if (\Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show">              
              <p>{{ \Session::get('success') }}</p> 
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> 
            </div>
            @endif 
            @if (\Session::has('fail'))
            <div class="alert alert-danger alert-dismissible fade show">              
              <p>{{ \Session::get('fail') }}</p> 
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> 
            </div>
            @endif
        <div class="card card-profile shadow">
            <div class="px-4">
                <div class="row justify-content-center">
                    <div class="col-xl-8 order-xl-1">
                        <div class="card bg-secondary shadow">
                            <div class="card-header bg-white border-0">
                                <div class="card-body">                     <!-- Profile View -->
                                    <div class="pl-lg-4">
                                        <div class="d-flex justify-content-center">
                                            <P style="font-size:large"><b>User Profile</b></p>
                                        </div>
                                    </div>
                                    <div class="pl-lg-4">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="email">Email address</label>
                                                    <input style="font-color:" id="email" type="email"
                                                           class="form-control" name="email" value="{{$user->email}}"
                                                           disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-fname">First
                                                        Name</label>
                                                    <input id="input-fname" class="form-control" name="fname"
                                                           value="{{$user->fName}}" type="text" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-mname">Middle
                                                        Name</label>
                                                    <input id="input-mname" class="form-control" name="mname"
                                                           value="{{$user->mName}}" type="text" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-lname">Last
                                                        Name</label>
                                                    <input id="input-lname" class="form-control" name="lname"
                                                           value="{{$user->lName}}" type="text" disabled>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-tel">Telephone
                                                        NO</label>
                                                    <input id="input-tel" class="form-control"
                                                           placeholder="{{$user->tel}}" name="tel" value="" type="text"
                                                           disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <h6 class="heading-small mb-4">Address</h6>

                                    <div class="pl-lg-4">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-hno">Home Address
                                                        NO</label>
                                                    <input id="input-hno" class="form-control"
                                                           placeholder="{{$user->hNo}}" name="hno" value="" type="text"
                                                           disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-line1">Address Line
                                                        1</label>
                                                    <input id="input-line1" class="form-control"
                                                           placeholder="{{$user->add1}}" name="line1" value=""
                                                           type="text" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-line2">Address Line
                                                        2</label>
                                                    <input id="input-line2" class="form-control"
                                                           placeholder="{{$user->add2}}" name="line2" value=""
                                                           type="text" disabled>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="pl-lg-4">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-lname">Town</label>
                                                    <input id="input-town" class="form-control"
                                                           placeholder="{{$user->town}}" name="town" value=""
                                                           type="text" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-4"/>
                                    <div class="pl-lg-4">
                                        <div class="d-flex justify-content-center">
                                            <P style="font-size:large"><b>Change Password</b></p>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-5">
                                            <button type="button" class="btn btn-block btn-default" data-toggle="modal"
                                                    data-target="#modal-form">Change Password
                                            </button>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="modal fade" id="modal-form" tabindex="-1" role="dialog"
                                             aria-labelledby="modal-form" aria-hidden="true">
                                            <!-- Password change modal -->
                                            <div class="modal-dialog modal- modal-dialog-centered modal-sm"
                                                 role="document">
                                                <div class="modal-content">
                                                    <div class="modal-body p-0">
                                                        <div class="card bg-secondary shadow border-0">
                                                            <div class="card-body px-lg-5 py-lg-5">
                                                                <div class="text-center text-muted mb-4">
                                                                    <small>Password Change</small>
                                                                </div>
                                                                <form role="form" method="post"
                                                                      action="{{route('cPassword')}}"
                                                                      enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="form-group">
                                                                        <div
                                                                            class="input-group input-group-alternative">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text"><i
                                                                                        class="ni ni-lock-circle-open"></i></span>
                                                                            </div>
                                                                            <input
                                                                                class="form-control{{ $errors->has('old_password') ? ' is-invalid' : '' }}"
                                                                                name="old_password"
                                                                                placeholder="Old Password"
                                                                                type="password" required autofocus>
                                                                            @if ($errors->has('old_password'))
                                                                                <span class="invalid-feedback"
                                                                                      role="alert">
                                                                  <strong>{{ $errors->first('old_password') }}</strong>
                                                                </span>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div
                                                                            class="input-group input-group-alternative">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text"><i
                                                                                        class="ni ni-lock-circle-open"></i></span>
                                                                            </div>
                                                                            <input
                                                                                class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                                                name="password"
                                                                                placeholder="New Password"
                                                                                type="password" required autofocus>
                                                                            @if ($errors->has('password'))
                                                                                <span class="invalid-feedback"
                                                                                      role="alert">
                                                                  <strong>{{ $errors->first('password') }}</strong>
                                                                </span>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div
                                                                            class="input-group input-group-alternative">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text"><i
                                                                                        class="ni ni-lock-circle-open"></i></span>
                                                                            </div>
                                                                            <input class="form-control"
                                                                                   placeholder="New Password Confirmation"
                                                                                   name="password_confirmation"
                                                                                   type="password" required autofocus>
                                                                        </div>
                                                                    </div>
                                                                    <div class="text-center">
                                                                        <button type="submit"
                                                                                class="btn btn-success my-4">Submit
                                                                        </button>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
@endsection
