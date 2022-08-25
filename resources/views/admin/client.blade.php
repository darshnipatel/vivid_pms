@extends('layouts.admin')

@section('content')

   <!-- page title -->
   <div class="container">
      <div class="row new-header-breadcrumbpading">

         <div class="col-md-12">
            <div class="wraper-breadcrumb">
              <h2 class="new-header-breadheding">Client</h2>
            </div>
         </div>

      </div>
    </div>
   
    <!-- page title end-->
    <div class="container">
      @if(session('msg'))
        <div class="alert alert-primary" role="alert">
           <strong>{{session('msg')}}</strong>
        </div>
      @endif
      <div class="row">
         <div class="col-md-12">
            <div class="defult-boxwrap">

            <div class="pms-login-from-wrapper-admin">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
              <form name="" method="post" action=" {{ route('client.store') }}">
                @csrf
               <div class="row">
                  <div class="col-md-4">
                     <div class="form-group">
                       <label>Name</label>
                       <input id="name" name="name" type="text" class="form-control" placeholder="Enter Name">
                       @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                       <label>Country</label>
                       <input id="country" name="country" type="text" class="form-control" placeholder="Country">
                       @error('country')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                       <label>Skype ID</label>
                       <input id="skype_id" name="skype_id" type="text" class="form-control" placeholder="Skype ID">
                       @error('skype_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                     </div>
                  </div>
               </div>
                <button type="submit" class="btn">
                  Submit
                </button>
  
              </form>
            </div>

          </div>
         </div>
      </div>
      <div class="row">
        @foreach($clients as $client)
          <div class="col-md-3">
            <div class="defult-boxwrap employee-boxdiv">   
                <button type="button" class="edit-clientpen" title="edit" data-bs-toggle="modal" data-bs-target="#editclient" data-href= "{{route('client.update',$client->id)}}" data-skype="{{ $client->skype_id }}" data-name="{{ $client->name }}" data-country="{{ $client->country }}">
                    <img src="{{ asset('/images/pen.png') }}" alt="edit">
                  </button>         
                <img src="{{ asset('/images/tabs-2.jpg') }}" alt="employee" />
                <h4><a class="client_name" href="javascript:void(0);">{{ $client->name }}</a></h4>
                <p class="country_name">{{ $client->country }}</p>
                <p><img src="{{ asset('/images/skype.png') }}" alt="skype" /> {{ $client->skype_id }}</p>
           </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- Edite Cleint Modal -->
  <div class="modal fade" id="editclient" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Employee</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         <form method="post" class="modalform" action=" {{ route('client.update' , 1 ) }}">
            @csrf
            @method('PUT')
            <div class="row">
               <div class="col-md-12">
                     <div class="form-group">
                       <label>Name</label>
                       <input name="name" type="text" class="form-control" placeholder="Enter Name">
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group">
                       <label>Country</label>
                       <input name="country" type="text" class="form-control" placeholder="Country">
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group">
                       <label>Skype ID</label>
                       <input name="skype_id" type="text" class="form-control" placeholder="Skype ID">
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
    $(".edit-clientpen").on('click',function(){
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
  </script>
@endsection