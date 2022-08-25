@extends('layouts.admin')

@section('content')

<!-- page title -->
 <div class="container">
    <div class="row new-header-breadcrumbpading">

       <div class="col-md-12">
          <div class="wraper-breadcrumb">
            <h2 class="new-header-breadheding">
             Leave 
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
              <h2 class="defult-boxtitle">Leave Management</h2>
              <div class="Leave_select">
                <form method="post" action="{{ route('create_csv') }}">
                  @csrf
                <div class="Leave_select_wrapper">
                  <div class="Leave_select_data">
                    <div class="form-group">
                      <label>From date:</label>
                      <input id="from_date" name="from_date" type="text" placeholder="dd-mm-yyyy" class="form-control datepicker" autocomplete="off" />
                    </div>
                    <div class="form-group">
                      <label>To date:</label>
                      <input id="to_date" name="to_date" type="text" placeholder="dd-mm-yyyy" class="form-control datepicker" autocomplete="off" />
                    </div>
                    <div class="form-group">
                      <label>User:</label>
                      <select id="employee" name="employee" class="form-control">
                      <option value="Select User name">Select User name</option>
                        @foreach($employees as $employee)
                        <option value="{{ $employee->id }}">{{ $employee->firstname }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="Leave_select_btn">
                    <input type="submit" id="create_csv" value="Create CSV">
                  </div>
                </div>
              </form>
              </div>
            </div>
            <div class="defult-boxwrap">
              <h2 class="defult-boxtitle">Leave Request</h2>
              <table class="table">
                <thead>
                  <tr>
                    <th>Date</th>
                    <th>Employee</th>
                    <th>Leave Type</th>
                    <th>Reason</th>
                    <th>Days</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($leaves as $leave)
                  <tr data-id="{{ $leave->id }}">
                    <td>{{ date('d-m-Y', strtotime($leave->from_date))}} to {{ date('d-m-Y', strtotime($leave->to_date))}}</td>
                    <td >{{ $leave->employee->firstname}}</td>
                    <td>{{ $leave->leave_type }}</td>
                    <td>{{ $leave->reason }}</td>
                    <td>
                        @php
                            $from_date = new DateTime($leave->from_date);
                            $to_date = new DateTime($leave->to_date);
                            $diff = date_diff( $from_date , $to_date);
                            $days = $diff->format('%d');
                        @endphp
                        {{ ($days + 1) }}
                    </td>
                    <td>
                      <select class="form-control leave_status" >
                        <option value="Select Status" >Select Status</option>
                        <option value="Pending" @if ($leave->status == "Pending") {{ "selected"}} @endif >Pending</option>
                        <option value="Canceled" @if ($leave->status == "Canceled") {{ "selected"}} @endif >Canceled</option>
                        <option value="Approved" @if ($leave->status == "Approved") {{ "selected"}} @endif >Approved</option>
                      </select>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              {{ $leaves->links("pagination::bootstrap-4") }}    
          </div>
        </div>            
      </div>
    </div>
    <script>
    
        $('.leave_status').change(function(){
          var id = $(this).closest('tr').data('id')
          $.ajax({
            url: '<?php echo url('/admin/leave-status-update'); ?>',
            type: 'POST',
            dataType: 'json',
            data:{leave_id: id,status:$(this).val(), _token:"{{ csrf_token() }}"},
            success: function (data) {
            }
          });
        });
    </script>
    @endsection