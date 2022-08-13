@extends('layouts.user')
@section('content')
  <!-- page title -->
  <div class="container">
    <div class="row new-header-breadcrumbpading">
       <div class="col-md-12">
          <div class="wraper-breadcrumb">
            <h2 class="new-header-breadheding">Holidays</h2>
          </div>
       </div>
    </div>
  </div>
<!-- page title end-->
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
                    </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
          </div>            
        </div>
      </div>
    </div>
@endsection