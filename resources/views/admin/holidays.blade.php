@extends('layouts.admin')

@section('content')

  <!-- page title -->
  <div class="container">
    <div class="row new-header-breadcrumbpading">

       <div class="col-md-12">
          <div class="wraper-breadcrumb">
            <h2 class="new-header-breadheding">Add Holidays</h2>
          </div>
       </div>

    </div>

  </div>
<!-- page title end-->
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="defult-boxwrap">
            <div class="pms-login-from-wrapper-admin">
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
              <form name="pms-holiday-form-admin" id="addHoliday-form" method="post" action="{{ route('holidays.store')}}">
              @csrf
                <div class="form-group-wrapper">
                  <div class="form-group">
                    <label>Name</label>
                    <input name="name" type="text" class="form-control" placeholder="Enter Name" />
                  </div>
                  <div class="form-group">
                    <label>Date</label>
                    <input name="date" type="text" class="form-control datepicker" placeholder="dd-mm-yyyy"  autocomplete="off"/>
                  </div>
                  <div class="form-group">
                        <label>Type</label>
                                             <div class="radiobox-div">
                              <input type="radio" id="FullDay"  name="type" value="full"> 
                              <label for="FullDay">Full Day</label>                             
                        </div>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <div class="radiobox-div">
                              <input type="radio" id="HalfDay"  name="type" value="half">
                              <label for="HalfDay">Half Day</label>                             
                        </div>         
                  </div>
                </div>
                <button type="submit" class="btn btn-submit">
                  Submit
                </button>
              </form>
            </div>
          </div>
            <div class="defult-boxwrap">
              <!-- Table -->
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Date</th>
                      <th>Holiday name</th>
                      <th>Type</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if($holidays->isNotEmpty())
                    @php($i=1)
                      @foreach($holidays as $holiday)
                      <?php 
                      if($holiday->status == "Active")
                          $class = "bg-success";
                      else if($holiday->status == "Pending")
                          $class = "bg-warning";
                      else if($holiday->status == "Cancel")
                          $class = "bg-danger";
                      ?>
                      <tr>
                        <td>{{ $i++ }}</td>
                        <td class="date">{{ date('d-m-Y', strtotime($holiday->date)) }}</td>
                        <td class="name" >{{ $holiday->name }}</td>
                        <td class="type">{{ $holiday->type }}</td>
                        <td>                     
                          <span class="status badge {{ $class }}">{{ $holiday->status }}</span>
                        </td>
                        <td>
                        <button type="button" class="holiday_edit" title="edit" data-bs-toggle="modal" data-bs-target="#editholiday" data-href= "{{route('holidays.update',$holiday->id)}}">
                          <img src="{{ asset('/images/pen.png')}}" alt="edit">
                        </button>
                        <a href="javascript:void(0);" title="delete" class="delete_holiday" title="delete" data-bs-toggle="modal" data-bs-target="#holidaydelete" data-href= "{{route('holidays.destroy', $holiday->id)}}"><img src="{{ asset('images/bin.png') }}" alt="delete">
                        </a>
                      </td>
                      </tr>
                      @endforeach
                    @else
                       <tr>
                          <td colspan="6" align="center">
                              <h3 class="nodata-found">No Data Found</h3>
                          </td>
                      </tr>
                    @endif
                  </tbody>
                </table>
            </div>
          </div>            
        </div>
      </div>
    </div>

     <!-- Edit Holiday Modal -->
  <div class="modal fade" id="editholiday" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Holiday</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         <form method="post" class="modalform" action=" {{ route('holidays.update' , 1 ) }}">
            @csrf
            @method('PUT')
            <div class="row">
               <div class="col-md-12">
                     <div class="form-group">
                       <label>Name</label>
                       <input name="name" type="text" class="form-control" placeholder="Enter Name">
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group">
                       <label>Date</label>
                       <input name="date" type="text" class="form-control datepicker">
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group">
                       <label>Type</label>
                        <div class="radiobox-div">
                              <input type="radio" id="FullDay"  name="type" value="full"> 
                              <label for="FullDay">Full Day</label>                             
                        </div>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <div class="radiobox-div">
                              <input type="radio" id="HalfDay"  name="type" value="half">
                              <label for="HalfDay">Half Day</label>                             
                        </div> 
                     </div>
                  </div>
                    <div class="form-group">
                       <label>Status</label>   
                       <div class="radiobox-div">
                              <input type="radio" id="Active"  name="status" value="Active"> 
                              <label for="Active">Active</label>                             
                        </div>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <div class="radiobox-div">
                              <input type="radio" id="Pending" name="status" value="Pending"> 
                              <label for="Pending">Pending</label>                             
                        </div>
                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <div class="radiobox-div">
                              <input type="radio" id="Cancel" name="status" value="Cancel"> 
                              <label for="Cancel">Cancel</label>                             
                        </div> 
                    </div>
            </div>
            <div class="submit-section">
               <button class="btn">Save</button>
            </div>
         </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade bd-example-modal-lg" id="holidaydelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Holiday</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="delete-holiday"  action=""
                              method="post">
             @csrf @method('DELETE')
             <div class="modal-body">
                <div class="row">
                  <div class="col-md-6">
                    Are you sure want to delete this?
                  </div>
                </div>
            </div>
            <div  class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Delete</button>
            </div>
            </form>
        </div>
    </div>
  </div>
</div>

<script>
    $('.delete_holiday').click(function() {
      var action = $(this).data('href'); 
      $('#delete-holiday').attr('action',action); 
    })
    $("#addHoliday-form").on('submit',function(){
        jQuery('.btn-submit').attr('disabled', 'disabled');
    });
    $(".holiday_edit").on('click',function(){
         // $("#customerModal").modal('show');
        var action = $(this).data('href');  
        var current_row = $(this).closest('tr');
        var name = current_row.find('.name').html();  
        var date = current_row.find('.date').html();  
        var type = current_row.find('.type').html(); 
        console.log(type); 
        var status = current_row.find('.status').html();  
        $("#editholiday").on('shown.bs.modal', function() { 
          $('.modalform').attr('action',action);
          $('.modalform input[name="name"]').val(name);
          $('.modalform input[name="date"]').val(date);
          $('.modalform input[name=type][value="' + type +'"]').prop('checked', true);
          $('.modalform input[name=status][value="' + status +'"]').prop('checked', true);
        });
    });
  </script>
@endsection