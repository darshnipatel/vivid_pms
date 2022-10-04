@extends('layouts.admin')
@section('content')
<div class="container">
    <div id="user_content">
      <div class="row">
        <div class="col-md-12">         
          <div class="defult-boxwrap">
              <button type="button" class="editprofile-empen" title="edit" data-bs-toggle="modal" data-bs-target="#editemployee">
                <img src="{{ asset('/images/pen.png')}}" alt="edit">
            </button>
             <div class="row">
                <div class="col-md-12">
                   <div class="profile-view">
                      <div class="profile-img-wrap" >
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
            <button type="button" class="editprofile-empen" title="edit" data-bs-toggle="modal" data-bs-target="#editpersonal-info">
               <img src="{{ asset('/images/pen.png')}}" alt="edit">
            </button>
            
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
               <button type="button" class="editprofile-empen" title="edit" data-bs-toggle="modal" data-bs-target="#editemergency-profile">
               <img src="{{ asset('/images/pen.png')}}" alt="edit">
             </button>
            
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
                  <button type="button" class="editprofile-empen" title="edit" data-bs-toggle="modal" data-bs-target="#editbankinfo-profile">
               <img src="{{ asset('/images/pen.png')}}" alt="edit">
             </button>
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
</div>
      <div class="col-md-12 text-center mt-2">
         <a id="download" href="javascript:void(0)" class="btn btn-primary">Download CV</a>
      </div>  
</div>
<div class="modal fade" id="editemployee" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Employee</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         <form action="{{ route('saveprofile' , $employee->id) }}" method="post" >
            @csrf
            @method('put')
            <div class="row">
               <div class="col-sm-12">
                  <div class="form-group">
                     <label>Profil Pic</label>
                     <input class="form-control" value="" type="file">
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="form-group">
                     <label>Name</label>
                     <input name="firstname" value="{{ $employee->firstname }}" class="form-control" value="John" type="text">
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="form-group">
                     <label>Employee ID</label>
                     <input type="text" value="VIVID-01" readonly="" class="form-control floating">
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="form-group">
                     <label>Joining Date</label>
                     <input name="date_of_join" value="{{ date('m/d/Y',strtotime($employee->date_of_join)) }}" class="datepicker form-control datetimepicker" type="text">
                  </div>
               </div>              
               <div class="col-sm-6">
                  <div class="form-group">
                     <label>Email</label>
                     <input name="email" class="form-control" value="{{ $employee->email }}" type="email">
                  </div>
               </div>               
               <div class="col-sm-6">
                  <div class="form-group">
                     <label>Birth Date</label>
                     <input name="birthdate" value="{{ date('m/d/Y',strtotime($employee->birthdate)) }}"  class="form-control datepicker"  type="text">
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="form-group">
                     <label>Phone</label>
                     <input class="form-control" name="phone" value="{{ $employee->phone }}" type="text">
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="form-group">
                     <label>Address</label>
                     <input type="text" name="address" class="form-control" value="{{ $employee->address }}">
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="form-group">
                     <label>Gender</label>
                       <select class="form-control" name="gender">
                           <option value="">Select Gender</option>
                           <option value="Male" @if(isset($employee->gender)  &&  $employee->gender == "Male"){{ "selected" }} @endif >Male</option>
                           <option value="Female" @if(isset($employee->gender)  &&  $employee->gender == "Female"){{ "selected" }} @endif>Female</option>
                       </select>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label>Designation</label>
                     <select class="form-control">
                        <option>Select Designation</option>
                            <option value="">Select Position</option>
                            <option @if(isset($employee->gender)  &&  $employee->gender == "ReactJS Developer"){{ "selected" }} @endif value="ReactJS Developer">ReactJS Developer</option>
                            <option  @if(isset($employee->gender)  &&  $employee->gender == "WordPress Developer"){{ "selected" }} @endif  value="WordPress Developer">WordPress Developer</option>
                            <option  @if(isset($employee->gender)  &&  $employee->gender == "PHP Developer"){{ "selected" }} @endif  value="PHP Developer">PHP Developer</option>
                            <option  @if(isset($employee->gender)  &&  $employee->gender == "Laravel Developer"){{ "selected" }} @endif   value="Laravel Developer">Laravel Developer</option>
                            <option  @if(isset($employee->gender)  &&  $employee->gender == "Web Developer"){{ "selected" }} @endif  value="Web Designer">Web Designer</option>
                            <option  @if(isset($employee->gender)  &&  $employee->gender == "Shopify Developer"){{ "selected" }} @endif  value="Shopify Developer">Shopify Developer</option>
                            <option  @if(isset($employee->gender)  &&  $employee->gender == "Fresher"){{ "selected" }} @endif  value="Fresher">Fresher</option>
                            <option  @if(isset($employee->gender)  &&  $employee->gender == "Intern"){{ "selected" }} @endif  value="Intern">Intern</option>
                     </select>                     
                  </div>
               </div>
            </div>
            <div class="submit-section">
               <button type="submit" class="btn">Save</button>
            </div>
         </form>
      </div>
    </div>
  </div>
