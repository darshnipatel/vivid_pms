@extends('layouts.admin')

@section('content')
   <!-- page title -->
   <div class="container">
      <div class="row new-header-breadcrumbpading">

         <div class="col-md-12">
            <div class="wraper-breadcrumb">
              <h2 class="new-header-breadheding">
               Dashboard 
              </h2>
              <!-- nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
              </nav -->
            </div>
         </div>
      </div>
    </div>
    <!-- page title end-->
    <div class="container">
      <div class="row">

        <div class="col-md-5">
          <div class="defult-boxwrap">
          </div>
        </div>

        <div class="col-md-4">
          <div class="defult-boxwrap">
            <h3 class="pms-cardtitle">Projects</h3>
              <div class="wrap-titles">
                  <div class="total-task">
                     <h4>{{ $project_count }}</h4>
                     <label>Total Projects</label>
                  </div>
                  <div class="panding-task total-task">
                     <h4>{{ $working_project_count }}</h4>
                     <label>Working Projects</label>
                  </div>                  
              </div>
          </div> 
          <div class="defult-boxwrap">
            <h3 class="pms-cardtitle">Clients</h3>
              <div class="wrap-titles">
                  <div class="total-task">
                     <h4>{{ $clients_count }}</h4>
                     <label>Total Clients</label>
                  </div>
              </div>
          </div>
          <div class="defult-boxwrap">
            <h3 class="pms-cardtitle">Employees</h3>
              <div class="wrap-titles">
                  <div class="total-task">
                     <h4>{{ $employees_count }}</h4>
                  </div>
              </div>
          </div>          
        </div>

        <div class="col-md-3">
          <div class="defult-boxwrap hr-activities-wrap">
              <div class="wraper-hr">
                 <h3 class="pms-cardtitle">HR Activities</h3>

                 <div class="info-admindetails">
                     <ul class="aadmindetails-list">
                         <li>
                           
                                 <div class="img-radius">
                                  <img src="{{asset('/images/birthday-cake.png')}}" alt="Birthday" />
                                 </div>
                                 <div class="admin-info">
                                     <h4>Today Birthday</h4>
                                     @foreach($today_birthday as $emp)
                                     <p>{{ ucfirst($emp->firstname) }} {{ ucfirst($emp->lastname) }}</p>
                                     @endforeach
                                 </div>

                         </li>

                         <li>
                             
                                 <div class="img-radius">
                                  <img src="{{asset('/images/exit-door-sign.png')}}" alt="Leave" />
                                 </div>
                                 <div class="admin-info">
                                     <h4>Today Leave</h4>
                                     @foreach($today_leave as $leave)
                                     <p>{{ ucfirst($leave->employee->firstname) }} {{ ucfirst($leave->employee->lastname) }}</p>
                                     @endforeach
                                 </div>
                           
                         </li>

                         <li>

                                 <div class="img-radius">
                                  <img src="{{asset('/images/seminar.png')}}" alt="Seminar" />
                                 </div>
                                 <div class="admin-info">
                                     <h4>Upcomming Seminar</h4>
                                     <p>-</p>
                                 </div>
                           
                         </li>

                         <li>
                            
                                 <div class="img-radius">
                                  <img src="{{asset('/images/resort.png')}}" alt="HOLIDAY" />
                                 </div>
                                 <div class="admin-info">
                                     <h4>UPCOMING HOLIDAY</h4>
                                     @foreach($upcoming_holiday as $holiday)
                                     <p>{{ ucfirst($holiday->name) }}</p>
                                     @endforeach
                                 </div>

                         </li>
                     </ul>
                 </div>
             </div>
          </div>
        </div>

        <div class="col-md-12">
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
                    </tr>
                  </thead>
                  <tbody>
                    @if($projects->isNotEmpty())
                      @foreach($projects as $project)
                        <tr>
                          <td class="project_name">{{ $project->project_name }}</td>
                          <td class="technology">{{ $project->technology }}</td>
                          <td class="employee" >{{ $project->employee->firstname }}</td>
                          <td class="start_date">{{ ($project->start_date != '') ? date('d-m-Y', strtotime($project->start_date) ) : '' }}</td>
                          <td class="end_date" >{{ ($project->end_date != '') ? date('d-m-Y', strtotime($project->end_date) ) : '' }}</td>
                          <td class="priority">{{ $project->priority }}</td>
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
                 {{ $projects->links("pagination::bootstrap-4") }}    
            </div>
        </div>
      </div>
    </div>

@endsection