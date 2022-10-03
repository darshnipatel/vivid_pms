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
                    <td>
                      @php 
                      $total_hours = 0;
                      foreach($project->project_summary as $summary){
                        $total_hours = number_format($total_hours + (float)$summary->hours , 2);
                      }
                      @endphp
                      {{ $total_hours }}
                    </td>
                    <td>
                      <button type="button" class="edit_project" title="edit" data-bs-toggle="modal" data-bs-target="#projectedit" data-id= "{{ $project->id }}"  data-projectname="{{ $project->project_name }}">
                        <img src="{{ asset('/images/pen.png') }}" alt="edit">
                      </button>
                      <button type="button" class="view_project" title="view" data-bs-toggle="modal" data-bs-target="#projectview" data-id= "{{ $project->id }}" >
                        <img src="{{ asset('images/view.png') }}" alt="view">
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

  <!-- project edit Modal -->
<div class="modal fade" id="projectedit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Project</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
         <form class="editmodalform" name="editmodalform" method="post" action=" {{ route('addprojectsummary') }}">
              @csrf
      <div class="modal-body">
         <input type="hidden" name="project_id" value="" class="form-control"/>
        <div class="form-group">
          <label>Project Name:</label>
          <input type="text" name="project_name" value="Glofox" class="form-control" />
        </div>
        <div class="form-group">
          <label>Date:</label>
          <input type="text" name="date" placeholder="dd-mm-yyyy" class="form-control datepicker" autocomplete="off" />
        </div>
        <div class="form-group">
          <label>Hours:</label>
          <input type="text" name="hours" placeholder="1:50" class="form-control" />
        </div>
        <div class="form-group">
          <label>Description:</label>
          <textarea name="details" placeholder="Description" class="form-control"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</div>

<!-- project view Modal -->
<div class="modal fade" id="projectview" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Project Summery</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <ul class="projectliast-desc">
       </ul>
      </div>
    </div>
  </div>
</div>
<script>
    $(".edit_project").on('click',function(){
         // $("#customerModal").modal('show');
          var id = $(this).data('id');  
          var name = $(this).data('projectname');  
          
        $("#projectedit").on('shown.bs.modal', function() { 
          $('.editmodalform input[name="project_id"]').val(id);
          $('.editmodalform input[name="project_name"]').val(name);
        });
    });
    $(".view_project").on('click',function(){
         var id = $(this).data('id'); 
        
          $.ajax({
            url: '<?php echo url('/get-project-summary'); ?>',
            type: 'GET',
            data:{id: id},
            success: function (data) {
                $('.projectliast-desc').html(data);
            }
          });
    });
     
  </script>
@endsection