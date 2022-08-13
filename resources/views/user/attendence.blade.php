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
                <tr>
                  <td>1</td>
                  <td>19 Feb 2019</td>
                  <td>10 AM</td>
                  <td>7 PM</td>
                  <td>9 hrs</td>
                  <td>0:45 Min</td>
                  <td>0</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>20 Feb 2019</td>
                  <td>10 AM</td>
                  <td>7 PM</td>
                  <td>9 hrs</td>
                  <td>0:45 Min</td>
                  <td>0</td>
                </tr>
              </tbody>
            </table>
              
          </div>
        </div>            
      </div>
    </div>
@endsection