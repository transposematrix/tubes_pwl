@extends('layouts.backend2.main3') 
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
              <br>
              <br>
              <br>
              <h3>Reset Password</h3>
              @if (session('status'))
            <div class="alert alert-success" role="alert">
            {{ session('status') }}           
             </div>
            @endif            
            </div>
            <form method="POST" action="{{ route('password.email') }}"> 
            @csrf             
                <div class="form-group first">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="email address" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                <span class="fa fa-envelope form-control-feedback"></span>
                @error('email')
                <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
                </span>
             @enderror
              </div>

        

              <input type="submit" value="Send Password Reset Link" class="btn text-white btn-block btn-primary">

              
               </div>
            </form>
            </div>
          </div>
          
        </div>
        
      </div>
    </div>
  </div>
@endsection
