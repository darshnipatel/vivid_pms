@extends('layouts.app')

@section('content')

<div class="pms-login-from-wrapper">
  <form name="pms-login-form" method="post" action="{{ route('register') }}">
    @csrf
    <div class="text-center Sign-up">
      <h3>Sign up your account</h3>
    </div>
    
    <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>First Name</label>
            <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>
            @error('firstname')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Last Name</label>
          <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>
        </div>
      </div>
    </div> 

    <div class="form-group">
      <label>Select Position </label>
        <select aria-label="Position Applying for" type="text" name="postion_apply_for" class="form-control">
        <option value="">Select Position</option>
        <option value="ReactJS Developer">ReactJS Developer</option>
        <option value="WordPress Developer">WordPress Developer</option>
        <option value="PHP Developer">PHP Developer</option>
        <option value="Laravel Developer">Laravel Developer</option>
        <option value="Web Designer">Web Designer</option>
        <option value="Shopify Developer">Shopify Developer</option>
        <option value="Freshar">Freshar</option>
        <option value="Intern">Intern</option>
      </select>
    </div>

      
        <div class="form-group">
          <label>Email</label>
          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
          @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
          @enderror
        </div>

        <div class="form-group ">
          <label>Password</label>
          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label>Confirm password</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
        </div>
      
      

      <button type="submit" class="btn">Submit</button>

    <!-- dont-hve-act start -->
    <div class="dont-hve-act text-center">
      <p class="">
        Already have an account ? <a href="{{ route('login') }}">Login</a>
      </p>
    </div>
    <!-- dont-hve-act end  -->
  </form>
</div>


@endsection
