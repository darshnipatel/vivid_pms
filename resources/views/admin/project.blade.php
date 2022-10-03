@extends('layouts.admin')

@section('content')

   <!-- page title -->
   <div class="container">
    <div class="row new-header-breadcrumbpading">

       <div class="col-md-12">
          <div class="wraper-breadcrumb">
            <h2 class="new-header-breadheding">
             Add Project 
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
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="post" action="{{ route('project.store') }}" enctype="multipart/form-data">
          <div class="defult-boxwrap">
                @csrf
                <!-- project name start-->
                <div class="form-group">
                  <label>Project Name*</label>
                  <input type="text" name="project_name" id="project_name" class="form-control" placeholder="" />
                </div>

                 <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="form-group">
                      <select name="client_id" class="pms-client-name form-control">
                        @foreach($clients as $client)
                          <option value="{{ $client->id }}" >{{ $client->name }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="form-group">                    
                      <input type="text" name="start_date" placeholder="Start Date" class="form-control datepicker" autocomplete="off" />
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="form-group">
                      <input type="text" name="end_date" placeholder="End Date" class="form-control datepicker" autocomplete="off" />
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="form-group">
                      <select name="priority" class="pms-client-name form-control">
                        <option value="">Select Priority</option>
                        <option value="High">High</option>
                        <option value="Medium">Medium</option>
                        <option value="Low">Low</option>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="form-group">
                      <label>Rate</label>
                      <input type="text" name="rate" class="form-control" placeholder="Rate*" />
                    </div>
                  </div>

                  <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="form-group">
                      <label>Type</label>
                      <select name="type" class="form-control">
                        <option value="">Select Type</option>
                        <option value="Hourly">Hourly</option>
                        <option value="Fixed">Fixed</option>
                      </select>
                    </div>
                  </div>

                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                  <div class="form-group">
                    <label>Select Employee</label>
                    <select name="employee_id" class="pms-client-name form-control">
                    <option value="">Select Employee</option>
                      @foreach($employees as $employee )
                        <option value="{{ $employee->id }}">{{ $employee->firstname }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                  <div class="form-group">
                    <label>Select Technology</label>
                    <select name="technology" class="pms-client-name form-control">
                      <option value="">Select Technology</option>
                      <option value="Python">Python</option>
                      <option value="PHP">PHP</option>
                      <option value="Java">Java</option>
                      <option value="Ruby">Ruby</option>
                    </select>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <div class="form-group">
                  <div class="input-images"></div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <div class="form-group">
                    <textarea  name="description" class="form-control" placeholder="Enter Description"></textarea>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <button type="submit" class="btn">Create</button>
                </div>
              </div>
        </form>
          <div class="defult-boxwrap">
              <h2 class="defult-boxtitle">Project List</h2>
              <table class="table">
                <thead>
                  <tr>
                    <th >NAME</th>
                    <th >TECHNOLOGY</th>
                    <th >DEVLOPER</th>
                    <th >CLIENT</th>
                    <th >START DATE</th>
                    <th >END DATE</th>
                    <th >Type</th>
                    <th >Priority</th>
                    <th >Rate</th>
                    <th >Status</th>
                    <th >ACTION</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($projects as $project)
                  <tr>
                    <td class="project_name">{{ $project->project_name }}</td>
                    <td class="technology">{{ $project->technology }}</td>
                    <td class="employee" >{{ $project->employee->firstname }}</td>
                    <td class="client">{{ $project->client->name }}</td>
                    <td class="start_date">{{ ($project->start_date != '') ? date('d-m-Y', strtotime($project->start_date) ) : '' }}</td>
                    <td class="end_date" >{{ ($project->end_date != '') ? date('d-m-Y', strtotime($project->end_date) ) : '' }}</td>
                    <td class="type">{{ $project->type }}</td>
                    <td class="priority">{{ $project->priority }}</td>
                    <td class="rate">{{ $project->rate }}</td>
                    <td class="status">
                      <select class="form-control project_status" name="project_status" data-id="{{ $project->id }}">
                        <option value="Not Started" @if($project->status == "") selected @endif>Not Started</option>
                        <option value="In Progress" @if($project->status == "In Progress") selected @endif>In Progress</option>
                        <option value="Completed" @if($project->status == "Completed") selected @endif>Completed</option>
                      </select>
                    </td>
                    <td class="description" style="display: none;">{{ $project->description }}</td>
                    <td class="attached_files" style="display: none;" value="{{$project->attached_files }}">
                      @php
                        $files = explode(',',$project->attached_files);
                        if(!empty($project->attached_files))
                        {
                          foreach($files as $file)
                          {
                            @endphp
                              <div style="display: inline">
                                  <img style="max-width: 20%;" class="img-thumbnail" src="{{  env('APP_URL') }}/storage/app/public/uploads/{{ $file }}" />
                              </div>
                            @php
                          }
                        }
                      @endphp
                    </td>
                    <td>
                      <button type="button" class="project_edit" title="edit" data-bs-toggle="modal" data-bs-target="#projectedit" data-href= "{{route('project.update',$project->id)}}">
                        <img src="{{ asset('/images/pen.png')}}" alt="edit">
                      </button>
                      <a href="javascript:void(0);" title="delete" onclick="event.preventDefault(); document.getElementById('delete-project-{{$project->id}}').submit();"><img src="{{ asset('images/bin.png') }}" alt="delete"></a>
                      <a href="{{ route('project.show',$project->id) }}" title="view"><img src="{{ asset('/images/view.png') }}" alt="view"></a>
                        <form id="delete-project-{{$project->id}}"  action="{{route('project.destroy', $project->id)}}"
                            method="post">
                            @csrf @method('DELETE')
                        </form>
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
    <div class="modal fade bd-example-modal-lg" id="projectedit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Project Daily Update</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" class="modalform" enctype="multipart/form-data" action=" {{ route('client.update' , 1 ) }}">
        @csrf
        @method('PUT')   
      <div class="modal-body">
      
          <div class="form-group">
            <label>Project Name*</label>
            <input name="project_name" type="text" class="form-control" placeholder="" />
          </div>

          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
              <div class="form-group">
                <select name="client_id" class="pms-client-name form-control">
                  @foreach($clients as $client)
                    <option value="{{ $client->id }}" >{{ $client->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
              <div class="form-group">                    
              <input type="text" name="start_date" placeholder="Start Date" class="form-control datepicker"/>
              </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
              <div class="form-group">
                <input type="text"  name="end_date" placeholder="End Date" class="form-control datepicker"/>
              </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
              <div class="form-group">
                <select name="priority" class="pms-client-name form-control">
                  <option value="">Select Priority</option>
                  <option value="High">High</option>
                  <option value="Medium">Medium</option>
                  <option value="Low">Low</option>
                </select>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
              <div class="form-group">
                <label>Rate</label>
                <input name="rate" type="text" class="form-control" placeholder="Rate*" />
              </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
              <div class="form-group">
                <label>Type</label>
                <select name="type" class="form-control">
                  <option value="">Select Type</option>
                  <option value="Hourly">Hourly</option>
                  <option value="Fixed">Fixed</option>
                </select>
              </div>
            </div>

          <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
            <div class="form-group">
              <label>Select Employee</label>
              <select name="employee_id" class="pms-client-name form-control">
                <option value="">Select Employee</option>
                  @foreach($employees as $employee )
                    <option value="{{ $employee->id }}">{{ $employee->firstname }}</option>
                  @endforeach
                </select>
            </div>
          </div>

          <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
            <div class="form-group">
              <label>Select Technology</label>
              <select name="technology" class="pms-client-name form-control">
                <option value="">Select Technology</option>
                <option value="Python">Python</option>
                <option value="PHP">PHP</option>
                <option value="Java">Java</option>
                <option value="Ruby">Ruby</option>
              </select>
            </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="form-group">
            <div class="edit-input-images"></div>
            </div>
            <div class="preview_files">
            </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="form-group">
              <textarea name="description" class="form-control" placeholder="Enter Discription"></textarea>
            </div>
          </div>
        </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
  </div>
</div>
</div>
<script>
    $('.input-images').imageUploader({
      imagesInputName:'project_files',
      preloadedInputName:'preloaded',
      label:'Drag & Drop files here or click to browse'
    });
    $(".project_edit").on('click',function(){
        var action = $(this).data('href');  
        var current_row = $(this).closest('tr');
        var name = current_row.find('.project_name').html();  
        var technology = current_row.find('.technology').html();  
        var developer = current_row.find('.employee').html();  
        var client = current_row.find('.client').html();  
        var start_date = current_row.find('.start_date').html();  
        var end_date = current_row.find('.end_date').html();  
        var type = current_row.find('.type').html();  
        var priority = current_row.find('.priority').html();  
        var rate = current_row.find('.rate').html();  
        var description = current_row.find('.description').html();  
        var images = [];
        var cnt = 1;
        current_row.find('.attached_files div').each(function(){
          var img = {};
          img['id'] = cnt;
          img['src'] = $(this).find('img').attr('src');
          cnt = cnt + 1;
          images.push(img);
        });
        $('.edit-input-images').imageUploader({
          imagesInputName:'edit_project_files',
          preloaded: images,
          label:'Drag & Drop files here or click to browse'
        });
        $("#projectedit").on('shown.bs.modal', function() { 
          $('.modalform').attr('action',action);
          $('.modalform input[name="project_name"]').val(name);
          $('.modalform select[name=technology] option[value="' + technology +'"]').prop('selected', true);
          $('.modalform select[name=employee_id] option:contains('+ developer +')').prop('selected', true);
          $('.modalform select[name=client_id] option[value="'+ client +'"]').prop('selected', true);
          $('.modalform select[name=type] option[value="'+ type +'"]').prop('selected', true);
          $('.modalform select[name=priority] option[value="'+ priority +'"]').prop('selected', true);
          $('.modalform input[name="rate"]').val(rate);
          $('.modalform input[name="start_date"]').val(start_date);
          $('.modalform input[name="end_date"]').val(end_date);
          $('.modalform textarea[name="description"]').val(description);
          $('.modalform .preview_files').html(images);
        });
      
    });
    $('#projectedit').on('hidden.bs.modal', function () {
       //$('input[name="project_files"]').val("");
       $('.edit-input-images').html('');
    });
    $('.project_status').change(function(){
          var id = $(this).data('id');
          $.ajax({
            url: '<?php echo url('/admin/project-status-update'); ?>',
            type: 'POST',
            dataType: 'json',
            data:{project_id: id,status:$(this).val(), _token:"{{ csrf_token() }}"},
            success: function (data) {
            }
          });
        });
  </script>
@endsection