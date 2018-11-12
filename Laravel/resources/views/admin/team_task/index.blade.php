@extends('layouts.admin')

@section('sidebar_active')
  @include('include.sidebar_links', [
    'users' => '', 'all_user' => '', 'create_user' => '',
    'teams' => 'active', 'all_team' => '', 'create_team' => '', 'team_task' => 'active',
    'plan' => '', 'all_plan' => '', 'plan_price' => '',
    'vehicle' => '', 'vehicle_company' => '', 'vehicle_modal' => '', 'vehicle_type' => '',
    'appointments' => '', 'appointment' => '', 'payment' => '', 'payment_mode' => '', 'currency' => '', 'status' => '',
    'settings' => '', 'services' => '', 'gallery' => '', 'facts' => '', 'testimonial' => '', 'blog' => '', 'clients' => '', 'opening_hours' => '', 'company_social' => '',
    'profile' => '', 'sub_appointment' => '',
  ])
@endsection

@section('breadcum')
  @include('include.breadcum', [
    'title' => 'Team Tasks',
    'from' => 'Admin',
    'to' => 'Team Task',
  ])
@endsection

@section('content')

  <div class="box-body">
    <button type="button" class="btn btn-default btn-add" data-toggle="modal" data-target="#task_modal">Add Task</button>
  </div>
  <!-- Create Modal -->
  <div id="task_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Create Task</h4>
        </div>
        {!! Form::open(['method' => 'POST', 'action' => 'AdminTeamTaskController@store']) !!}
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group{{ $errors->has('team_id') ? ' has-error' : '' }}">
                  {!! Form::label('team_id', 'Team Member') !!}
                  {!! Form::select('team_id', array(''=>'Choose Member') + $teams, null, ['class' => 'form-control select2', 'required' => 'required']) !!}
                  <small class="text-danger">{{ $errors->first('team_id') }}</small>
                </div>
                <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
                  {!! Form::label('user_id', 'Customer') !!}
                  {!! Form::select('user_id', array(''=>'Choose Customer') + $users, null, ['class' => 'form-control select2', 'required' => 'required']) !!}
                  <small class="text-danger">{{ $errors->first('user_id') }}</small>
                </div>
                <div class="form-group{{ $errors->has('status_id') ? ' has-error' : '' }}">
                  {!! Form::label('status_id', 'Status') !!}
                  {!! Form::select('status_id', array('0'=>'Choose Status') + $statuses, null, ['class' => 'form-control select2']) !!}
                  <small class="text-danger">{{ $errors->first('status_id') }}</small>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group{{ $errors->has('task') ? ' has-error' : '' }}">
                  {!! Form::label('task', 'Task') !!}
                  {!! Form::textarea('task', null, ['class' => 'form-control', 'rows'=>'9', 'required' => 'required', 'placeholder'=>'Create Task']) !!}
                  <small class="text-danger">{{ $errors->first('task') }}</small>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <div class="btn-group pull-right">
              {!! Form::reset("Reset", ['class' => 'btn btn-yellow btn-default']) !!}
              {!! Form::submit("Add Task", ['class' => 'btn btn-add btn-default']) !!}
            </div>
          </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
  @if ($tasks)
    <div class="box-body table-responsive">
      <table class="table table-hover">
        <thead>
          <tr class="info">
            <th>S.No.</th>
            <th>Team Member</th>
            <th>Customer</th>
            <th>Task</th>
            <th>Status</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @php($i = 1)
          @foreach ($tasks as $task)
            <tr>
              <td>
                {{$i}}
                @php($i++)
              </td>
              <td>{{$task->team->name}}</td>
              <td>{{$task->user->name}}</td>
              <td>{{$task->task}}</td>
              <td>
                @if ($task->status_id == '0')
                  None
                @else
                  {{$task->status->status}}
                @endif
              </td>
              <td>{{$task->created_at->diffForHumans()}}</td>
              <td>{{$task->updated_at->diffForHumans()}}</td>
              <td>
                <!-- Edit Button -->
                <button type="button" class="btn btn-info btn-sm add-btn" data-toggle="modal" data-target="#{{$task->id}}edit_Modal">Edit</button>
                <!-- Edit Modal -->
                <div id="{{$task->id}}edit_Modal" class="modal fade" role="dialog">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Edit Task</h4>
                      </div>
                      {!! Form::model($task, ['method' => 'PATCH', 'action' => ['AdminTeamTaskController@update', $task->id]]) !!}
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group{{ $errors->has('team_id') ? ' has-error' : '' }}">
                                {!! Form::label('team_id', 'Team Member') !!}
                                {!! Form::select('team_id', array(''=>'Choose Member') + $teams, null, ['class' => 'form-control select2', 'required' => 'required']) !!}
                                <small class="text-danger">{{ $errors->first('team_id') }}</small>
                              </div>
                              <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
                                {!! Form::label('user_id', 'Customer') !!}
                                {!! Form::select('user_id', array(''=>'Choose Customer') + $users, null, ['class' => 'form-control select2', 'required' => 'required']) !!}
                                <small class="text-danger">{{ $errors->first('user_id') }}</small>
                              </div>
                              <div class="form-group{{ $errors->has('status_id') ? ' has-error' : '' }}">
                                {!! Form::label('status_id', 'Status') !!}
                                {!! Form::select('status_id', array('0'=>'Choose Status') + $statuses, null, ['class' => 'form-control select2']) !!}
                                <small class="text-danger">{{ $errors->first('status_id') }}</small>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group{{ $errors->has('task') ? ' has-error' : '' }}">
                                {!! Form::label('task', 'Task') !!}
                                {!! Form::textarea('task', null, ['class' => 'form-control', 'rows'=>'9', 'required' => 'required', 'placeholder'=>'Create Task']) !!}
                                <small class="text-danger">{{ $errors->first('task') }}</small>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <div class="btn-group pull-right">
                            {!! Form::submit("Update", ['class' => 'btn btn-add btn-default']) !!}
                          </div>
                        </div>
                      {!! Form::close() !!}
                    </div>
                  </div>
                </div>
                <!-- End Edit Button -->
                <!-- Delete Button -->
                <button type="button" class="btn btn-danger btn-sm add-btn" data-toggle="modal" data-target="#{{$task->id}}delete_Modal">Delete</button>
                <!-- Delete Modal -->
                <div id="{{$task->id}}delete_Modal" class="delete-modal modal fade" role="dialog">
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
                        {!! Form::open(['method' => 'DELETE', 'action' => ['AdminTeamTaskController@destroy', $task->id]]) !!}
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
