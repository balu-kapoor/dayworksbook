@extends('layouts.master')
 
@section('title', 'Jobs')
 
@section('content')
@include('includes.sidebar')

<div class="page-wrapper">
@include('includes.nav')  
     <div class="page-content">
        

<div class="row">
  <div class="grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Jobs List</h6>
        <a href="{{ url('jobs') }}" class="float-end create">Create job</a>
        <div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>
                  Job Title
                </th>
                <th>
                Job Date
                </th>
                <th>
                Client
                </th>
                <th>
                Smart Job Number
                </th> 
                <th>
                    Works
                </th>  
                <th>Material</th>             
                <th>Client Name</th>
                <th>Client Position</th>
              </tr>
            </thead>
            <tbody>
              @isset($jobs)
                @foreach($jobs as $job)
              <tr>
                <td>
                    {{ $job->data()['name'] ?? ''}}
                </td>
                <td>
                {{ $job->data()['date'] ?? ''}}
                </td>
                <td>
                {{ $job->data()['client'] ?? ''}}
                </td>
                <td>
                {{ $job->data()['smartNumber'] ?? ''}}
                </td> 
                <td>
                {{ $job->data()['works'] ?? ''}}
                </td>            
                <td>
                {{ $job->data()['material'] ?? ''}}
                </td>     
                <td>
                {{ $job->data()['clientName'] ?? ''}}
                </td> 
                <td>
                {{ $job->data()['position'] ?? ''}}
                </td> 
              </tr>   
              @endforeach    
              @endisset      
            </tbody>
          </table>
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
      @include('includes.footer')  
    </div>
@stop