</div>

<!-- EMP persnal Information Modal -->
<div class="modal fade" id="editpersonal-info" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Employee</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('saveprofile' , $employee->id) }}" method="post" >
             @csrf
            @method('put')
            <div class="row">
               <div class="col-sm-12">
                  <div class="form-group">
                     <label>Nationality</label>
                     <input name="nationality" class="form-control" value="{{ $employee->nationality }}" type="text">
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="form-group">
                     <label>Religion</label>
                     <input name="religion" class="form-control" value="{{ $employee->religion }}" type="text">
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="form-group">
                     <label>Marital status</label>
                     <input type="text" value="{{ $employee->marital_status }}" class="form-control" name="marital_status">
                  </div>
               </div>
               
            </div>
            <div class="submit-section">
               <button class="btn">Save</button>
            </div>
         </form>
      </div>
    </div>
  </div>
</div>

<!-- EMP Emergency Information Modal -->
<div class="modal fade" id="editemergency-profile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Employee</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         <form action="{{ route('saveprofile' , $employee->id) }}" method="post" >
                @csrf
            @method('put')
            <div class="row">
               <div class="col-sm-12">
                  <div class="form-group">
                     <label>Name</label>
                     <input name="emergency_contact_name" class="form-control" value="{{ $employee->emergency_contact_name }}" type="text">
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="form-group">
                     <label>Relationship</label>
                     <input name="emergency_contact_relationship" class="form-control" value="{{ $employee->emergency_contact_relationship }}" type="text">
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="form-group">
                     <label>Phone</label>
                     <input name="emergency_contact_phone" value="{{ $employee->emergency_contact_phone }}" type="text" class="form-control">
                  </div>
               </div>
               
            </div>
            <div class="submit-section">
               <button class="btn">Save</button>
            </div>
         </form>
      </div>
    </div>
  </div>
</div>

<!-- EMP Emergency Information Modal -->
<div class="modal fade" id="editbankinfo-profile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Employee</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         <form action="{{ route('saveprofile' , $employee->id) }}" method="post" >
            @csrf
            @method('put')
            <div class="row">
               <div class="col-sm-12">
                  <div class="form-group">
                     <label>Bank name</label>
                     <input class="form-control" name="bank_name" value="{{ $employee->bank_name }}" type="text">
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="form-group">
                     <label>Bank account No.</label>
                     <input class="form-control" name="bank_account_no" value="{{ $employee->bank_account_no }}" type="text">
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="form-group">
                     <label>IFSC Code</label>
                     <input type="text" name="IFSC_code" value="{{ $employee->IFSC_code }}" class="form-control">
                  </div>
               </div>
               <div class="col-sm-12">
                  <div class="form-group">
                     <label>PAN No</label>
                     <input type="text" name="PAN_no" value="{{ $employee->PAN_no }}" class="form-control">
                  </div>
               </div>
            </div>
            <div class="submit-section">
               <button class="btn">Save</button>
            </div>
         </form>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
<script>
    $(".editprofile-empen").on('click',function(){
         // $("#customerModal").modal('show');
          var action = $(this).data('href');  
          var name = $(this).data('name');  
          var country = $(this).data('country');  
          var skype = $(this).data('skype');  
        $("#editclient").on('shown.bs.modal', function() { 
          $('.modalform').attr('action',action);
          $('.modalform input[name="name"]').val(name);
          $('.modalform input[name="country"]').val(country);
          $('.modalform input[name="skype_id"]').val(skype);
        });
    });


   var specialElementHandlers = {
  '#bypassme': function(element, renderer) {
    return true;
   }
};

var margin = {
  top: 100,
  left: 0,
  right: 0,
  bottom: 0
};

var tinymceToJSPDFHTML = document.createElement("body");

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

         pdfMake.createPdf(docDefinition).download("EmployeeCV.pdf");

      }

   });
});
 
</script>
@endsection
