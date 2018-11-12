@extends('layouts.admin')

@section('sidebar_active')
  @include('include.sidebar_links', [
    'users' => '', 'all_user' => '', 'create_user' => '',
    'teams' => '', 'all_team' => '', 'create_team' => '', 'team_task' => '',
    'plan' => '', 'all_plan' => '', 'plan_price' => '',
    'vehicle' => '', 'vehicle_company' => '', 'vehicle_modal' => '', 'vehicle_type' => '',
    'appointments' => 'active', 'appointment' => '', 'payment' => '', 'payment_mode' => '', 'currency' => '', 'status' => 'active',
    'settings' => '', 'services' => '', 'gallery' => '', 'facts' => '', 'testimonial' => '', 'blog' => '', 'clients' => '', 'opening_hours' => '', 'company_social' => '',
    'profile' => '', 'sub_appointment' => '',
  ])
@endsection

@section('breadcum')
  @include('include.breadcum', [
    'title' => 'All Status',
    'from' => 'Admin',
    'to' => 'Status',
  ])
@endsection

@section('content')

  <div class="box-body">
    <button type="button" class="btn btn-default btn-add" data-toggle="modal" data-target="#status_modal">Add Status</button>
  </div>
  <!-- Create Modal -->
  <div id="status_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Create Status</h4>
        </div>
        {!! Form::open(['method' => 'POST', 'action' => 'AdminTaskStatusController@store']) !!}
          <div class="modal-body">
            <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                {!! Form::label('status', 'Status Name') !!}
                {!! Form::text('status', null, ['class' => 'form-control', 'required' => 'required', 'placeholder'=>'eg: pending, complete']) !!}
                <small class="text-danger">{{ $errors->first('status') }}</small>
            </div>
          </div>
          <div class="modal-footer">
            <div class="btn-group pull-right">
              {!! Form::reset("Reset", ['class' => 'btn btn-yellow btn-default']) !!}
              {!! Form::submit("Add Status", ['class' => 'btn btn-default btn-add']) !!}
            </div>
          </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
  @if ($statuses)
    <div class="box-body table-responsive">
      <table class="table table-hover">
        <thead>
          <tr class="info">
            <th>S.No.</th>
            <th>Status</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @php($i = 1)
          @foreach ($statuses as $status)
            <tr>
              <td>
                {{$i}}
                @php($i++)
              </td>
              <td>{{$status->status}}</td>
              <td>{{$status->created_at->diffForHumans()}}</td>
              <td>{{$status->updated_at->diffForHumans()}}</td>
              <td>
                <!-- Edit Button -->
                <button type="button" class="btn btn-info btn-sm add-btn" data-toggle="modal" data-target="#{{$status->id}}edit_Modal">Edit</button>
                <!-- Edit Modal -->
                <div id="{{$status->id}}edit_Modal" class="modal fade" role="dialog">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Edit Status</h4>
                      </div>
                      {!! Form::model($status, ['method' => 'PATCH', 'action' => ['AdminTaskStatusController@update', $status->id]]) !!}
                        <div class="modal-body">
                          <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                              {!! Form::label('status', 'Status Name') !!}
                              {!! Form::text('status', null, ['class' => 'form-control', 'required' => 'required']) !!}
                              <small class="text-danger">{{ $errors->first('status') }}</small>
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
                <button type="button" class="btn btn-danger btn-sm add-btn" data-toggle="modal" data-target="#{{$status->id}}delete_Modal">Delete</button>
                <!-- Delete Modal -->
                <div id="{{$status->id}}delete_Modal" class="delete-modal modal fade" role="dialog">
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
                        {!! Form::open(['method' => 'DELETE', 'action' => ['AdminTaskStatusController@destroy', $status->id]]) !!}
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
