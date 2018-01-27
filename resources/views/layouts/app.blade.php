<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Holiday Wishlist') }}</title>

  <!-- Styles -->
  <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>
<body>
  <div id="app">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="{{ url('/') }}">
        {{ config('app.name', 'Holiday Wishlist') }}
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <!-- Authentication Links -->
          @if (Auth::guest())
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">Login</a>
            </li>
            @if (env('REGISTRATION_ACTIVE', FALSE))
            <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">Register</a>
            </li>
            @endif
          @else
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Family
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                @foreach($navUsers as $user)
                  <a class="dropdown-item" href="{{ route('user',['id'=>$user->id]) }}">
                    {{ $user->name }}
                  </a>
                @endforeach
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                Logout
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
              </form>
            </li>
          @endif
        </ul>

        @if (!Auth::guest())
        <span class="navbar-text">
          Hello, {{ Auth::user()->name }}
        </span>
        @endif

      </div>
    </nav>
    <div class="container mt-5">
    @yield('errors')
    @yield('content')
    </div>
</div>

<!-- Scripts -->
{{-- TODO build this in gulp --}}
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
