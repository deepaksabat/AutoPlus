@extends('layouts.admin')

@section('sidebar_active')
  @include('include.sidebar_links', [
    'users' => '', 'all_user' => '', 'create_user' => '',
    'teams' => 'active', 'all_team' => '', 'create_team' => 'active', 'team_task' => '',
    'plan' => '', 'all_plan' => '', 'plan_price' => '',
    'vehicle' => '', 'vehicle_company' => '', 'vehicle_modal' => '', 'vehicle_type' => '',
    'appointments' => '', 'appointment' => '', 'payment' => '', 'payment_mode' => '', 'currency' => '', 'status' => '',
    'settings' => '', 'services' => '', 'gallery' => '', 'facts' => '', 'testimonial' => '', 'blog' => '', 'clients' => '', 'opening_hours' => '', 'company_social' => '',
    'profile' => '', 'sub_appointment' => '',
  ])
@endsection

@section('breadcum')
  @include('include.breadcum', [
    'title' => 'Create Team',
    'from' => 'Admin',
    'to' => 'Create Team',
  ])
@endsection

@section('content')
  <div class="box-header">
    <div class="box-title">Team Create Form</div>
  </div>
  {!! Form::open(['method' => 'POST', 'action' => 'AdminTeamController@store', 'files' => true]) !!}
    <div class="box-body">
      <div class="row">
        <div class="col-md-4">
          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            {!! Form::label('name', 'Name') !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required', 'placeholder'=>'Enter Name']) !!}
            <small class="text-danger">{{ $errors->first('name') }}</small>
          </div>
          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            {!! Form::label('email', 'Email address') !!}
            {!! Form::email('email', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'eg: foo@bar.com']) !!}
            <small class="text-danger">{{ $errors->first('email') }}</small>
          </div>
          <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
            {!! Form::label('mobile', 'Mobile') !!}
            {!! Form::text('mobile', null, ['class' => 'form-control', 'required' => 'required', 'placeholder'=>'Mobile No.']) !!}
            <small class="text-danger">{{ $errors->first('mobile') }}</small>
          </div>
          <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
            {!! Form::label('phone', 'Phone') !!}
            {!! Form::text('phone', null, ['class' => 'form-control', 'placeholder'=>'Phone No.']) !!}
            <small class="text-danger">{{ $errors->first('phone') }}</small>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
            {!! Form::label('dob', 'Date Of Birth') !!}
            {!! Form::text('dob', null, ['class' => 'form-control date-pick', 'required' => 'required', 'placeholder'=>'Date Of Birth']) !!}
            <small class="text-danger">{{ $errors->first('dob') }}</small>
          </div>
          <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
            {!! Form::label('status', 'Status') !!}
            {!! Form::select('status', [""=>"Chooes Status", "A"=>"Active", "D"=>"Inactive"], null, ['class' => 'form-control', 'required' => 'required']) !!}
            <small class="text-danger">{{ $errors->first('status') }}</small>
          </div>
          <div class="form-group{{ $errors->has('post') ? ' has-error' : '' }}">
            {!! Form::label('post', 'Enter Post') !!}
            {!! Form::text('post', null, ['class' => 'form-control', 'required' => 'required', 'placeholder'=>'Enter Post']) !!}
            <small class="text-danger">{{ $errors->first('post') }}</small>
          </div>
          <div class="form-group{{ $errors->has('join_date') ? ' has-error' : '' }}">
            {!! Form::label('join_date', 'Join Date') !!}
            {!! Form::text('join_date', null, ['class' => 'form-control date-pick', 'placeholder'=>'Join Date']) !!}
            <small class="text-danger">{{ $errors->first('join_date') }}</small>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
            {!! Form::label('address', 'Address') !!}
            {!! Form::textarea('address', null, ['class' => 'form-control', 'rows'=>'4', 'required' => 'required', 'placeholder'=>'Enter Your Address']) !!}
            <small class="text-danger">{{ $errors->first('address') }}</small>
          </div>
          <div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }}">
            {!! Form::label('photo', 'Image') !!}
            {!! Form::file('photo') !!}
            <small class="text-danger">{{ $errors->first('photo') }}</small>
          </div>
          <div class="radio{{ $errors->has('sex') ? ' has-error' : '' }}">
            Gendor
            <label for="sex" class="checkbox">
              {!! Form::radio('sex', 'M',  null) !!} Male
            </label>
            <label for="sex" class="checkbox">
              {!! Form::radio('sex', 'F',  null) !!} Female
            </label>
          </div>
        </div>
      </div>
    </div>
    <div class="box-footer">
      <div class="btn-group pull-left">
        {!! Form::reset("Reset", ['class' => 'btn btn-yellow btn-default']) !!}
        {!! Form::submit("Create", ['class' => 'btn btn-add btn-default']) !!}
      </div>
    </div>
  {!! Form::close() !!}
@endsection
