@extends('layouts.app')

@section('content')
<div class="pms-login-from-wrapper">
    <form name="pms-login-form" method="post" action="{{ route('password.email') }}">
        @csrf
        <div class="text-center Sign-up">
        <h3>Forgot your password</h3>
        <p class="account-subtitle">Enter your email to get a password reset link</p>
        </div>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

        <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <button type="submit" class="btn">Submit</button>

        <!-- dont-hve-act start -->
        <div class="dont-hve-act text-center">
        <p class="">
            Already have an account ?
            <a href="{{ route('login') }}">Login</a>
        </p>
        </div>
        <!-- dont-hve-act end  -->
    </form>
</div>

@endsection
