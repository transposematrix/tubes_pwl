@extends('layouts.backend2.main') 
@section('content')
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6 order-md-2">
          <img src="{{asset('loginreg/images/signup-image.png')}}" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
              <h3>Sign In to <strong>Paw Rescue</strong></h3>
              @if(Session::has('error'))
            <div class="alert alert-danger">
            {{ Session::get('error')}}
            </div>
            @endif            
            </div>
            <form method="POST" action="{{ route('login') }}"> 
            @csrf             
                <div class="form-group first">
                <input type="email" placeholder="Email" id="email" class="form-control @error('email') is-invalid @enderror" name="email">
                <span class="fa fa-envelope form-control-feedback"></span>
                @error('email')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="form-group last mb-4">
                <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                <span class="fa fa-lock form-control-feedback"></span>
                @error('password')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                @enderror
                
              </div>
              
              <div class="d-flex mb-5 align-items-center">
                <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> 
                  <div class="control__indicator"></div>
                </label>
                <span class="ml-auto"><a href="{{ route('password.request') }}" class="forgot-pass">Forgot Password</a></span> 
              </div>

              <input type="submit" value="Sign In" class="btn text-white btn-block btn-primary">

              <span class="d-block text-left my-4 text-muted"><a href="{{ route('register') }}" class="forgot-pass"> Dont have an account yet? <b>Sign Up</b></a></span>
              
               </div>
            </form>
            </div>
          </div>
          
        </div>
        
      </div>
    </div>
  </div>
@endsection
