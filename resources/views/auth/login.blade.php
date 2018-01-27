@extends('layouts.app')

@section('content')

<div class="row">
  <div class="col-md-6 offset-md-3">

    <div class="card">
      <div class="card-header">
        Login
      </div>
      <div class="card-body">
        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
          {{ csrf_field() }}

          <div class="form-group">
            <label for="email" class="control-label">E-Mail Address</label>
            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : ''}}" name="email" value="{{ old('email') }}" required autofocus>

            @if ($errors->has('email'))
            <div class="invalid-feedback">
              {{ $errors->first('email') }}
            </div>
            @endif
          </div>

          <div class="form-group">
            <label for="password" class="control-label">Password</label>
            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"" name="password" required>

            @if ($errors->has('password'))
            <div class="invalid-feedback">
              {{ $errors->first('password') }}
            </div>
            @endif
          </div>

          <div class="form-group">
            <div class="checkbox">
              <label>
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
              </label>
            </div>
          </div>

          <div class="form-group">
            <button type="submit" class="btn btn-primary">
              Login
            </button>

            <a class="btn btn-link" href="{{ route('password.request') }}">
              Forgot Your Password?
            </a>
          </div>
        </form>
      </div>
    </div>

  </div>
</div>

@endsection
