@extends('layouts.admin')

@section('content')

   <!-- page title -->
   <div class="container">
    <div class="row new-header-breadcrumbpading">

       <div class="col-md-12">
          <div class="wraper-breadcrumb d-flex justify-content-between">
            <h2 class="new-header-breadheding">
            {{ $project->project_name }}
            </h2>
            <a  href="javascipt:void(0)" id="download" class="btn btn-primary" data-id="{{ $project->id }}"  style="margin: 0;" onclick="event.preventDefault(); document.getElementById('download_form').submit();">Download CSV</a>
            <form method="post" id="download_form" action="{{ route('download_project_details',$project->id)}}">
              @csrf
            </form>
            <div class="total_hours"> Total Hours : <span></span></div>
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
             @if(!$project->project_summary->isEmpty())
               <ul class="projectliast-desc">
                @foreach($project->project_summary as $summary)
                  <?php $times[] = $summary->hours ; ?>
                 <li>
                  <div class="view_entry"> 
                      <p><strong>Project Name:</strong>{{ $project->project_name }}</p>
                      <p><strong>Date:</strong> {{ date( 'd-m-Y',strtotime($summary->date) ) }}</p>
                      <p><strong>Hours:</strong> {{ $summary->hours }}</p>
                  </div>
                   <p><strong>Description:</strong> {{ $summary->details }}</p>
                 </li>
                 @endforeach
               </ul>
              @else
                  No Details Found
              @endif
                <?php 
                    $i = 0;
                    foreach ($times as $time) {
                        sscanf($time, '%d:%d', $hour, $min);
                        $i += $hour * 60 + $min;
                    }
                    if($h = floor($i / 60)) {
                          $i %= 60;
                    }
                 ?>
                @if($times)
                <script>
                  var time = '<?php echo $h ?>' + ':' + '<?php echo $i ?>';
                    jQuery('.total_hours span').html(time);
                </script>
                @endif
          </div>
        </div>            
      </div>
    </div>
@endsection