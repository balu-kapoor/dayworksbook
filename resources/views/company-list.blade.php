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
        <h6 class="card-title">Company List</h6>
        <div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>
                  Organisation Name
                </th>
                <th>
                Organisation Address
                </th>
                <th>
                Organisation ABN
                </th>
                <th>
                Organisation Reference Code
                </th>               
              </tr>
            </thead>
            <tbody>
                @foreach($com as $c)
              <tr>
                <td>
                    {{ $c->data()['organisationName'] }}
                </td>
                <td>
                {{ $c->data()['organisationAddress'] }}
                </td>
                <td>
                {{ $c->data()['organisationNameAbn'] }}
                </td>
                <td>
                {{ $c->data()['referenceCode'] }}
                </td>                
              </tr>   
              @endforeach           
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