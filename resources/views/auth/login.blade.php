@extends('layouts.app')

@section('content')

<div class="pms-login-from-wrapper">
  <form name="pms-login-form" method="post"  action="{{ route('login') }}">
  @csrf
    <!-- auth-logo-box start -->
    
    <div class="text-center Sign-up">
      <h3>Welcome Back !</h3>
      <h5>Sign in to continue to Vivid.</h5>
    </div>

    <div class="form-group">
      <label>Username</label>
      <input id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="" />
      @error('email')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
    </div>

    <div class="form-group">
      <label>Password</label>
      <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"/>
      @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
    </div>

    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <div class="form-group form-check">
          <input id="remember" name="remember" type="checkbox" class="form-check-input" {{ old('remember') ? 'checked' : '' }}/>
          <label class="form-check-label">Remember me</label>
        </div>
      </div>
      @if (Route::has('password.request'))
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right"> 
        <div class="form-group">                 
          <a class="forgot-pass-a" href="{{ route('password.request') }}">Forgot password?</a>
        </div>
      </div>
      @endif
      
    </div>

    <button type="submit" class="btn">
      Submit
    </button>

    <!-- dont-hve-act start -->
    <div class="dont-hve-act text-center">
      <p class="">
        Don't have an account ?
        <a href="{{ route('register') }}">Register</a>
      </p>
    </div>
    <!-- dont-hve-act end  -->

  </form>
</div>

@endsection
