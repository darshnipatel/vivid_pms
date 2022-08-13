@extends('layouts.user')
@section('content')
   <!-- page title -->
   <div class="container">
    <div class="row new-header-breadcrumbpading">

       <div class="col-md-12">
          <div class="wraper-breadcrumb">
            <h2 class="new-header-breadheding">
              Project List 
            </h2>
            <!-- nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Holidays</li>
              </ol>
            </nav -->
          </div>
       </div>

    </div>

  </div>
  
<!-- page title end-->
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          

          <div class="defult-boxwrap">
              <table class="table">
                <thead>
                  <tr>
                    <th>PROJRCT NAME</th>
                    <th>TECHNOLOGY</th>
                    <th>DEVLOPER</th>
                    <th>START DATE</th>
                    <th>END DATE</th>
                    <th>Priority</th>
                    <th>Hours</th>
                    <th>ACTION</th>
                  </tr>
                </thead>
                <tbody>
                 @foreach($projects as $project)
                  <tr>
                    <td>{{ $project->project_name }}</td>
                    <td>{{ $project->technology }}</td>
                    <td>{{ $project->employee->firstname }}</td>
                    <td>{{ date('d-m-Y', strtotime($project->start_date)) }}</td>
                    <td>{{ date('d-m-Y', strtotime($project->end_date)) }}</td>
                    <td>{{ $project->priority }}</td>
                    <td>10:05</td>
                    <td>
                      <button type="button" title="edit" data-bs-toggle="modal" data-bs-target="#projectedit">
                        <img src="../images/pen.png" alt="edit">
                      </button>
                      <button type="button" title="view" data-bs-toggle="modal" data-bs-target="#projectview">
                        <img src="../images/view.png" alt="view">
                      </button>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>    
              {{ $projects->links("pagination::bootstrap-4") }}    
          </div>
        </div>            
      </div>
    </div>
@endsection