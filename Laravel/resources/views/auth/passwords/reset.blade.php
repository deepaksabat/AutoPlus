@extends('layouts.app')

@section('content')
<div class="container">
  <div class="login-page">
    <div class="logo">
      @if ($contacts)
        @foreach ($contacts as $contact)
          @for ($i=0; $i < 1; $i++)
            <a href="{{url('/')}}"><img src="{{asset('/images/logo')}}/{{$contact->logo}}" class="img-responsive" alt="logo"></a>
          @endfor
        @endforeach
      @endif
    </div>
    <form method="POST" action="{{ route('password.request') }}" class="form">
      {{ csrf_field() }}
      <input type="hidden" name="token" value="{{ $token }}">
      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email" class="control-label">E-Mail Address</label>
        <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" placeholder="Enter Your Email" required autofocus>
        @if ($errors->has('email'))
          <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
          </span>
        @endif
      </div>
      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label for="password" class="control-label">Password</label>
        <input id="password" type="password" class="form-control" name="password" placeholder="Enter Your Password" required>
        @if ($errors->has('password'))
          <span class="help-block">
            <strong>{{ $errors->first('password') }}</strong>
          </span>
        @endif
      </div>
      <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
        <label for="password-confirm" class="control-label">Confirm Password</label>
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
        @if ($errors->has('password_confirmation'))
          <span class="help-block">
            <strong>{{ $errors->first('password_confirmation') }}</strong>
          </span>
        @endif
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-default">
          Reset Password
        </button>
      </div>
    </form>
  </div>
</div>
@endsection
