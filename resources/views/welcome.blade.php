<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Laravel</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Gotu&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  {{-- <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> --}}

  <!-- Styles -->
  <style>
    html,
    body {
      background-color: #f2f2f2;
      color: #777;
      font-family: 'Gotu', sans-serif;
      font-weight: 200;
      height: 100vh;
      margin: 0;
    }

    .full-height {
      height: 100vh;
    }

    .flex-center {
      align-items: center;
      display: flex;
      justify-content: center;
    }

    .position-ref {
      position: relative;
    }

    .top-right {
      position: absolute;
      right: 10px;
      top: 18px;
    }

    .content {
      text-align: center;
    }

    .title {
      font-size: 84px;
    }

    .links>a {
      color: #636b6f;
      padding: 0 25px;
      font-size: 13px;
      font-weight: 600;
      letter-spacing: .1rem;
      text-decoration: none;
      text-transform: uppercase;
    }

    a.btn:hover {
      color: white;
      text-decoration: none;
      opacity: 1;
    }

    .github {
      background-color: #444444;
      color: white;
      opacity: 0.85;
    }

    .linkedin {
      background-color: #007BB6;
      color: white;
      opacity: 0.85;
    }

    .google {
      background-color: #dd4b39;
      color: white;
      opacity: 0.85;
    }
  </style>
</head>

<body>
  <div class="flex-center position-ref full-height">
    @if (Route::has('login'))
    <div class="top-right links">
      @auth
      <a href="{{ url('/home') }}" class="btn btn-info py-2 text-white">Home</a>
      @else
      <a href="{{ route('login') }}" class="btn btn-primary py-2 text-white">Login</a>

      @if (Route::has('register'))
      <a href="{{ route('register') }}" class="btn btn-primary ml-2 py-2 text-white">Register</a>
      @endif
      @endauth
    </div>
    @endif

    <div class="content">
      <div class="title m-b-md">
        {{ env('APP_NAME') }}
      </div>


      {{-- <div class="container my-1">
        <div class="text-center py-3">
          <h2>Login with Social Media</h2>
        </div>
        <div class="row d-flex justify-content-center">
          <div class="col-md-12">
            <a href="{{ route('login.provider', 'github') }}" class="btn github btn-social:hover">
      <i class="fa fa-github fa-fw"></i> GitHub
      </a>
      <a href="{{ route('login.provider', 'linkedin') }}" class="btn linkedin btn-social:hover">
        <i class="fa fa-linkedin fa-fw"></i> LinkedIn
      </a>
      <a href="{{ route('login.provider', 'google') }}" class="btn google btn-social:hover">
        <i class="fa fa-google fa-fw"></i> Google
      </a>
    </div>
  </div>
  </div> --}}
  </div>
  </div>
</body>

</html>