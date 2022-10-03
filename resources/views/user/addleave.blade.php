@extends('layouts.user')

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
              <h2 class="defult-boxtitle">Add Leave Request</h2>
              <!-- Leave form-->
              <div class="leave-from">
                <!-- from start -->
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
                <form class="from" method="post" name="pms-login-form" id="addleave-form" action="{{ route('storeLeave') }}">
                    @csrf
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" placeholder="Sahil Patel" value="{{ Auth()->user()->firstname }}" disabled />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Type of Leave</label>
                        <select name="leave_type" class="form-control">
                          <option value=0>Select Leave Type</option>
                          <option value="casual">Casual Leave</option>
                          <option value="medical" >Medical Leave</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Start Date</label>
                        <input name="from_date" type="text" class="form-control datepicker" autocomplete="off">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>End Date</label>
                        <input name="to_date" type="text" class="form-control datepicker" autocomplete="off" />
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Reason</label>
                    <textarea name="reason" class="form-control"></textarea>
                  </div>
                  <button type="submit" class="btn btn-submit">Submit</button>
                </form>
              </div>
              <!-- Leave form end  -->
            </div>

            <div class="defult-boxwrap">
              <h2 class="defult-boxtitle">Leave Request</h2>
              <table class="table">
                <thead>
                  <tr>
                    <th>Date</th>
                    <th>Leave Type</th>
                    <th>Reason</th>
                    <th>Count</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  @if($leaves->isNotEmpty())

                    @foreach($leaves as $leave)
                    @php
                        $type = ($leave->leave_type == "casual") ? "Casual Leave" : "Medical Leave";
                    @endphp
                    <tr>
                        <td>{{ date('d-m-Y', strtotime($leave->from_date))}} to {{ date('d-m-Y', strtotime($leave->to_date))}}</td>
                        <td>{{ $type }}</td>
                        <td>{{ $leave->reason }}</td>
                        <td>
                            @php
                                $from_date = new DateTime($leave->from_date);
                                $to_date = new DateTime($leave->to_date);
                                $diff = date_diff( $from_date , $to_date);
                                $days = $diff->format('%d days');
                            @endphp
                            {{ $days }}
                        </td>
                        <td>
                        <?php $class = ''; ?>
                          @if($leave->status == "Pending")
                            <?php $class = "bg-warning"; ?>
                          @elseif($leave->status == "Canceled")
                            <?php $class = "bg-danger"; ?>
                          @elseif($leave->status == "Approved")
                            <?php $class = "bg-success"; ?>
                          @endif
                        <span class="badge {{ $class }}"> {{ $leave->status }}</span>
                        </td>
                      </tr>
                   @endforeach
                  @else
                    <tr>
                        <td colspan="5" align="center">
                            <h3 class="nodata-found">No Data Found</h3>
                        </td>
                    </tr>
                  @endif
                </tbody>
              </table>
              {{ $leaves->links("pagination::bootstrap-4") }}    
          </div>
        </div>            
      </div>
    </div>
    <script>
      $("#addleave-form").on('submit',function(){
        jQuery('.btn-submit').attr('disabled', 'disabled');
      });
    </script>

@endsection
