@extends('layouts.home')

@section('content')
<div class="position-relative">
    <section class ="section section-components pb-0">
        <div class="container container-lg">
                <div class="row">
                        <div class="col-md-6 mb-5 mb-md-0">
                          <div class="card card-lift--hover shadow border-0">
                            <a href="/profile" title="Landing Page">
                              <img src="./assets/img/theme/profile.jpg" class="card-img">
                            </a>
                          </div>
                          <div class="row justify-content-center">
                                <h3>Profile</h3>
                                </div>
                        </div>
                        <div class="col-md-6 mb-5 mb-lg-0">
                          <div class="card card-lift--hover shadow border-0">
                            <a href="/products" title="Profile Page">
                              <img src="./assets/img/theme/product.jpg" class="card-img">
                            </a>
                          </div>
                          <div class="row justify-content-center">
                                <h3>Products</h3>
                                </div>
                        </div>
                      </div>
            </div>

    </section>

    <section class ="section section-components pb-0">
            <div class="container container-lg">
                    <div class="row">
                            <div class="col-md-6 mb-5 mb-md-0">
                              <div class="card card-lift--hover shadow border-0">
                                <a href="/messages" title="Landing Page">
                                  <img src="./assets/img/theme/notification.jpg" class="card-img">
                                </a>
                              </div>
                              <div class="row justify-content-center">
                                <h3>Messages</h3>
                                </div>
                        </div>
                            <div class="col-md-6 mb-5 mb-lg-0">
                              <div class="card card-lift--hover shadow border-0">
                                <a href="" title="Profile Page">
                                  <img src="./assets/img/theme/placeholder.png" class="card-img">
                                </a>
                              </div>
                              <div class="row justify-content-center">
                                <h3>Placeholder</h3>
                                </div>
                            </div>
                          </div>
                </div>

        </section>
</div>

@endsection
