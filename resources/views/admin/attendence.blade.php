@extends('layouts.admin')
@section('content')
   <!-- page title -->
   <div class="container">
      <div class="row new-header-breadcrumbpading">
         <div class="col-md-12">
            <div class="wraper-breadcrumb">
              <h2 class="new-header-breadheding">Attendance</h2>
            </div>
         </div>
      </div>
    </div>
    <!-- page title end-->
   <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="defult-boxwrap">
                <form method="get" action="{{ route('get_attendance_page') }}">
                  
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                            <div class="form-group">
                                <label>Date</label>
                                @php
                                    $a_date =  (isset($_REQUEST['attendance_date'])) ? $_REQUEST['attendance_date'] : date('d-m-Y') ;
                                @endphp
                                  <input name="attendance_date" type="text" class="form-control datepicker" placeholder="dd/mm/yyyy" value="{{ $a_date }}" autocomplete="off" onchange="this.form.submit()" />
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                            <div class="form-group">
                                <label>Employee</label>
                                 <select name="employee" class="form-control" onchange="this.form.submit()">
                                    <option value="0">Select Employee</option>
                                     @foreach($employees as $emp)
                                        <option value="{{ $emp->id }}" @if( isset($_REQUEST['employee']) && $_REQUEST['employee'] == $emp->id
                                            ) selected="selected" @endif> {{ $emp->firstname }} </option>
                                     @endforeach
                                 </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="defult-boxwrap">
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Date</th>
                      <th>Employee</th>
                      <th>Punch In</th>
                      <th>Punch Out</th>
                      <th>Working Hours</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php($i=1)
                    @foreach($attendance as $attend)
                        <tr>
                          <td>{{ $i++ }}</td>
                          <td class="date">{{ date('d-m-Y', strtotime($attend->day)) }}</td>
                          <td class="name" >{{ $attend->employee->firstname }}</td>
                          <td class="type">{{ $attend->punch_in }}</td>
                          <td class="type">{{ $attend->punch_out }}</td>
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
                        </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
          </div>            
        </div>
      </div>
    </div>

     <div class="defult-boxwrap">
            <table class="table table-hover table-sm mb-0">
<thead>
<tr>
<th class="border-top-0">Employee</th>
<th class="border-top-0">1</th>
<th class="border-top-0">2</th>
<th class="border-top-0">3</th>
<th class="border-top-0">4</th>
<th class="border-top-0">5</th>
<th class="border-top-0">6</th>
<th class="border-top-0">7</th>
<th class="border-top-0">8</th>
<th class="border-top-0">9</th>
<th class="border-top-0">10</th>
<th class="border-top-0">11</th>
<th class="border-top-0">12</th>
<th class="border-top-0">13</th>
<th class="border-top-0">14</th>
<th class="border-top-0">15</th>
 <th class="border-top-0">16</th>
<th class="border-top-0">17</th>
<th class="border-top-0">18</th>
<th class="border-top-0">19</th>
<th class="border-top-0">20</th>
<th class="border-top-0">22</th>
<th class="border-top-0">23</th>
<th class="border-top-0">24</th>
<th class="border-top-0">25</th>
<th class="border-top-0">26</th>
<th class="border-top-0">27</th>
<th class="border-top-0">28</th>
<th class="border-top-0">29</th>
<th class="border-top-0">30</th>
<th class="border-top-0">31</th>
</tr>
</thead>
<tbody>
<tr>
<td>John Doe</td>
<td>.</td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td>.</td>
<td>.</td>
<td><span class="text-danger">A</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td>.</td>
<td>.</td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span class="text-danger">A</span></td>
<td><span>P</span></td>
<td>.</td>
<td>.</td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td>.</td>
<td>.</td>
<td><span>P</span></td>
</tr>
<tr>
<td>Tim Hank</td>
<td>.</td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td>.</td>
<td>.</td>
 <td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td>.</td>
<td>.</td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td>.</td>
<td>.</td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td>.</td>
<td>.</td>
<td><span>P</span></td>
</tr>
<tr>
<td>Frank Camly</td>
<td>.</td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span class="text-danger">A</span></td>
<td><span class="text-danger">A</span></td>
<td><span>P</span></td>
<td>.</td>
<td>.</td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td>.</td>
<td>.</td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td>.</td>
<td>.</td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td>.</td>
<td>.</td>
<td><span>P</span></td>
</tr>
<tr>
<td>Gary Camara</td>
<td>.</td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
 <td><span>P</span></td>
<td>.</td>
<td>.</td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td>.</td>
<td>.</td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td>.</td>
<td>.</td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span class="text-danger">A</span></td>
<td><span>P</span></td>
<td>.</td>
<td>.</td>
<td><span>P</span></td>
</tr>
<tr>
<td>Fidel Tonn</td>
<td>.</td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td>.</td>
<td>.</td>
<td><span class="text-danger">A</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td>.</td>
<td>.</td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td>.</td>
<td>.</td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td>.</td>
<td>.</td>
<td><span>P</span></td>
</tr>
<tr>
<td>Tim Hank</td>
<td>.</td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td>.</td>
<td>.</td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td>.</td>
<td>.</td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td>.</td>
<td>.</td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td>.</td>
<td>.</td>
<td><span>P</span></td>
</tr>
<tr>
<td>Maryam Amiri</td>
<td>.</td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td>.</td>
<td>.</td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td>.</td>
<td>.</td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td>.</td>
<td>.</td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td>.</td>
<td>.</td>
<td><span>P</span></td>
</tr>
<tr>
<td>Hossein Shams</td>
 <td>.</td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td>.</td>
<td>.</td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td>.</td>
<td>.</td>
<td><span class="text-danger">A</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span class="text-danger">A</span></td>
<td><span>P</span></td>
<td>.</td>
<td>.</td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td><span>P</span></td>
<td>.</td>
<td>.</td>
<td><span>P</span></td>
</tr>
</tbody>
</table>
          </div>
          
        </div>            
      </div>
    </div>
    
@endsection