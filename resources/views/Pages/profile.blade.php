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
                                                <h5 class="heading-small text-muted mb-4">User Profile</h5>
                                                <button type="submit" class="btn btn-sm btn-default float-right">
                                                    settings
                                                </button>
                                            </div>
                                        </div>
                                        <div class="pl-lg-4">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label class="form-control-label" for="email">Email
                                                            address</label>
                                                        <input id="email" type="email" class="form-control" name="email"
                                                               value="" placeholder="{{$user2->email}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label" for="input-fname">First
                                                            Name</label>
                                                        <input id="input-fname" class="form-control"
                                                               placeholder="{{$user2->fName}}" name="fname" value=""
                                                               type="text">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label" for="input-mname">Middle
                                                            Name</label>
                                                        <input id="input-mname" class="form-control"
                                                               placeholder="{{$user2->mName}}" name="mname" value=""
                                                               type="text">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label" for="input-lname">Last
                                                            Name</label>
                                                        <input id="input-lname" class="form-control"
                                                               placeholder="{{$user2->lName}}" name="lname" value=""
                                                               type="text">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label" for="input-tel">Telephone
                                                            NO</label>
                                                        <input id="input-tel" class="form-control"
                                                               placeholder="{{$user2->tel}}" name="tel" value=""
                                                               type="text">
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
                                                               placeholder="{{$user2->hNo}}" name="hno" value=""
                                                               type="text">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label class="form-control-label" for="input-line1">Address Line
                                                            1</label>
                                                        <input id="input-line1" class="form-control"
                                                               placeholder="{{$user2->add1}}" name="line1" value=""
                                                               type="text">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label class="form-control-label" for="input-line2">Address Line
                                                            2</label>
                                                        <input id="input-line2" class="form-control"
                                                               placeholder="{{$user2->add2}}" name="line2" value=""
                                                               type="text">

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
                                                               placeholder="{{$user2->town}}" name="town" value=""
                                                               type="text">
                                                    </div>
                                                </div>
                                            </div>
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
