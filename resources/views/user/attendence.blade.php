@extends('layouts.user')
@section('content')
  <!-- page title -->
  <div class="container">
    <div class="row new-header-breadcrumbpading">

       <div class="col-md-12">
          <div class="wraper-breadcrumb">
            <h2 class="new-header-breadheding">
              Attendence
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
                <th>#</th>
                <th>Date </th>
                <th>Punch In</th>
                <th>Punch Out</th>
                <th>Production</th>
                <th>Break</th>
                <th>Overtime</th>
                </tr>
              </thead>
              <tbody>
                @php($i=1)
                @foreach($attendence as $attend)
                <tr>
                  <td> {{ $i++ }} </td>
                  <td> {{ date('d M Y' , strtotime($attend->day)) }}</td>
                  <td> {{ $attend->punch_in }}</td>
                  <td> {{ $attend->punch_out }}</td>
                  <td> 
                    <?php 
                    $total_hours = '';
                    if($attend->punch_out){
                      $datetime1 = new DateTime($attend->punch_in);
                      $datetime2 = new DateTime($attend->punch_out);
                      $interval = $datetime1->diff($datetime2);
                      $total_hours = $interval->format('%hh %im');
                    }
                    ?>
                    {{ $total_hours }}
                  </td>
                  <td>{{ config('app.break_time') }} Min</td>
                  <td>
                      <?php 
                        $working_hours = config('app.working_hours');
                        $overtime = 0;
                        if($total_hours > $working_hours){
                          $overtime = $working_hours - $total_hours;
                        }
                      ?>
                    {{ $overtime }}
                  </td>
                </tr>
                @endforeach
              
              </tbody>
            </table>
              
          </div>
        </div>            
      </div>
    </div>
@endsection