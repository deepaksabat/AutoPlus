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
    <h4 class="user-register-heading text-center">Reset Password</h4>
    @if (session('status'))
      <div class="alert alert-success">
        {{ session('status') }}
      </div>
    @endif
    <form class="form" method="POST" action="{{ route('password.email') }}">
      {{ csrf_field() }}
      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email" class="control-label">E-Mail Address</label>
        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
        @if ($errors->has('email'))
          <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
          </span>
        @endif
      </div>
      <div class="form-group btn-square">
        <button type="submit" class="btn btn-default">
            Reset Password
        </button>
      </div>
    </form>
  </div>
</div>
@endsection
