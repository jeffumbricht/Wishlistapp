@extends('layouts.app')

@section('content')

<div class="row">
  <div class="col-md-6 offset-md-3">

    <div class="card">
      <div class="card-header">
        Register
      </div>
      <div class="card-body">
        <form class="" method="POST" action="{{ route('register') }}">
          {{ csrf_field() }}

          <div class="form-group">
            <label for="name" class="control-label">Name</label>
            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

            @if ($errors->has('name'))
            <div class="invalid-feedback">
              {{ $errors->first('name') }}
            </div>
            @endif
          </div>

          <div class="form-group">
            <label for="email" class="control-label">E-Mail Address</label>
            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

            @if ($errors->has('email'))
            <div class="invalid-feedback">
              {{ $errors->first('email') }}
            </div>
            @endif
          </div>

          <div class="form-group">
            <label for="password" class="control-label">Password</label>
            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

            @if ($errors->has('password'))
            <div class="invalid-feedback">
              {{ $errors->first('password') }}
            </div>
            @endif
          </div>

          <div class="form-group">
            <label for="password-confirm" class="control-label">Confirm Password</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
          </div>

          <div class="form-group">
            <button type="submit" class="btn btn-primary">
              Register
            </button>
          </div>
        </form>
      </div>
    </div>

  </div>
</div>

@endsection
