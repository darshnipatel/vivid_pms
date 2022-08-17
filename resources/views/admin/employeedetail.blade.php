@extends('layouts.admin')
@section('content')
<div class="container">
    <div id="user_content">
      <div class="row">
        <div class="col-md-12">         
          <div class="defult-boxwrap">
             <div class="row">
                <div class="col-md-12">
                   <div class="profile-view">
                      <div class="profile-img-wrap">
                         <div class="profile-img">
                            <img id="preview_img" src="{{ env('APP_URL') }}/storage/app/public/uploads/{{ $employee->profile_image }}" alt="employee"/>              
                         </div>
                      </div>
                      <div class="profile-basic">
                         <div class="row">
                            <div class="col-md-5">
                               <div class="profile-info-left">
                                  <h3 class="user-name">{{ $employee->firstname}} {{ $employee->lastname}}
                                  </h3>
                                  <small>{{ $employee->job_post }}</small>
                                  <br>
                                  <br>
                                  <div class="staff-id"><strong>Employee ID:</strong> VIVID-{{ $employee->id }}</div>
                                  <div class="staff-datejoin"><strong>Date of Join:</strong> {{ date('dS M Y',strtotime($employee->date_of_join)) }}</div>                              
                               </div>
                            </div>
                            <div class="col-md-7">
                               <ul class="personal-info">
                                  <li>
                                     <div class="title">Phone:</div>
                                     <div class="text"><a href="">{{ $employee->phone }}</a></div>
                                  </li>
                                  <li>
                                     <div class="title">Email:</div>
                                     <div class="text"><a href="">{{ $employee->email }}</a></div>
                                  </li>
                                  <li>
                                     <div class="title">Birthday:</div>
                                     <div class="text">{{ date('dS M',strtotime($employee->birthdate)) }}</div>
                                  </li>
                                  <li>
                                     <div class="title">Address:</div>
                                     <div class="text">{{ $employee->address }}</div>
                                  </li>
                                  <li>
                                     <div class="title">Gender:</div>
                                     <div class="text">{{ $employee->gender }}</div>
                                  </li>
                               </ul>
                            </div>
                         </div>
                      </div>                      
                   </div>
                </div>
             </div>
        </div>
      </div>
        <div class="col-md-6">
            <div class="defult-boxwrap">  

            
            <h3 class="card-title">Personal Informations</h3>
            <ul class="personal-info">
                <li>
                    <div class="title">Nationality</div>
                    <div class="text">{{ $employee->nationality }}</div>
                </li>
                <li>
                    <div class="title">Religion</div>
                    <div class="text">{{ $employee->religion }}</div>
                </li>
                <li>
                    <div class="title">Marital status</div>
                    <div class="text">{{ $employee->marital_status }}</div>
                </li>
            </ul>      
            </div>
        </div>
        <div class="col-md-6">
            <div class="defult-boxwrap">

            
                    <h3 class="card-title">Emergency Contact <a href="#" class="edit-icon" data-bs-toggle="modal" data-bs-target="#emergency_contact_modal"><i class="fa fa-pencil"></i></a></h3>
                    
                    <ul class="personal-info">
                        <li>
                        <div class="title">Name</div>
                        <div class="text">{{ $employee->emergency_contact_name }}</div>
                        </li>
                        <li>
                        <div class="title">Relationship</div>
                        <div class="text">{{ $employee->emergency_contact_relationship }}</div>
                        </li>
                        <li>
                        <div class="title">Phone </div>
                        <div class="text">{{ $employee->emergency_contact_phone }}</div>
                        </li>
                    </ul>
                
            </div>
        </div>
        <div class="col-md-12">
            <div class="defult-boxwrap">
                <h3 class="card-title">Bank information</h3>
                <ul class="personal-info">
                    <li>
                    <div class="title">Bank name</div>
                    <div class="text">{{ $employee->bank_name }}</div>
                    </li>
                    <li>
                    <div class="title">Bank account No.</div>
                    <div class="text">{{ $employee->bank_account_no }}</div>
                    </li>
                    <li>
                    <div class="title">IFSC Code</div>
                    <div class="text">{{ $employee->IFSC_code }}</div>
                    </li>
                    <li>
                    <div class="title">PAN No</div>
                    <div class="text">{{ $employee->PAN_no }}</div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
      <div class="col-md-12 text-center mt-2">
         <a id="download" href="#" class="btn btn-primary">Download CV</a>
      </div>
    </div>
  </div>
 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
<script>
   
    $('#download').click(function () {
        html2canvas($('#user_content'), {

        onrendered: function (canvas) {

        var data = canvas.toDataURL();

        var docDefinition = {

            content: [{

                image: data,

                width: 500

            }]

        };

    pdfMake.createPdf(docDefinition).download("stockledger.pdf");

}

});
    });
</script>
@endsection