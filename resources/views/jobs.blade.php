@extends('layouts.master')
 
@section('title', 'Jobs')
 
@section('content')
@include('includes.sidebar')

<div class="page-wrapper">
@include('includes.nav')  
    <div class="page-content">    
<div class="row">
  <div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Create Jobs</h6>
        @if(Session::has('success'))
                <p class="alert alert-success">{{ Session::get('success') }}</p>
              @endif
        <form class="forms-sample" action="{{ url('jobs') }}" method="post" target="_blank">
            {{ csrf_field() }}
          <div class="mb-3">
            <label for="exampleInputUsername1" required class="form-label">Job Title</label>
            <input type="text" name="name" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Job Title">
          </div>
          <div class="mb-3">
            <label for="exampleInputUsername1" required class="form-label">Job Date</label>
            <input type="date" name="date" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Job Date">
          </div>
          <div class="mb-3">
            <label for="exampleInputUsername1" required class="form-label">Client</label>
            <input type="text" name="client" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Client">
          </div> 
          <div class="mb-3">
            <label for="exampleInputUsername1" required class="form-label">Smart Jobs Number</label>
            <input type="text" name="smart_no" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Smart Jobs Number">
          </div>          
          <div class="mb-3">
            <label for="exampleInputUsername1" required  class="form-label">Works</label>
            <input type="text" name="works" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Works">
          </div>
          <div class="mb-3">
            <label for="exampleInputUsername1" class="form-label">Material</label>
            <input type="text" name="marterial" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Material">
          </div>         
          <div class="mb-3">
            <label for="exampleInputUsername1" required class="form-label">Client Name</label>
            <input type="text" name="client_name" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Client Name">
          </div>
          <div class="mb-3">
            <label for="exampleInputUsername1" required class="form-label">Client Position</label>
            <input type="text" name="position" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Client Position">
          </div>            
          <input class="btn btn-primary me-2" type="submit" name="preview" value="Preview Pdf" />
          <input type="text" name="worker_mail" class="form-control mb-3 mt-3" id="exampleInputUsername1" autocomplete="off" placeholder="Send Email">
          <input class="btn btn-primary me-2" type="submit" name="send" value="Send Pdf" />        
          <!-- <button type="submit" class="btn btn-primary me-2">Preview Pdf</button>
          <button type="submit" class="btn btn-primary me-2">Send Pdf</button> -->
        </form>
      </div>
    </div>
  </div>
</div>

      </div>
      @include('includes.footer')  
    </div>
@stop