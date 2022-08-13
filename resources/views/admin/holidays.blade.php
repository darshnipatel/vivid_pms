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
              <form name="pms-holiday-form-admin" method="post" action="{{ route('holidays.store')}}">
              @csrf
                <div class="form-group-wrapper">
                  <div class="form-group">
                    <label>Name</label>
                    <input name="name" type="text" class="form-control" placeholder="Enter Name" />
                  </div>
                  <div class="form-group">
                    <label>Date</label>
                    <input name="date" type="text" class="form-control datepicker" placeholder="mm/dd/yyyy"  autocomplete="off"/>
                  </div>
                  <div class="form-group">
                        <label>Type</label>
                        <input type="radio"  name="type" value="full"> Full Day
                        <input type="radio"  name="type" value="half"> Half Day
                  </div>
                </div>
                <button type="submit" class="btn">
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
                      <a href="javascript:void(0);" title="delete" onclick="event.preventDefault(); document.getElementById('delete-holiday-{{$holiday->id}}').submit();"><img src="{{ asset('images/bin.png') }}" alt="delete"></a>
                        <form id="delete-holiday-{{$holiday->id}}"  action="{{route('holidays.destroy', $holiday->id)}}"
                            method="post">
                            @csrf @method('DELETE')
                        </form>
                     </a>
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
                        <input type="radio"  name="type" value="full">Full Day
                        <input type="radio"  name="type" value="half">Half Day
                     </div>
                  </div>
                    <div class="form-group">
                       <label>Status</label>   
                       <input type="radio"  name="status" value="Active"> Active
                       <input type="radio"  name="status" value="Pending"> Pending
                       <input type="radio"  name="status" value="Cancel"> Cancel
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
<script>
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