@extends('layouts.admin')

@section('sidebar_active')
  @include('include.sidebar_links', [
    'users' => '', 'all_user' => '', 'create_user' => '',
    'teams' => '', 'all_team' => '', 'create_team' => '', 'team_task' => '',
    'plan' => '', 'all_plan' => '', 'plan_price' => '',
    'vehicle' => 'active', 'vehicle_company' => '', 'vehicle_modal' => '', 'vehicle_type' => 'active',
    'appointments' => '', 'appointment' => '', 'payment' => '', 'payment_mode' => '', 'currency' => '', 'status' => '',
    'settings' => '', 'services' => '', 'gallery' => '', 'facts' => '', 'testimonial' => '', 'blog' => '', 'clients' => '', 'opening_hours' => '', 'company_social' => '',
    'profile' => '', 'sub_appointment' => '',
  ])
@endsection

@section('breadcum')
  @include('include.breadcum', [
    'title' => 'Vehicle Types',
    'from' => 'Admin',
    'to' => 'Vehicle types',
  ])
@endsection

@section('content')
  <div class="box-body">
    <button type="button" class="btn btn-default btn-add" data-toggle="modal" data-target="#create_vehicle_type">Add Type</button>
  </div>
  <!-- Create Modal -->
  <div id="create_vehicle_type" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Create Vehicle Type</h4>
        </div>
        {!! Form::open(['method' => 'POST', 'action' => 'AdminVehicleTypeController@store']) !!}
          <div class="modal-body">
            <div class="row">
              <div class="form-group{{ $errors->has('icon') ? ' has-error' : '' }} col-md-6">
                {!! Form::label('icon', 'Icon Code') !!}
                {!! Form::text('icon', null, ['class' => 'form-control iconpicker-custom', 'placeholder'=>'Choose Icon']) !!}
                <small class="text-danger">{{ $errors->first('icon') }}</small>
              </div>
              <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }} col-md-6">
                {!! Form::label('type', 'Vehicle Type') !!}
                {!! Form::text('type', null, ['class' => 'form-control', 'required' => 'required', 'placeholder'=>'Vehicle Type']) !!}
                <small class="text-danger">{{ $errors->first('type') }}</small>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <div class="btn-group pull-right">
              {!! Form::reset("Reset", ['class' => 'btn btn-yellow btn-default']) !!}
              {!! Form::submit("Add Type", ['class' => 'btn btn-default btn-add']) !!}
            </div>
          </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
  @if ($vehicle_types)
    <div class="box-body table-responsive">
      <table class="table table-hover">
        <thead>
          <tr class="info">
            <th>S.No.</th>
            <th>Icon</th>
            <th>Vehicle Type</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @php($i = 1)
          @foreach ($vehicle_types as $vehicle_type)
            <tr>
              <td>
                {{$i}}
                @php($i++)
              </td>
              <td><i class="fa {{$vehicle_type->icon}}"></i></td>
              <td>{{$vehicle_type->type}}</td>
              <td>{{$vehicle_type->created_at->diffForHumans()}}</td>
              <td>{{$vehicle_type->updated_at->diffForHumans()}}</td>
              <td>
                <!-- Edit Button -->
                <button type="button" class="btn btn-info btn-sm add-btn" data-toggle="modal" data-target="#{{$vehicle_type->id}}type_edit_Modal">Edit</button>
                <!-- Edit Modal -->
                <div id="{{$vehicle_type->id}}type_edit_Modal" class="modal fade" role="dialog">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Edit Vehicle Type</h4>
                      </div>
                      {!! Form::model($vehicle_type, ['method' => 'PATCH', 'action' => ['AdminVehicleTypeController@update', $vehicle_type->id]]) !!}
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group{{ $errors->has('icon') ? ' has-error' : '' }}">
                                {!! Form::label('icon', 'Icon Code') !!}
                                {!! Form::text('icon', null, ['class' => 'form-control iconpicker-custom', 'required' => 'required']) !!}
                                <small class="text-danger">{{ $errors->first('icon') }}</small>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                                {!! Form::label('type', 'Vehicle Type') !!}
                                {!! Form::text('type', null, ['class' => 'form-control', 'required' => 'required', 'placeholder'=>'Vehicle Type']) !!}
                                <small class="text-danger">{{ $errors->first('type') }}</small>
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
                <!-- End Edit Button -->
                <!-- Delete Button -->
                <button type="button" class="btn btn-danger btn-sm add-btn" data-toggle="modal" data-target="#{{$vehicle_type->id}}type_del_Modal">Delete</button>
                <!-- Delete Modal -->
                <div id="{{$vehicle_type->id}}type_del_Modal" class="delete-modal modal fade" role="dialog">
                  <div class="modal-dialog modal-sm">
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
                        {!! Form::open(['method' => 'DELETE', 'action' => ['AdminVehicleTypeController@destroy', $vehicle_type->id]]) !!}
                            {!! Form::reset("No", ['class' => 'btn btn-gray', 'data-dismiss' => 'modal']) !!}
                            {!! Form::submit("Yes", ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End Delete Modal -->
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  @endif
@endsection
