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
    'title' => 'Contact',
    'from' => 'Admin',
    'to' => 'Contact',
  ])
@endsection

@section('content')
  @if ($contacts)
    <div class="box-body table-responsive">
      <table class="table table-hover">
        <thead>
          <tr class="info">
            <th>Logo</th>
            <th>Logo 2</th>
            <th>Company Name</th>
            <th>Mobile No.</th>
            <th>Phone No.</th>
            <th>Address</th>
            <th>Email</th>
            <th>Website</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($contacts as $contact)
            <tr>
              <td><img src="{{asset('images/logo')}}/{{$contact->logo}}" class="img-responsive" alt="logo"></td>
              <td>
                @if ($contact->logo_two)
                  <img src="{{asset('/images/logo')}}/{{$contact->logo_two}}" class="img-responsive" alt="logo_two">
                @endif
              </td>
              <td title="{{$contact->c_name}}">{{str_limit($contact->c_name, 20)}}</td>
              <td>{{$contact->mobile}}</td>
              <td>{{$contact->phone}}</td>
              <td>{{$contact->address}}</td>
              <td>{{$contact->email}}</td>
              <td>{{$contact->website}}</td>
              <td>
                <!-- Edit Button -->
                <button type="button" class="btn btn-info btn-sm add-btn" data-toggle="modal" data-target="#{{$contact->id}}type_edit_Modal">Edit</button>
                <!-- Edit Modal -->
                <div id="{{$contact->id}}type_edit_Modal" class="modal fade" role="dialog">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Edit Contact Information</h4>
                      </div>
                      {!! Form::model($contact, ['method' => 'PATCH', 'action' => ['AdminContactController@update', $contact->id], 'files'=>true]) !!}
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group{{ $errors->has('c_name') ? ' has-error' : '' }}">
                                  {!! Form::label('c_name', 'Company Name') !!}
                                  {!! Form::text('c_name', null, ['class' => 'form-control', 'required' => 'required', 'placeholder'=>'Enter Your Company Name']) !!}
                                  <small class="text-danger">{{ $errors->first('c_name') }}</small>
                              </div>
                              <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                                {!! Form::label('mobile', 'Mobile No.') !!}
                                {!! Form::text('mobile', null, ['class' => 'form-control', 'required' => 'required', 'placeholder'=>'Enter Mobile No.']) !!}
                                <small class="text-danger">{{ $errors->first('mobile') }}</small>
                              </div>
                              <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                {!! Form::label('phone', 'Phone No.') !!}
                                {!! Form::text('phone', null, ['class' => 'form-control', 'required' => 'required', 'placeholder'=>'Enter Phone No.']) !!}
                                <small class="text-danger">{{ $errors->first('phone') }}</small>
                              </div>
                              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                  {!! Form::label('email', 'Email address') !!}
                                  {!! Form::email('email', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'eg: foo@bar.com']) !!}
                                  <small class="text-danger">{{ $errors->first('email') }}</small>
                              </div>
                              <div class="form-group{{ $errors->has('website') ? ' has-error' : '' }}">
                                {!! Form::label('website', 'Your Website') !!}
                                {!! Form::text('website', null, ['class' => 'form-control', 'required' => 'required', 'placeholder'=>'eg: www.xyz.com']) !!}
                                <small class="text-danger">{{ $errors->first('website') }}</small>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                  {!! Form::label('address', 'Address') !!}
                                  {!! Form::textarea('address', null, ['class' => 'form-control', 'rows'=>'5', 'required' => 'required', 'placeholder'=>'Enter Your Address']) !!}
                                  <small class="text-danger">{{ $errors->first('address') }}</small>
                              </div>
                              <div class="form-group{{ $errors->has('logo') ? ' has-error' : '' }}">
                                  {!! Form::label('logo', 'Choose Logo') !!}
                                  {!! Form::file('logo') !!}
                                  <p class="help-block">Help block text</p>
                                  <small class="text-danger">{{ $errors->first('logo') }}</small>
                              </div>
                              <div class="form-group{{ $errors->has('logo_two') ? ' has-error' : '' }}">
                                  {!! Form::label('logo_two', 'Logo 2') !!}
                                  {!! Form::file('logo_two') !!}
                                  <p class="help-block">Help block text</p>
                                  <small class="text-danger">{{ $errors->first('logo_two') }}</small>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <div class="btn-group pull-right">
                              {!! Form::submit("Save", ['class' => 'btn btn-default btn-add']) !!}
                          </div>
                        </div>
                      {!! Form::close() !!}
                    </div>
                  </div>
                </div>
                <!-- End Edit Button -->
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  @endif
@endsection
