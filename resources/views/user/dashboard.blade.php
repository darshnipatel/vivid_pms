@extends('layouts.user')

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
            <div class="wrap-fisrtcard">
              <h3 class="pms-cardtitle">Timesheet <span class="punch-date">( 11 Mar 2022 )</span></h3>
              <div class="wrap-punch">
                  <div class="punchtitle-date">
                     <h5>Punch In at</h5>
                     <label>Wed, 11th Mar 2022 10.00AM</label>
                  </div>

                  <div class="total-hour">
                      <h4>3.45 hrs</h4>
                  </div>

                  <a href="#" class="punchout-btn">Punch Out</a>

                  <div class="info-break-overtime">
                      <div class="breack-headingtime">
                          <h5>Break</h5>
                          <label>0:45 Min</label>
                      </div>
                      <div class="breack-headingtime">
                          <h5>Overtime</h5>
                          <label>3 hrs</label>
                      </div>
                  </div>
                </div>
              </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="defult-boxwrap">
            <h3 class="pms-cardtitle">Projects</h3>
              <div class="wrap-titles">
                  <div class="total-task">
                     <h4>2</h4>
                     <label>Total Projects</label>
                  </div>
                  <div class="panding-task total-task">
                     <h4>1</h4>
                     <label>Panding Projects</label>
                  </div>
              </div>
          </div>
          <div class="defult-boxwrap">
            <h3 class="pms-cardtitle">Leave</h3>
               <div class="wrap-titles">
                  <div class="total-task">
                     <h4>2</h4>
                     <label>LEAVE TAKEN</label>
                  </div>
                  <div class="pms-totaltask">
                    <a href="#" class="leave-button">Apply Leave</a>
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
                             <a href="#">
                                 <div class="img-radius">
                                  <img src="{{asset('/images/birthday-cake.png')}}" alt="Birthday" />
                                 </div>
                                 <div class="admin-info">
                                     <h4>Today Birthday</h4>
                                     <p>Sahil Patel</p>
                                 </div>
                             </a>
                         </li>

                         <li>
                             <a href="#">
                                 <div class="img-radius">
                                  <img src="{{asset('/images/exit-door-sign.png')}}" alt="Leave" />
                                 </div>
                                 <div class="admin-info">
                                     <h4>Today Leave</h4>
                                     <p>Hardik Patel</p>
                                 </div>
                             </a>
                         </li>

                         <li>
                             <a href="#">
                                 <div class="img-radius">
                                  <img src="{{asset('/images/seminar.png')}}" alt="Seminar" />
                                 </div>
                                 <div class="admin-info">
                                     <h4>Upcomming Seminar</h4>
                                     <p>Sonali Patel</p>
                                 </div>
                             </a>
                         </li>

                         <li>
                             <a href="#">
                                 <div class="img-radius">
                                  <img src="{{asset('/images/resort.png')}}" alt="HOLIDAY" />
                                 </div>
                                 <div class="admin-info">
                                     <h4>UPCOMING HOLIDAY</h4>
                                     <p>Diwali</p>
                                 </div>
                             </a>
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
                    <tr>
                      <td>Glofox</td>
                      <td>Angular</td>
                      <td>NIRAJ</td>
                      <td>2022-04-01</td>
                      <td>2022-05-01</td>
                      <td>High</td>
                    </tr>
                    <tr>
                      <td>Glofox</td>
                      <td>Angular</td>
                      <td>NIRAJ</td>
                      <td>2022-04-01</td>
                      <td>2022-05-01</td>
                      <td>High</td>
                    </tr>
                    <tr>
                      <td>Glofox</td>
                      <td>Angular</td>
                      <td>NIRAJ</td>
                      <td>2022-04-01</td>
                      <td>2022-05-01</td>
                      <td>High</td>
                    </tr>
                  </tbody>
                </table>    
                <nav aria-label="Page navigation example">
                  <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                  </ul>
                </nav> 
            </div>
        </div>
        
      </div>
    </div>
@endsection
