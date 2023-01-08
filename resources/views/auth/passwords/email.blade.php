@extends('layouts.app')
@section('content')
  <p class="login-box-msg">reset password</p>

  @if (session('status'))
    <div class="alert alert-success p-2" role="alert">
      {{ session('status') }}
    </div>
  @endif

  <form action="{{ route('password.email') }}" method="post">
    @csrf
    <div class="input-group mb-3">
      <input id="email" type="email" placeholder="example@gmail.com"
             class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required
             autocomplete="email" autofocus>
      <div class="input-group-append">
        <div class="input-group-text">
          <span class="fas fa-envelope"></span>
        </div>
      </div>
      @error('email')
      <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
      @enderror
    </div>
    <div class="row">
      <div class="col-12">
        <button type="submit" class="btn btn-primary btn-block"> Send password reset link </button>
      </div>
      <!-- /.col -->
    </div>
  </form>
  <p class="mt-3 mb-1">
    <a href="{{ route('login') }}">Login</a>
  </p>
@endsection