@extends('layouts.backend2.main2') 
@section('content')
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6 order-md-2">
          <img src="{{asset('loginreg/images/signin-image.png')}}" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
              <h3>Sign Up to <strong>Paw Rescue</strong></h3>
              @if(Session::has('error'))
            <div class="alert alert-danger">
            {{ Session::get('error')}}
            </div>
            @endif            
            </div>
            <form method="POST" action="{{ route('register') }}">
            @csrf             
                <div class="form-group first">
                <label for="Name">Name</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
                <span class="fa fa-envelope form-control-feedback"></span>
                @error('name')
                <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                         </span>
               @enderror
              </div>
              <div class="form-group last mb-4">
                <label for="emai">Email</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                <span class="fa fa-lock form-control-feedback"></span>
                @error('email')
                 <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                  </span>
                 @enderror
                
              </div>
              <div class="form-group last mb-4">
                <label for="password">Password</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" >
                <span class="fa fa-lock form-control-feedback"></span>
                @error('password')
                <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
                 </span>
               @enderror

                
              </div>
              <div class="form-group last mb-4">
                <label for="password">{{ __('Confirm Password') }}</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" >
                <span class="fa fa-lock form-control-feedback"></span>
                @error('password-confirm')
                <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
                 </span>
               @enderror
              </div>
              <input type="submit" value="Sign Up" class="btn text-white btn-block btn-primary">

              <span class="d-block text-left my-4 text-muted"><a href="{{ route('login') }}" class="forgot-pass"> Already have an account? <b>Sign In</b></a></span>
              
               </div>
            </form>
            </div>
          </div>
          
        </div>
        
      </div>
    </div>
  </div>
@endsection

