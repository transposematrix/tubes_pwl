@extends('layouts.backend2.main3') 
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
              <h3>Reset Password</strong></h3>          
            </div>
            <form method="POST" action="{{ route('password.update') }}">
            @csrf   
            <input type="hidden" name="token" value="{{ $token }}">          
                <div class="form-group first">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                <span class="fa fa-envelope form-control-feedback"></span>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                   @enderror
              </div>

              <div class="form-group last mb-4">
                <label for="password">Password</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                <span class="fa fa-lock form-control-feedback"></span>
                @error('password')
                <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
                 </span>
               @enderror

                
              </div>
              <div class="form-group last mb-4">
                <label for="password">{{ __('Confirm Password') }}</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                <span class="fa fa-lock form-control-feedback"></span>
                @error('password-confirm')
                <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
                 </span>
               @enderror
              </div>
              <input type="submit" value="Reset Password" class="btn text-white btn-block btn-primary">
              
               </div>
            </form>
            </div>
          </div>
          
        </div>
        
      </div>
    </div>
  </div>
@endsection

