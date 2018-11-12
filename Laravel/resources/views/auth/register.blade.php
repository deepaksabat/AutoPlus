@extends('layouts.app')

@section('content')
<div class="container">
  <div class="register-page">
    <div class="logo">
      @if ($contacts)
        @foreach ($contacts as $contact)
          @for ($i=0; $i < 1; $i++)
            <img src="{{asset('/images/logo')}}/{{$contact->logo}}" class="img-responsive" alt="logo">
          @endfor
        @endforeach
      @endif
    </div>
    <h3 class="user-register-heading">Register</h3>
    <form class="form" method="POST" action="{{ route('register') }}">
      {{ csrf_field() }}
      <div class="row">
        <div class="col-md-3">
          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            {!! Form::label('name', 'Name') !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Enter your name']) !!}
            <small class="text-danger">{{ $errors->first('name') }}</small>
          </div>
          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              {!! Form::label('password', 'Password') !!}
              {!! Form::password('password', ['class' => 'form-control', 'required' => 'required', 'placeholder'=>'Enter Password']) !!}
              <small class="text-danger">{{ $errors->first('password') }}</small>
          </div>
          <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
              {!! Form::label('password_confirmation', 'Confirm Password') !!}
              {!! Form::password('password_confirmation', ['class' => 'form-control', 'required' => 'required', 'placeholder'=>'Confirm Password']) !!}
              <small class="text-danger">{{ $errors->first('password_confirmation') }}</small>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            {!! Form::label('email', 'Email address') !!}
            {!! Form::email('email', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'eg: foo@bar.com']) !!}
            <small class="text-danger">{{ $errors->first('email') }}</small>
          </div>
          <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
            {!! Form::label('mobile', 'Mobile') !!}
            {!! Form::text('mobile', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Mobile no.']) !!}
            <small class="text-danger">{{ $errors->first('mobile') }}</small>
          </div>
          <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
            {!! Form::label('phone', 'Phone') !!}
            {!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' => 'Phone no.']) !!}
            <small class="text-danger">{{ $errors->first('phone') }}</small>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
            {!! Form::label('address', 'Address') !!}
            {!! Form::textarea('address', null, ['class' => 'form-control', 'rows'=>'9', 'placeholder' => 'Enter your address']) !!}
            <small class="text-danger">{{ $errors->first('address') }}</small>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
            {!! Form::label('dob', 'Date Of Birth') !!}
            {!! Form::date('dob', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Date of birth']) !!}
            <small class="text-danger">{{ $errors->first('dob') }}</small>
          </div>
          <div class="radio{{ $errors->has('sex') ? ' has-error' : '' }} user-create-radio">
            <span>Gender</span>
            <label for="sex" class="checkbox">
              {!! Form::radio('sex', 'M',  null, [
                'id'    => 'sex',
                ]) !!} Male
            </label>
            <label for="sex" class="checkbox">
              {!! Form::radio('sex', 'F',  null, [
                'id'    => 'sex',
                ]) !!} Female
            </label>
            <small class="text-danger">{{ $errors->first('sex') }}</small>
          </div>
        </div>
        <div class="col-md-12">
          <div class="btn-group">
            {!! Form::reset("Reset", ['class' => 'btn btn-yellow btn-default']) !!}
            {!! Form::submit("Register", ['class' => 'btn btn-default btn-add']) !!}
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
