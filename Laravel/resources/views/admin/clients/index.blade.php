@extends('layouts.admin')

@section('sidebar_active')
  @include('include.sidebar_links', [
    'users' => '', 'all_user' => '', 'create_user' => '',
    'teams' => '', 'all_team' => '', 'create_team' => '', 'team_task' => '',
    'plan' => '', 'all_plan' => '', 'plan_price' => '',
    'vehicle' => '', 'vehicle_company' => '', 'vehicle_modal' => '', 'vehicle_type' => '',
    'appointments' => '', 'appointment' => '', 'payment' => '', 'payment_mode' => '', 'currency' => '', 'status' => '',
    'settings' => 'active', 'services' => '', 'gallery' => '', 'facts' => '', 'testimonial' => '', 'blog' => '', 'clients' => 'active', 'opening_hours' => '', 'company_social' => '',
    'profile' => '', 'sub_appointment' => '',
  ])
@endsection

@section('breadcum')
  @include('include.breadcum', [
    'title' => 'Clients CRUD',
    'from' => 'Admin',
    'to' => 'Clients',
  ])
@endsection

@section('content')

  <div class="box-body">
    <button type="button" class="btn btn-default btn-add" data-toggle="modal" data-target="#createModal">Add Client</button>
  </div>
  <!-- Create Modal -->
  <div id="createModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Clients</h4>
        </div>
        {!! Form::open(['method' => 'POST', 'action' => 'AdminClientsController@store', 'files'=>true]) !!}
          <div class="modal-body">
            <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                {!! Form::label('image', 'Select Clients Logo') !!}
                {!! Form::file('image', ['required' => 'required']) !!}
                <p class="help-block">Help block text</p>
                <small class="text-danger">{{ $errors->first('image') }}</small>
            </div>
          </div>
          <div class="modal-footer">
            <div class="btn-group pull-right">
              {!! Form::reset("Reset", ['class' => 'btn btn-yellow btn-default']) !!}
              {!! Form::submit("Add Client", ['class' => 'btn btn-default btn-add']) !!}
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
          <th>Clients Logo</th>
          <th>Created at</th>
          <th>updated at</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @if ($clients)
          @php($i = 1)
          @foreach ($clients as $client)
            <tr>
              <td>
                {{$i}}
                @php($i++)
              </td>
              <td><img src="{{asset('images/clients')}}/{{$client->image}}" class="img-responsive" alt=""></td>
              <td>{{$client->created_at->diffForHumans()}}</td>
              <td>{{$client->updated_at->diffForHumans()}}</td>
              <td>
                <div class="action-btns">
                  <!-- Edit Button -->
                  <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#{{$client->id}}editModal">Edit</button>
                  <!-- Edit Modal -->
                  <div id="{{$client->id}}editModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Edit Client</h4>
                        </div>
                        {!! Form::model($client, ['method' => 'PATCH', 'action' => ['AdminClientsController@update', $client->id], 'files'=>true]) !!}
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-md-6">
                                <img src="{{asset('images/clients')}}/{{$client->image}}" class="img-responsive" alt="">
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                                      {!! Form::label('image', 'Select Client Logo') !!}
                                      {!! Form::file('image', ['required' => 'required']) !!}
                                      <p class="help-block">Help block text</p>
                                      <small class="text-danger">{{ $errors->first('image') }}</small>
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
                  </div>
                  <!-- Delete Button -->
                  <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#{{$client->id}}DeleteModal">Delete</button>
                  <!-- Delete Modal -->
                  <div id="{{$client->id}}DeleteModal" class="delete-modal modal fade" role="dialog">
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
                          {!! Form::open(['method' => 'DELETE', 'action' => ['AdminClientsController@destroy', $client->id]]) !!}
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
