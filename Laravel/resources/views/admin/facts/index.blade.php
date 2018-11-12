@extends('layouts.admin')

@section('sidebar_active')
  @include('include.sidebar_links', [
    'users' => '', 'all_user' => '', 'create_user' => '',
    'teams' => '', 'all_team' => '', 'create_team' => '', 'team_task' => '',
    'plan' => '', 'all_plan' => '', 'plan_price' => '',
    'vehicle' => '', 'vehicle_company' => '', 'vehicle_modal' => '', 'vehicle_type' => '',
    'appointments' => '', 'appointment' => '', 'payment' => '', 'payment_mode' => '', 'currency' => '', 'status' => '',
    'settings' => 'active', 'services' => '', 'gallery' => '', 'facts' => 'active', 'testimonial' => '', 'blog' => '', 'clients' => '', 'opening_hours' => '', 'company_social' => '',
    'profile' => '', 'sub_appointment' => '',
  ])
@endsection

@section('breadcum')
  @include('include.breadcum', [
    'title' => 'All Facts',
    'from' => 'Admin',
    'to' => 'Facts',
  ])
@endsection

@section('content')
  <div class="box-body">
    <button type="button" class="btn btn-default btn-add" data-toggle="modal" data-target="#factsModal">Add Facts</button>
  </div>
  <!-- Create Modal -->
  <div id="factsModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Create Facts</h4>
        </div>
        {!! Form::open(['method' => 'POST', 'action' => 'AdminFactsController@store']) !!}
          <div class="modal-body">
            <div class="form-group{{ $errors->has('icon') ? ' has-error' : '' }}">
                {!! Form::label('icon', 'Icon Code') !!}
                {!! Form::text('icon', null, ['class' => 'form-control icon-picker', 'required' => 'required', 'placeholder'=>'Choose Icon']) !!}
                <small class="text-danger">{{ $errors->first('icon') }}</small>
            </div>
            <div class="form-group{{ $errors->has('number') ? ' has-error' : '' }}">
                {!! Form::label('number', 'Number') !!}
                {!! Form::text('number', null, ['class' => 'form-control', 'required' => 'required', 'placeholder'=>'Enter Facts No.']) !!}
                <small class="text-danger">{{ $errors->first('number') }}</small>
            </div>
            <div class="form-group{{ $errors->has('detail') ? ' has-error' : '' }}">
                {!! Form::label('detail', 'Detail') !!}
                {!! Form::text('detail', null, ['class' => 'form-control', 'required' => 'required', 'placeholder'=>'Enter Facts Name']) !!}
                <small class="text-danger">{{ $errors->first('detail') }}</small>
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
    <table class="table">
      <thead>
        <tr class="info">
          <th>S.No.</th>
          <th>Icon</th>
          <th>Number</th>
          <th>Detail</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @if ($facts)
          @php($i = 1)
          @foreach ($facts as $fact)
            <tr>
              <td>
                {{$i}}
                @php($i++)
              </td>
              <td><i class="fa {{$fact->icon}}"></i></td>
              <td>{{$fact->number}}</td>
              <td>{{$fact->detail}}</td>
              <td>
                <!-- Edit Button -->
                <a type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#{{$fact->id}}EditModal">Edit</a>
                <div id="{{$fact->id}}EditModal" class="modal fade" role="dialog">
                  <!-- Edit Modal -->
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Edit Facts</h4>
                      </div>
                      {!! Form::model($fact, ['method' => 'PATCH', 'action' => ['AdminFactsController@update', $fact->id]]) !!}
                        <div class="modal-body">
                          <div class="form-group{{ $errors->has('icon') ? ' has-error' : '' }}">
                              {!! Form::label('icon', 'Icon Code') !!}
                              {!! Form::text('icon', null, ['class' => 'form-control icon-picker', 'required' => 'required', 'placeholder'=>'Choose Icon']) !!}
                              <small class="text-danger">{{ $errors->first('icon') }}</small>
                          </div>
                          <div class="form-group{{ $errors->has('number') ? ' has-error' : '' }}">
                              {!! Form::label('number', 'Number') !!}
                              {!! Form::text('number', null, ['class' => 'form-control', 'required' => 'required', 'placeholder'=>'Enter Facts No.']) !!}
                              <small class="text-danger">{{ $errors->first('number') }}</small>
                          </div>
                          <div class="form-group{{ $errors->has('detail') ? ' has-error' : '' }}">
                              {!! Form::label('detail', 'Detail') !!}
                              {!! Form::text('detail', null, ['class' => 'form-control', 'required' => 'required', 'placeholder'=>'Enter Facts Name']) !!}
                              <small class="text-danger">{{ $errors->first('detail') }}</small>
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
                <!-- Edit Button -->
                <a type="button" class="btn btn-info btn-sm btn-danger" data-toggle="modal" data-target="#{{$fact->id}}deleteModal">Delete</a>
                <div id="{{$fact->id}}deleteModal" class="delete-modal modal fade" role="dialog">
                  <!-- Edit Modal -->
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
                        {!! Form::open(['method' => 'DELETE', 'action' => ['AdminFactsController@destroy', $fact->id]]) !!}
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
