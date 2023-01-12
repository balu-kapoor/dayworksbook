@extends('layouts.master')
 
@section('title', 'Company')
 
@section('content')
<!-- @include('includes.sidebar') -->
<div class="page-wrapper">
@include('includes.nav')  
      <div class="page-content">    
<div class="row">
  <div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6>Have Reference Number?</h6>
        <input type="text" name="reference_code" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Reference Number">
        <h6 class="m-3">OR</h6>
        <h6 class="card-title">Create Company</h6>
        <form class="forms-sample" action="{{ url('company') }}" method="post">
            {{ csrf_field() }}
          <div class="mb-3">
            <label for="exampleInputUsername1" required class="form-label">Company name</label>
            <input type="text" name="name" required class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Company name">
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" required class="form-label">Company address</label>
            <input type="text" class="form-control" name="address" id="exampleInputEmail1" placeholder="Company address">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Company Phone No.</label>
            <input type="text" class="form-control" name="phone" id="exampleInputPassword1" autocomplete="off" placeholder="Company Phone No.">
          </div>
          <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Company Email</label>
            <input type="text" class="form-control" name="email" id="exampleInputPassword1" autocomplete="off" placeholder="Company Email">
          </div>
          <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Company ABN Number</label>
            <input type="text" class="form-control" name="reference" id="exampleInputPassword1" autocomplete="off" placeholder="Company ABN Number">
          </div>
          <button type="submit" class="btn btn-primary me-2">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>

      </div>
      @include('includes.footer')
         </div>
@stop