@extends('layouts.user')
@section('content')
<style>
    .file_upload {
   opacity: 0.0;

   /* IE 8 */
   -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";

   /* IE 5-7 */
   filter: alpha(opacity=0);
 
   /* Netscape or and older firefox browsers */
   -moz-opacity: 0.0;

   /* older Safari browsers */
   -khtml-opacity: 0.0;

   position: absolute;
   top: 0;
   left: 0;
   bottom: 0;
   right: 0;
   width: 100%;
   height:100%;
}
    </style>
<div class="container">
    @if(session('msg'))
        <div class="alert alert-primary" role="alert">
           <strong>{{session('msg')}}</strong>
        </div>
    @endif
    <form method="post" action="{{ route('saveprofile' , $employee->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-12">
            <div class="defult-boxwrap">
                <button type="button" class="editprofile-empen" title="edit" data-bs-toggle="modal" data-bs-target="#editemployee">
                    <img src="{{ asset('/images/pen.png')}}" alt="edit">
                </button>       
                <div class="row">
                    <div class="col-md-12">
                    <div class="profile-view">
                        <div class="profile-img-wrap">
                            <div class="profile-img">
                                <img id="preview_img" src="{{ env('APP_URL') }}/storage/app/public/uploads/{{ $employee->profile_image }}" />    
                            </div>
                            <input type="file" id="profile_image" name="profile_image"  class="file_upload form-control"  onchange="loadPreview(this);">
                        </div>
                        <div class="profile-basic">
                            <div class="row">
                                <div class="col-md-5">
                                <div class="profile-info-left">
                                    <h3 class="user-name">{{ $employee->firstname }}</h3>
                                    <small>Web Designer</small>
                                    <br>
                                    <br>
                                    <div class="staff-id"><strong>Employee ID:</strong> VIVID-{{$employee->id}}</div>
                                    <div class="staff-datejoin"><strong>Date of Join:</strong><input type="text" class="form-control datepicker" name="date_of_join" value="@if(isset($employee->date_of_join)){{ date('d/m/Y',strtotime($employee->date_of_join)) }} @endif"> </div>                              
                                </div>
                                </div>
                                <div class="col-md-7">
                                <ul class="personal-info">
                                    <li>
                                        <div class="title">Phone:</div>
                                        <div class="text"><input type="text" class="form-control" name="phone" value="@if(isset($employee->phone)){{ $employee->phone }} @endif"></div>
                                    </li>
                                    <li>
                                        <div class="title">Email:</div>
                                        <div class="text"><input type="email" class="form-control" name="email" value="@if(isset($employee->email)){{ $employee->email }} @endif"></div>
                                    </li>
                                    <li>
                                        <div class="title">Birthday:</div>
                                        <div class="text"><input type="text" class="form-control datepicker" name="birthdate" value="@if(isset($employee->birthdate)){{ date('d/m/Y' , strtotime($employee->birthdate)) }} @endif"></div>
                                    </li>
                                    <li>
                                        <div class="title">Address:</div>
                                        <div class="text"><textarea class="form-control" name="address">@if(isset($employee->address)){{ $employee->address }} @endif</textarea></div>
                                    </li>
                                    <li>
                                        <div class="title">Gender:</div>
                                        <div class="text">
                                            <select class="form-control" name="gender">
                                                <option value="">Select Gender</option>
                                                <option value="Male" @if(isset($employee->gender)  &&  $employee->gender == "Male"){{ "selected" }} @endif >Male</option>
                                                <option value="Female" @if(isset($employee->gender)  &&  $employee->gender == "Female"){{ "selected" }} @endif>Female</option>
                                            </select>
                                        </div>
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
                    <div class="text"><input type="text" class="form-control" name="nationality" value="@if(isset($employee->nationality)){{ $employee->nationality }} @endif"/></div>
                </li>
                <li>
                    <div class="title">Religion</div>
                    <div class="text"><input type="text" class="form-control" name="religion" value="@if(isset($employee->religion)){{ $employee->religion }} @endif"/></div>
                </li>
                <li>
                    <div class="title">Marital status</div>
                    <div class="text"><input type="text" class="form-control" name="marital_status" value="@if(isset($employee->marital_status)){{ $employee->marital_status }} @endif"/></div>
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
                            <div class="text"><input type="text" class="form-control" name="emergency_contact_name" value="@if(isset($employee->emergency_contact_name)){{ $employee->emergency_contact_name }} @endif"/></div>
                            </li>
                            <li>
                            <div class="title">Relationship</div>
                            <div class="text"><input type="text" class="form-control" name="emergency_contact_relationship" value="@if(isset($employee->emergency_contact_relationship)){{ $employee->emergency_contact_relationship }} @endif"/></div>
                            </li>
                            <li>
                            <div class="title">Phone </div>
                            <div class="text"><input type="text" class="form-control" name="emergency_contact_phone" value="@if(isset($employee->emergency_contact_phone)){{ $employee->emergency_contact_phone }} @endif"/></div>
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
                        <div class="text"><input type="text" class="form-control" name="bank_name" value="@if(isset($employee->bank_name)){{ $employee->bank_name }} @endif"/></div>
                        </li>
                        <li>
                        <div class="title">Bank account No.</div>
                        <div class="text"><input type="text" class="form-control" name="bank_account_no" value="@if(isset($employee->bank_account_no)){{ $employee->bank_account_no }} @endif"/></div>
                        </li>
                        <li>
                        <div class="title">IFSC Code</div>
                        <div class="text"><input type="text" class="form-control" name="IFSC_code" value="@if(isset($employee->IFSC_code)){{ $employee->IFSC_code }} @endif"/></div>
                        </li>
                        <li>
                        <div class="title">PAN No</div>
                        <div class="text"><input type="text" class="form-control" name="PAN_no" value="@if(isset($employee->PAN_no)){{ $employee->PAN_no }} @endif"/></div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <button type="submit" class="btn">Save</button>
    </form>
  </div>

