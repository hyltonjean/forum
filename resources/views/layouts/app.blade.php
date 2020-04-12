<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Scripts -->

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.18.1/styles/atom-one-dark.min.css">
  @yield('css')
</head>

<body>
  <div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
          {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav mr-auto">

          </ul>

          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
            <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
            @endif
            @else
            <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
              </div>
            </li>
            @endguest
          </ul>
        </div>
      </div>
    </nav>

    <main class="container py-4">
      <div class="row d-flex justify-content-center">


        <div class="col-md-4">
          @auth
          <a href="{{ route('discussions.create') }}" class="btn btn-outline-primary text-primary bg-white mb-4"
            style="width:100%;">Create
            a new discussion</a>
          @else
          <a href="{{ route('login') }}" class="btn btn-danger mb-4" style="width:100%;">Sign in to create a new
            discussion</a>
          @endauth
          <ul class="list-group mb-4">
            <li class="list-group-item">
              <a href="/forum" style="text-decoration:none;">Forum</a>
            </li>
            @auth
            @if(auth()->user()->admin)
            <li class="list-group-item">
              <a href="{{ route('channels.index') }}" style="text-decoration:none;">All Channels</a>
            </li>
            @endif
            <li class="list-group-item">
              <a href="/forum?filter=me" style="text-decoration:none;">My Discussions</a>
            </li>
            <li class="list-group-item">
              <a href="/forum?filter=solved" style="text-decoration:none;">Solved Discussions</a>
            </li>
            <li class="list-group-item">
              <a href="/forum?filter=unsolved" style="text-decoration:none;">Unsolved Discussions</a>
            </li>
            @endauth
          </ul>

          <div class="card">
            <div class="card-header">
              Channels
            </div>
            <div class="card-body">
              <ul class="list-group">
                @foreach ($channels as $channel)
                <li class="list-group-item">
                  <a href="{{ route('channel', $channel->slug) }}" style="text-decoration:none;">
                    {{ $channel->title }}
                  </a>
                </li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-8">

          @yield('content')

        </div>
      </div>
    </main>
  </div>
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <script>
    @if(session()->has('success'))
    toastr.success('{{ session()->get('success') }}')
    @endif
    @if(session()->has('error'))
    toastr.error('{{ session()->get('error') }}')
    @endif
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.18.1/highlight.min.js"></script>
  <script>
    hljs.initHighlightingOnLoad();
  </script>
  @yield('scripts')
</body>

</html>