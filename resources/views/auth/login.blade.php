@extends('layouts.app_login')

@section('body')
<div class="container">
    <div class="row justify-content-center " ">
        <div class="col-md-12">
            <form method="POST" action="{{ route('login') }}">
                @csrf

              
                 

                    <div class="form-group">
                        <label for="email" >{{ __('Email Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
              

                <div class="form-group">
                   
                       <label for="password" >{{ __('Password') }}</label>
                  
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    
                </div>

                {{-- <div class="form-group">
                  
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                 
                </div> --}}

                <div class="row mb-0">
                  
                        <button type="submit" class="btn btn-primary  float-right" style="background-color: #ce0040;color:white;">
                            {{ __('Login') }}
                        </button>

                        {{-- @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif --}}
                  
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