<!-- Emp edit Profile Modal -->
<div class="modal fade" id="editemployee" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Employee</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         <form>
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
                     <input class="form-control" value="John" type="text">
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
                     <input class="form-control datetimepicker" type="text">
                  </div>
               </div>              
               <div class="col-sm-6">
                  <div class="form-group">
                     <label>Email</label>
                     <input class="form-control" value="johndoe@example.com" type="email">
                  </div>
               </div>               
               <div class="col-sm-6">
                  <div class="form-group">
                     <label>Birth Date</label>
                     <input class="form-control datetimepicker" type="text">
                  </div>
               </div>
               
               <div class="col-sm-6">
                  <div class="form-group">
                     <label>Phone</label>
                     <input class="form-control" value="9876543210" type="text">
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="form-group">
                     <label>Address</label>
                     <input type="text"  class="form-control">
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="form-group">
                     <label>Gender</label>
                     <input type="text"  class="form-control">
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label>Designation</label>
                     <select class="form-control">
                        <option>Select Designation</option>
                        <option>Web Designer</option>
                        <option>Web Developer</option>
                        <option>Android Developer</option>
                     </select>                     
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

<!-- EMP persnal Information Modal -->
<div class="modal fade" id="editpersonal-info" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Employee</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         <form>
            <div class="row">
               <div class="col-sm-12">
                  <div class="form-group">
                     <label>Nationality</label>
                     <input class="form-control" value="" type="text">
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="form-group">
                     <label>Religion</label>
                     <input class="form-control" value="John" type="text">
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="form-group">
                     <label>Marital status</label>
                     <input type="text" class="form-control">
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
         <form>
            <div class="row">
               <div class="col-sm-12">
                  <div class="form-group">
                     <label>Name</label>
                     <input class="form-control" value="" type="text">
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="form-group">
                     <label>Relationship</label>
                     <input class="form-control" value="John" type="text">
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="form-group">
                     <label>Phone</label>
                     <input type="text" class="form-control">
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
         <form>
            <div class="row">
               <div class="col-sm-12">
                  <div class="form-group">
                     <label>Bank name</label>
                     <input class="form-control" value="" type="text">
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="form-group">
                     <label>Bank account No.</label>
                     <input class="form-control" value="John" type="text">
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="form-group">
                     <label>IFSC Code</label>
                     <input type="text" class="form-control">
                  </div>
               </div>
               <div class="col-sm-12">
                  <div class="form-group">
                     <label>PAN No</label>
                     <input type="text" class="form-control">
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

<script>
 function loadPreview(input, id) {
    id = id || '#preview_img';
    if (input.files && input.files[0]) {
        var reader = new FileReader();
 
        reader.onload = function (e) {
            $(id)
                    .attr('src', e.target.result);
        };
 
        reader.readAsDataURL(input.files[0]);
    }
 }
</script>
@endsection