@extends('layouts.admin')

@section('sidebar_active')
  @include('include.sidebar_links', [
    'users' => '', 'all_user' => '', 'create_user' => '',
    'teams' => '', 'all_team' => '', 'create_team' => '', 'team_task' => '',
    'plan' => 'active', 'all_plan' => '', 'plan_price' => 'active',
    'vehicle' => '', 'vehicle_company' => '', 'vehicle_modal' => '', 'vehicle_type' => '',
    'appointments' => '', 'appointment' => '', 'payment' => '', 'payment_mode' => '', 'currency' => '', 'status' => '',
    'settings' => '', 'services' => '', 'gallery' => '', 'facts' => '', 'testimonial' => '', 'blog' => '', 'clients' => '', 'opening_hours' => '', 'company_social' => '',
    'profile' => '', 'sub_appointment' => '',
  ])
@endsection

@section('breadcum')
  @include('include.breadcum', [
    'title' => 'Washing Plan Price',
    'from' => 'Admin',
    'to' => 'Plan Prices',
  ])
@endsection

@section('content')
  <div class="box-body">
    <button type="button" class="btn btn-default btn-add" data-toggle="modal" data-target="#washing_price_Modal">Add Price</button>
  </div>
  <!-- Create Modal -->
  <div id="washing_price_Modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Create Washing Plan Price</h4>
        </div>
        {!! Form::open(['method' => 'POST', 'action' => 'AdminWashingPriceController@store']) !!}
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group{{ $errors->has('vehicle_type_id') ? ' has-error' : '' }}">
                  {!! Form::label('vehicle_type_id', 'Vehicle Type') !!}
                  {!! Form::select('vehicle_type_id', array(''=>'Choose Vehicle Type') + $vehicle_types, null, ['class' => 'form-control select2', 'required' => 'required']) !!}
                  <small class="text-danger">{{ $errors->first('vehicle_type_id') }}</small>
                </div>
                <div class="form-group{{ $errors->has('washing_plan_id') ? ' has-error' : '' }}">
                  {!! Form::label('washing_plan_id', 'Washing Plan') !!}
                  {!! Form::select('washing_plan_id', array(''=>'Choose Plan') + $washing_plans, null, ['class' => 'form-control select2', 'required' => 'required']) !!}
                  <small class="text-danger">{{ $errors->first('washing_plan_id') }}</small>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                  {!! Form::label('price', 'Price') !!}
                  {!! Form::text('price', null, ['class' => 'form-control', 'required' => 'required', 'placeholder'=>'Enter Plan Price']) !!}
                  <small class="text-danger">{{ $errors->first('price') }}</small>
                </div>
                <div class="form-group{{ $errors->has('duration') ? ' has-error' : '' }}">
                  {!! Form::label('duration', 'Duration') !!}
                  {!! Form::text('duration', null, ['class' => 'form-control', 'required' => 'required', 'placeholder'=>'Enter Plan Duration']) !!}
                  <small class="text-danger">{{ $errors->first('duration') }}</small>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <div class="btn-group pull-right">
              {!! Form::reset("Reset", ['class' => 'btn btn-yellow btn-default']) !!}
              {!! Form::submit("Add Plan", ['class' => 'btn btn-add btn-default']) !!}
            </div>
          </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
  @if ($washing_prices)
    <div class="box-body table-responsive">
      <table class="table table-hover">
        <thead>
          <tr class="info">
            <th>S.No.</th>
            <th>Vehicle Type</th>
            <th>Washing Plan</th>
            <th>Price</th>
            <th>Duration</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @php($i = 1)
          @foreach ($washing_prices as $washing_price)
            <tr>
              <td>
                {{$i}}
                @php($i++)
              </td>
              <td>{{$washing_price->vehicle_type->type}}</td>
              <td>{{$washing_price->washing_plan->name}}</td>
              <td>{{$washing_price->price}}</td>
              <td>{{$washing_price->duration}}</td>
              <td>{{$washing_price->created_at->diffForHumans()}}</td>
              <td>{{$washing_price->updated_at->diffForHumans()}}</td>
              <td>
                <!-- Edit Button -->
                <button type="button" class="btn btn-info btn-sm add-btn" data-toggle="modal" data-target="#{{$washing_price->id}}edit_Modal">Edit</button>
                <!-- Edit Modal -->
                <div id="{{$washing_price->id}}edit_Modal" class="modal fade" role="dialog">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Edit Washing Price</h4>
                      </div>
                      {!! Form::model($washing_price, ['method' => 'PATCH', 'action' => ['AdminWashingPriceController@update', $washing_price->id]]) !!}
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group{{ $errors->has('vehicle_type_id') ? ' has-error' : '' }}">
                                {!! Form::label('vehicle_type_id', 'Vehicle Type') !!}
                                {!! Form::select('vehicle_type_id', array(''=>'Choose Vehicle Type') + $vehicle_types, null, ['class' => 'form-control select2', 'required' => 'required']) !!}
                                <small class="text-danger">{{ $errors->first('vehicle_type_id') }}</small>
                              </div>
                              <div class="form-group{{ $errors->has('washing_plan_id') ? ' has-error' : '' }}">
                                {!! Form::label('washing_plan_id', 'Washing Plan') !!}
                                {!! Form::select('washing_plan_id', array(''=>'Choose Plan') + $washing_plans, null, ['class' => 'form-control select2', 'required' => 'required']) !!}
                                <small class="text-danger">{{ $errors->first('washing_plan_id') }}</small>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                                {!! Form::label('price', 'Price') !!}
                                {!! Form::text('price', null, ['class' => 'form-control', 'required' => 'required', 'placeholder'=>'Enter Plan Price']) !!}
                                <small class="text-danger">{{ $errors->first('price') }}</small>
                              </div>
                              <div class="form-group{{ $errors->has('duration') ? ' has-error' : '' }}">
                                {!! Form::label('duration', 'Duration') !!}
                                {!! Form::text('duration', null, ['class' => 'form-control', 'required' => 'required', 'placeholder'=>'Enter Plan Duration']) !!}
                                <small class="text-danger">{{ $errors->first('duration') }}</small>
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
                <button type="button" class="btn btn-info btn-sm add-btn btn-danger" data-toggle="modal" data-target="#{{$washing_price->id}}delete_Modal">Delete</button>
                <!-- Create Delete Modal -->
                <div id="{{$washing_price->id}}delete_Modal" class="delete-modal modal fade" role="dialog">
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
                        {!! Form::open(['method' => 'DELETE', 'action' => ['AdminWashingPriceController@destroy', $washing_price->id]]) !!}
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
