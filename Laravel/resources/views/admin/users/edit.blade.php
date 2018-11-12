@extends('layouts.admin')

@section('sidebar_active')
  @include('include.sidebar_links', [
    'users' => '', 'all_user' => '', 'create_user' => '',
    'teams' => '', 'all_team' => '', 'create_team' => '', 'team_task' => '',
    'plan' => '', 'all_plan' => '', 'plan_price' => '',
    'vehicle' => '', 'vehicle_company' => '', 'vehicle_modal' => '', 'vehicle_type' => '',
    'appointments' => '', 'appointment' => '', 'payment' => '', 'payment_mode' => '', 'currency' => '', 'status' => '',
    'settings' => '', 'services' => '', 'gallery' => '', 'facts' => '', 'testimonial' => '', 'blog' => '', 'clients' => '', 'opening_hours' => '', 'company_social' => '',
    'profile' => '', 'sub_appointment' => '',
  ])
@endsection

@section('breadcum')
  @include('include.breadcum', [
    'title' => 'Edit User',
    'from' => 'Admin',
    'to' => 'User Edit',
  ])
@endsection

@section('content')
  <div class="box-header">
    <div class="box-title">User Edit Form</div>
  </div>
  {!! Form::model($user, ['method' => 'PATCH', 'action' => ['AdminUsersController@update', $user->id], 'files' => true]) !!}
    <div class="box-body">
      <div class="row">
        <div class="col-md-3">
          <div class="user-img-block">
            <img src="{{asset('images/users')}}/{{$user->photo}}" alt="" class="img-responsive img-thumbnail">
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            {!! Form::label('name', 'Name') !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Enter your name', 'autofocus']) !!}
            <small class="text-danger">{{ $errors->first('name') }}</small>
          </div>
          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            {!! Form::label('email', 'Email address') !!}
            {!! Form::email('email', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'eg: foo@bar.com']) !!}
            <small class="text-danger">{{ $errors->first('email') }}</small>
          </div>
          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              {!! Form::label('password', 'Password') !!}
              {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Enter Password']) !!}
              <small class="text-danger">{{ $errors->first('password') }}</small>
          </div>
          <div class="form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
            {!! Form::label('dob', 'Date Of Birth') !!}
            {!! Form::text('dob', null, ['id' => '', 'class' => 'form-control date-pick', 'required' => 'required', 'placeholder' => 'Date of birth']) !!}
            <small class="text-danger">{{ $errors->first('dob') }}</small>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
            {!! Form::label('mobile', 'Mobile') !!}
            {!! Form::text('mobile', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Mobile no']) !!}
            <small class="text-danger">{{ $errors->first('mobile') }}</small>
          </div>
          <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
            {!! Form::label('phone', 'Phone') !!}
            {!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' => 'Phone no']) !!}
            <small class="text-danger">{{ $errors->first('phone') }}</small>
          </div>
          <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
            {!! Form::label('address', 'Address') !!}
            {!! Form::textarea('address', null, ['class' => 'form-control', 'rows'=>'5', 'required' => 'required', 'placeholder' => 'Enter your address']) !!}
            <small class="text-danger">{{ $errors->first('address') }}</small>
          </div>
        </div>
        <div class="col-md-3">
          @if (Auth::user()->role == 'A')
            <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
              {!! Form::label('role', 'Role') !!}
              {!! Form::select('role', [""=>"Choose Role", "A"=>"administrator", "S"=>"subscriber"], null, ['class' => 'form-control']) !!}
              <small class="text-danger">{{ $errors->first('role') }}</small>
            </div>
          @endif
          <div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }}">
            {!! Form::label('photo', 'Image') !!}
            {!! Form::file('photo') !!}
            <p class="help-block">Help block text</p>
            <small class="text-danger">{{ $errors->first('photo') }}</small>
          </div>
          <div class="radio{{ $errors->has('sex') ? ' has-error' : '' }} user-create-radio">
            <span>Gendor</span>
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
          </div>
        </div>
      </div>
    </div>
    <div class="box-footer">
      <div class="btn-group pull-left">
        {!! Form::submit("Update", ['class' => 'btn btn-add btn-default']) !!}
      </div>
    </div>
  {!! Form::close() !!}
@endsection
