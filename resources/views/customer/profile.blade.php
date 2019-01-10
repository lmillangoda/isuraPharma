@extends('layouts.users')

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
            <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1"
                 xmlns="http://www.w3.org/2000/svg">
                <polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
    </section>
    <section class="section">
        <div class="container col-10">
            <div class="card card-profile shadow mt--300">
                <div class="px-4">
                    <div class="row justify-content-center">
                        <div class="col-xl-8 order-xl-1">
                            <div class="card bg-secondary shadow">
                                <div class="card-header bg-white border-0">
                                    <div class="card-body col-12">
                                        <div class="pl-lg-4">
                                            <div class="d-flex justify-content-between">
                                                <h5 class="heading-small text-muted mb-4">User Profile</h5>
                                                @if(isset($user))
                                                <a href="custedit">
                                                <button type="button" class="btn btn-sm btn-default float-right">
                                                    settings
                                                </button></a>
                                                @else
                                                <a href="profile">
                                                        <button type="button" class="btn btn-sm btn-default float-right">
                                                            Cancel
                                                        </button>
                                                    </a>
                                                @endif
                                            </a>
                                            </div>
                                        </div>
                                        @if(isset($userprof))
                                        <form action = "{{route('custstore')}}" method = "post">
                                            @csrf
                                    @endif
                                        @if(isset($userprof))
                                        <input id="id" type="text" name="id" value="{{$userprof->id}}" hidden>
                                    @endif


                                    <div class="pl-lg-4">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label style="color:black;" class="form-control-label"
                                                           for="input-email">Email address</label>

                                                    @if(isset($user))
                                                        <input id="input-email" type="email"
                                                               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                               name="email" value="{{ $user->email}}"
                                                               placeholder="example@123.com" required autofocus>
                                                    @else
                                                        <input id="input-email" type="email"
                                                               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                               name="email" value="{{ $userprof->email }}"
                                                               placeholder="example@123.com" required autofocus>
                                                    @endif
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
                                                    <label style="color:black;" class="form-control-label"
                                                           for="input-fname">First Name</label>

                                                    @if(isset($user))
                                                        <input id="input-fname"
                                                               class="form-control{{ $errors->has('fname') ? ' is-invalid' : '' }}"
                                                               placeholder="First Name" name="fname"
                                                               value="{{ $user->fName }}" type="text" required
                                                               autofocus>
                                                    @else
                                                        <input id="input-fname"
                                                               class="form-control{{ $errors->has('fname') ? ' is-invalid' : '' }}"
                                                               placeholder="First Name" name="fname"
                                                               value="{{ $userprof->fName }}" type="text" required
                                                               autofocus>
                                                               @if ($errors->has('fname'))
                                                               <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('fname') }}</strong>
                                                                </span>
                                                                @endif
                                                    @endif


                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label style="color:black;" class="form-control-label"
                                                           for="input-mname">Middle Name</label>

                                                    @if(isset($user))
                                                        <input id="input-mname"
                                                               class="form-control{{ $errors->has('mname') ? ' is-invalid' : '' }}"
                                                               placeholder="Middle Name" name="mname"
                                                               value="{{ $user->mName }}" type="text" required
                                                               autofocus>
                                                    @else
                                                        <input id="input-mname"
                                                               class="form-control{{ $errors->has('mname') ? ' is-invalid' : '' }}"
                                                               placeholder="Middle Name" name="mname"
                                                               value="{{ $userprof->mName }}" type="text" required
                                                               autofocus>
                                                               @if ($errors->has('mname'))
                                                               <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('mname') }}</strong>
                                                                </span>
                                                                @endif
                                                    @endif
 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label style="color:black;" class="form-control-label"
                                                           for="input-lname">Last Name</label>
                                                    @if(isset($user))
                                                        <input id="input-lname"
                                                               class="form-control{{ $errors->has('lname') ? ' is-invalid' : '' }}"
                                                               placeholder="Last Name" name="lname"
                                                               value="{{ $user->lName }}" type="text" required
                                                               autofocus>
                                                    @else
                                                        <input id="input-lname"
                                                               class="form-control{{ $errors->has('lname') ? ' is-invalid' : '' }}"
                                                               placeholder="Last Name" name="lname"
                                                               value="{{ $userprof->lName }}" type="text" required
                                                               autofocus>
                                                               @if ($errors->has('lname'))
                                                               <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('lname') }}</strong>
                                                                </span>
                                                                @endif
                                                    @endif
 
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label style="color:black;" class="form-control-label"
                                                           for="input-tel">Telephone NO</label>

                                                    @if(isset($user))
                                                        <input id="input-tel"
                                                               class="form-control{{ $errors->has('tel') ? ' is-invalid' : '' }}"
                                                               placeholder="Telephone NO" name="tel"
                                                               value="{{ $user->tel }}" type="text" required
                                                               autofocus>
                                                    @else
                                                        <input id="input-tel"
                                                               class="form-control{{ $errors->has('tel') ? ' is-invalid' : '' }}"
                                                               placeholder="Telephone NO" name="tel"
                                                               value="{{ $userprof->tel }}" type="text" required
                                                               autofocus>
                                                               @if ($errors->has('tel'))
                                                                <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('tel') }}</strong>
                                                                </span>
                                                                @endif
                                                    @endif
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="my-4"/>
                                    <h6 style="color:black;font-size:medium" class="heading-small mb-4">Address</h6>

                                    <div class="pl-lg-4">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label style="color:black;" class="form-control-label"
                                                           for="input-hno">Home Address NO</label>

                                                    @if(isset($user))
                                                        <input id="input-hno"
                                                               class="form-control{{ $errors->has('hno') ? ' is-invalid' : '' }}"
                                                               placeholder="Home Address NO" name="hno"
                                                               value="{{ $user->hNo }}" type="text" required
                                                               autofocus>
                                                    @else
                                                        <input id="input-hno"
                                                               class="form-control{{ $errors->has('hno') ? ' is-invalid' : '' }}"
                                                               placeholder="Home Address NO" name="hno"
                                                               value="{{ $userprof->hNo }}" type="text" required
                                                               autofocus>
                                                               @if ($errors->has('hno'))
                                                                <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('hno') }}</strong>
                                                                </span>
                                                                @endif
                                                    @endif
                                                    
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label style="color:black;" class="form-control-label"
                                                           for="input-line1">Address Line 1</label>

                                                    @if(isset($user))
                                                        <input id="input-line1"
                                                               class="form-control{{ $errors->has('line1') ? ' is-invalid' : '' }}"
                                                               placeholder="Line 1" name="line1"
                                                               value="{{ $user->add1 }}" type="text" required
                                                               autofocus>
                                                    @else
                                                        <input id="input-line1"
                                                               class="form-control{{ $errors->has('line1') ? ' is-invalid' : '' }}"
                                                               placeholder="Line 1" name="line1"
                                                               value="{{ $userprof->add1 }}" type="text" required
                                                               autofocus>
                                                               @if ($errors->has('line1'))
                                                               <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('line1') }}</strong>
                                                                </span>
                                                                @endif
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label style="color:black;" class="form-control-label"
                                                           for="input-line2">Address Line 2</label>

                                                    @if(isset($user))
                                                        <input id="input-line2"
                                                               class="form-control{{ $errors->has('line2') ? ' is-invalid' : '' }}"
                                                               placeholder="Line 2" name="line2"
                                                               value="{{ $user->add2}}" type="text" required
                                                               autofocus>
                                                    @else
                                                        <input id="input-line2"
                                                               class="form-control{{ $errors->has('line2') ? ' is-invalid' : '' }}"
                                                               placeholder="Line 2" name="line2"
                                                               value="{{ $userprof->add2 }}" type="text" required
                                                               autofocus>
                                                               @if ($errors->has('line2'))
                                                               <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('line2') }}</strong>
                                                                </span>
                                                           @endif
                                                    @endif
                                                   
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label style="color:black;" class="form-control-label"
                                                           for="input-town">Town</label>

                                                    @if(isset($user))
                                                        <input id="input-town" type="town"
                                                               class="form-control{{ $errors->has('town') ? ' is-invalid' : '' }}"
                                                               name="town" value="{{ $user->town }}"
                                                               placeholder="Town" required>
                                                    @else
                                                        <input id="input-town" type="town"
                                                               class="form-control{{ $errors->has('town') ? ' is-invalid' : '' }}"
                                                               name="town" value="{{ $userprof->town }}"
                                                               placeholder="Town" required>
                                                               @if ($errors->has('town'))
                                                                <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('town') }}</strong>
                                                                </span>
                                                                @endif
                                                    @endif
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   
                                    <hr class="my-4"/>
                                    <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label style="color:black;" class="form-control-label"
                                                       for="input-branch">Branch</label>
                                                       @if(isset($user))
                                                       <input id="input-town" type="text"
                                                       class="form-control{{ $errors->has('town') ? ' is-invalid' : '' }}"
                                                       name="town" value="{{ $user->branch_id }}"
                                                       placeholder="Town" required>
                                                    @else
                                                <select class="form-control" id="input-branch" name="branch">
                                                    @foreach ($branch as $item)
                                                        <option value="{{$item->id}}">{{$item->id}}
                                                            - {{$item->town}}</option>
                                                    @endforeach
                                                        </select>
                                                    @endif
                                            </div>
                                        </div>
                                    </div>
                                  

                                    <div class="col-lg-6" hidden>
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-role">Role</label>
                                                <input id="role" type="text" class="form-control" name="role" value="3"
                                                       required>
                                            </div>
                                        </div>
                                    @if(isset($user))

                                    @else
                                    <div class="pl-lg-4">
                                        <center>
                                            <button class="btn btn-primary" type="submit">Submit</button>
                                        </center>
                                    </div>
                                </form>
                                    @endif
                                    
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
