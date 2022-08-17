@extends('layouts.admin')
@section('content')

  <!-- page title -->
  <div class="container">
      <div class="row new-header-breadcrumbpading">
         <div class="col-md-12">
            <div class="wraper-breadcrumb">
              <h2 class="new-header-breadheding">Employee</h2>
            </div>
         </div>
      </div>
    </div>
    <!-- page title end-->
    <div class="container">
      <div class="row">
        @foreach($employees as $employee)
        <div class="col-md-3">
            <a href="{{ route('employeedetail', $employee->id) }}">
               <div class="defult-boxwrap employee-boxdiv">  
                <img id="preview_img" src="{{ env('APP_URL') }}/storage/app/public/uploads/{{ $employee->profile_image }}" alt="employee"/>              
                
                 <h4>{{ $employee->firstname }}</h4>
                 <!-- <p>{{ $employee->designation }}</p> -->
               </div>
            </a>
        </div>
        @endforeach
      </div>
    </div>

@endsection