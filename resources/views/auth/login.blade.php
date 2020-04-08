@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Login') }}</div>

        <div class="card-body">
          <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group row">
              <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

              <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                  value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

              <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                  name="password" required autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-6 offset-md-4">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="remember" id="remember"
                    {{ old('remember') ? 'checked' : '' }}>

                  <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                  </label>
                </div>
              </div>
            </div>

            <div class="form-group row mb-0">
              <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                  {{ __('Login') }}
                </button>

                @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                  {{ __('Forgot Your Password?') }}
                </a>
                @endif
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="container-social my-1">
        <div class="text-center py-3">
          <h2>Login with Social Media</h2>
        </div>
        <div class="col-md-6 offset-md-3">
          <a href="{{ route('login.provider', 'github') }}" class="text-center github btn-social">
            <i class="fa fa-github fa-fw"></i> Login with GitHub
          </a>
          <a href="{{ route('login.provider', 'linkedin') }}" class="text-center linkedin btn-social">
            <i class="fa fa-linkedin fa-fw"></i> Login with LinkedIn
          </a>
          <a href="{{ route('login.provider', 'google') }}" class="text-center google btn-social">
            <i class="fa fa-google fa-fw"></i> Login with Google
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('css')
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
  integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<style>
  /* style the container */
  .container-social {
    position: relative;
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px 0 30px 0;
  }

  /* style inputs and link buttons */
  .btn-social {
    width: 100%;
    padding: 12px;
    border: none;
    border-radius: 4px;
    margin: 5px 0;
    opacity: 0.85;
    display: inline-block;
    font-size: 17px;
    line-height: 20px;
    text-decoration: none;
    /* remove underline from anchors */
  }

  .btn-social:hover {
    opacity: 1;
    text-decoration: none;
    color: white;
  }

  /* add appropriate colors to fb, twitter and google buttons */
  .github {
    background-color: #444444;
    color: white;
  }

  .linkedin {
    background-color: #007BB6;
    color: white;
  }

  .google {
    background-color: #dd4b39;
    color: white;
  }
</style>
@endsection