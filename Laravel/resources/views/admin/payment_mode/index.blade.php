@extends('layouts.admin')

@section('sidebar_active')
  @include('include.sidebar_links', [
    'users' => '', 'all_user' => '', 'create_user' => '',
    'teams' => '', 'all_team' => '', 'create_team' => '', 'team_task' => '',
    'plan' => '', 'all_plan' => '', 'plan_price' => '',
    'vehicle' => '', 'vehicle_company' => '', 'vehicle_modal' => '', 'vehicle_type' => '',
    'appointments' => 'active', 'appointment' => '', 'payment' => '', 'payment_mode' => 'active', 'currency' => '', 'status' => '',
    'settings' => '', 'services' => '', 'gallery' => '', 'facts' => '', 'testimonial' => '', 'blog' => '', 'clients' => '', 'opening_hours' => '', 'company_social' => '',
    'profile' => '', 'sub_appointment' => '',
  ])
@endsection

@section('breadcum')
  @include('include.breadcum', [
    'title' => 'Payment Mode',
    'from' => 'Admin',
    'to' => 'Payment Mode',
  ])
@endsection

@section('content')

  <div class="box-body">
    <button type="button" class="btn btn-default btn-add" data-toggle="modal" data-target="#createModal">Add Mode</button>
  </div>
  <!-- Create Modal -->
  <div id="createModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Create Payment Mode</h4>
        </div>
        {!! Form::open(['method' => 'POST', 'action' => 'AdminPaymentModeController@store']) !!}
          <div class="modal-body">
            <div class="form-group{{ $errors->has('mode') ? ' has-error' : '' }}">
                {!! Form::label('mode', 'Mode') !!}
                {!! Form::text('mode', null, ['class' => 'form-control', 'required' => 'required', 'placeholder'=>'Enter Payment Mode']) !!}
                <small class="text-danger">{{ $errors->first('mode') }}</small>
            </div>
          </div>
          <div class="modal-footer">
            <div class="btn-group pull-right">
              {!! Form::reset("Reset", ['class' => 'btn btn-yellow btn-default']) !!}
              {!! Form::submit("Add Mode", ['class' => 'btn btn-default btn-add']) !!}
            </div>
          </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
  <div class="box-body table-resposive">
    <table class="table table-hover">
      <thead>
        <tr class="info">
          <th>S.No.</th>
          <th>Payment Mode</th>
          <th>Created at</th>
          <th>updated at</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @if ($modes)
          @php($i = 1)
          @foreach ($modes as $mode)
            <tr>
              <td>
                {{$i}}
                @php($i++)
              </td>
              <td>{{$mode->mode}}</td>
              <td>{{$mode->created_at->diffForHumans()}}</td>
              <td>{{$mode->updated_at->diffForHumans()}}</td>
              <td>
                <div class="action-btns">
                  <!-- Edit Button -->
                  <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#{{$mode->id}}editModal">Edit</button>
                  <!-- Edit Modal -->
                  <div id="{{$mode->id}}editModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Edit Payment Mode</h4>
                        </div>
                        {!! Form::model($mode, ['method' => 'PATCH', 'action' => ['AdminPaymentModeController@update', $mode->id]]) !!}
                          <div class="modal-body">
                            <div class="form-group{{ $errors->has('mode') ? ' has-error' : '' }}">
                                {!! Form::label('mode', 'Mode') !!}
                                {!! Form::text('mode', null, ['class' => 'form-control', 'required' => 'required']) !!}
                                <small class="text-danger">{{ $errors->first('mode') }}</small>
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
                  <!-- Delete Button -->
                  <button type="button" class="btn btn-info btn-sm btn-danger" data-toggle="modal" data-target="#{{$mode->id}}DeleteModal">Delete</button>
                  <!-- Delete Modal -->
                  <div id="{{$mode->id}}DeleteModal" class="delete-modal modal fade" role="dialog">
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
                          {!! Form::open(['method' => 'DELETE', 'action' => ['AdminPaymentModeController@destroy', $mode->id]]) !!}
                              {!! Form::reset("No", ['class' => 'btn btn-gray', 'data-dismiss' => 'modal']) !!}
                              {!! Form::submit("Yes", ['class' => 'btn btn-danger']) !!}
                          {!! Form::close() !!}
                        </div>
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
