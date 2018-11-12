@extends('layouts.admin')

@section('sidebar_active')
  @include('include.sidebar_links', [
    'users' => '', 'all_user' => '', 'create_user' => '',
    'teams' => '', 'all_team' => '', 'create_team' => '', 'team_task' => '',
    'plan' => '', 'all_plan' => '', 'plan_price' => '',
    'vehicle' => '', 'vehicle_company' => '', 'vehicle_modal' => '', 'vehicle_type' => '',
    'appointments' => '', 'appointment' => '', 'payment' => '', 'payment_mode' => '', 'currency' => '', 'status' => '',
    'settings' => 'active', 'services' => 'active', 'gallery' => '', 'facts' => '', 'testimonial' => '', 'blog' => '', 'clients' => '', 'opening_hours' => '', 'company_social' => '',
    'profile' => '', 'sub_appointment' => '',
  ])
@endsection

@section('breadcum')
  @include('include.breadcum', [
    'title' => 'All Services',
    'from' => 'Admin',
    'to' => 'Services',
  ])
@endsection

@section('content')
  <div class="box-body">
    <button type="button" class="btn btn-default btn-add" data-toggle="modal" data-target="#serviceModal">Add Service</button>
  </div>
  <!-- Create Service Modal -->
  <div id="serviceModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Create Service</h4>
        </div>
        {!! Form::open(['method' => 'POST', 'action' => 'AdminServiceController@store', 'files'=>true]) !!}
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                  {!! Form::label('name', 'Service Name') !!}
                  {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required', 'placeholder'=>'Enter Service Name']) !!}
                  <small class="text-danger">{{ $errors->first('name') }}</small>
                </div>
                <div class="form-group{{ $errors->has('icon') ? ' has-error' : '' }}">
                  {!! Form::label('icon', 'Service Icon') !!}
                  {!! Form::file('icon', ['required'=>'required']) !!}
                  <p class="help-block">Help block text</p>
                  <small class="text-danger">{{ $errors->first('icon') }}</small>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                  {!! Form::label('description', 'Details') !!}
                  {!! Form::textarea('description', null, ['class' => 'form-control', 'rows'=>'6', 'placeholder'=>'Enter Description']) !!}
                  <small class="text-danger">{{ $errors->first('description') }}</small>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <div class="btn-group pull-right">
              {!! Form::reset("Reset", ['class' => 'btn btn-yellow btn-default']) !!}
              {!! Form::submit("Add", ['class' => 'btn btn-default btn-add']) !!}
            </div>
          </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
  <div class="box-body table-responsive">
    <table class="table table-hover">
      <thead>
        <tr class="info">
          <th>S.No.</th>
          <th>Service Icon</th>
          <th>Service Name</th>
          <th>Service Detail</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @if ($services)
          @php($i = 1)
          @foreach ($services as $service)
            <tr>
              <td>
                {{$i}}
                @php($i++)
              </td>
              <td> <img height="50px" width="50px" class="img-responsive" src="{{asset('images/services')}}/{{$service->icon}}" alt=""></td>
              <td>{{$service->name}}</td>
              <td title="{{$service->description}}">{{str_limit($service->description, 50)}}</td>
              <td>
                <!-- Modal -->
                <a type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#{{$service->id}}serviceEditModal">Edit</a>
                <div id="{{$service->id}}serviceEditModal" class="modal fade" role="dialog">
                  <!-- Service Edit Modal -->
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Edit Service</h4>
                      </div>
                      {!! Form::model($service, ['method' => 'PATCH', 'action' => ['AdminServiceController@update', $service->id], 'files'=>true]) !!}
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                {!! Form::label('name', 'Service Name') !!}
                                {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required', 'placeholder'=>'Enter Service Name']) !!}
                                <small class="text-danger">{{ $errors->first('name') }}</small>
                              </div>
                              <div class="form-group{{ $errors->has('icon') ? ' has-error' : '' }}">
                                {!! Form::label('icon', 'Service Icon') !!}
                                {!! Form::file('icon') !!}
                                <p class="help-block">Help block text</p>
                                <small class="text-danger">{{ $errors->first('icon') }}</small>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                {!! Form::label('description', 'Details') !!}
                                {!! Form::textarea('description', null, ['class' => 'form-control', 'rows'=>'6', 'placeholder'=>'Enter Description']) !!}
                                <small class="text-danger">{{ $errors->first('description') }}</small>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <div class="btn-group pull-right">
                            {!! Form::submit("Update", ['class' => 'btn btn-default btn-add']) !!}
                          </div>
                        </div>
                      {!! Form::close() !!}
                    </div>
                  </div>
                </div>
                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#{{$service->id}}serviceDeleteModal">Delete</button>
                <!-- Modal -->
                <div id="{{$service->id}}serviceDeleteModal" class="delete-modal modal fade" role="dialog">
                  <div class="modal-dialog modal-sm">
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <div class="delete-icon"></div>
                      </div>
                      <div class="modal-body text-center">
                        <h4 class="modal-heading">Are You Sure ?</h4>
                        <p>Do you really want to delete these records? This process cannot be undone.</p>
                      </div>
                      <div class="modal-footer">
                        {!! Form::open(['method' => 'DELETE', 'action' => ['AdminServiceController@destroy', $service->id]]) !!}
                            {!! Form::reset("No", ['class' => 'btn btn-gray', 'data-dismiss' => 'modal']) !!}
                            {!! Form::submit("Yes", ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                      </div>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
          @endforeach
        @endif
      </tbody>
    </table>
  </div>
@endsection
