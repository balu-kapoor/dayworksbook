@extends('layouts.master')
 
@section('title', 'Login')
 
@section('content')
<div class="page-wrapper full-page">
      <div class="page-content d-flex align-items-center justify-content-center">

  <div class="row w-100 mx-0 auth-page">
    <div class="col-md-8 col-xl-6 mx-auto">
      <div class="card">
        <div class="row">
          <div class="col-md-4 pe-md-0">
          <div class="auth-side-wrapper" style="background-image: url(https://www.nobleui.com/laravel/template/demo1/assets/images/photos/img6.jpg)">

            </div>
          </div>
          <div class="col-md-8 ps-md-0">
            <div class="auth-form-wrapper px-4 py-5">
              <img src="{{ asset('images/logo.png') }}" alt="">
              <!-- <a href="#" class="noble-ui-logo d-block mb-2">Day Work<span>Book</span></a> -->
              <h5 class="text-muted fw-normal mb-4">Welcome back! Log in to your account.</h5>
              @if(Session::has('error'))
                <p class="alert alert-danger">{{ Session::get('error') }}</p>
              @endif
              <form class="forms-sample" action="{{ url('login') }}" method="post">
                {{ csrf_field() }}
                <div class="mb-3">
                  <label for="userEmail" class="form-label">Email address</label>
                  <input type="email" name="email" class="form-control" id="userEmail" placeholder="Email">
                </div>
                <div class="mb-3">
                  <label for="userPassword" class="form-label">Password</label>
                  <input type="password" class="form-control" id="userPassword" autocomplete="current-password" name="password" placeholder="Password">
                </div>
                <div class="form-check mb-3">
                  <input type="checkbox" class="form-check-input" id="authCheck">
                  <label class="form-check-label" for="authCheck">
                    Remember me
                  </label>
                </div>
                <div>
                  <input type="submit" class="btn btn-primary me-2 mb-2 mb-md-0" value="Login">
                 
                </div>
                <a href="{{ url('register') }}" class="d-block mt-3 text-muted">Not a user? Sign up</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
    </div>
@stop