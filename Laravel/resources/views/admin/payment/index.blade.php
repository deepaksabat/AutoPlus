@extends('layouts.admin')

@section('sidebar_active')
  @include('include.sidebar_links', [
    'users' => '', 'all_user' => '', 'create_user' => '',
    'teams' => '', 'all_team' => '', 'create_team' => '', 'team_task' => '',
    'plan' => '', 'all_plan' => '', 'plan_price' => '',
    'vehicle' => '', 'vehicle_company' => '', 'vehicle_modal' => '', 'vehicle_type' => '',
    'appointments' => 'active', 'appointment' => '', 'payment' => 'active', 'payment_mode' => '', 'currency' => '', 'status' => '',
    'settings' => '', 'services' => '', 'gallery' => '', 'facts' => '', 'testimonial' => '', 'blog' => '', 'clients' => '', 'opening_hours' => '', 'company_social' => '',
    'profile' => '', 'sub_appointment' => '',
  ])
@endsection

@section('breadcum')
  @include('include.breadcum', [
    'title' => 'All Payments',
    'from' => 'Admin',
    'to' => 'Payments',
  ])
@endsection

@section('content')
  <div class="box-body table-responsive">
    @if ($payments)
      <table class="table table-hover">
        <thead>
          <tr class="info">
            <th>S.No.</th>
            <th>User</th>
            <th>Appointment Id</th>
            <th>Price</th>
            <th>Discount</th>
            <th>Advance</th>
            <th>Payment Method</th>
            <th>Remark</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @php($j = 1)
          @foreach ($payments as $payment)
            <tr>
              <td>
                {{$j}}
                @php($j++)
              </td>
              <td>{{$payment->user->name}}</td>
              <td>{{$payment->appointment_id}}</td>
              <td>
                @if ($washing_prices)
                  @foreach ($washing_prices as $washing_price)
                    @if ($washing_price->washing_plan_id == $payment->appointment->washing_plan_id && $washing_price->vehicle_type_id == $payment->appointment->vehicle_types_id)
                      {{$washing_price->price}}
                    @endif
                  @endforeach
                @endif
              </td>
              <td>
                @if ($payment->discount == '')
                  -
                @else
                  {{$payment->discount}}
                @endif
              </td>
              <td>
                @if ($payment->advance == '')
                  -
                @else
                  {{$payment->advance}}
                @endif
              </td>
              <td>
                @if ($payment->payment_mode_id == '')
                  -
                @else
                  {{$payment->payment_mode->mode}}
                @endif
              </td>
              <td>
                @if ($payment->remark == '')
                  -
                @else
                  {{$payment->remark}}
                @endif
              </td>
              <td>
                <!-- Edit Button -->
                <button type="button" class="btn btn-info btn-sm add-btn" data-toggle="modal" data-target="#{{$payment->id}}type_edit_Modal">Edit</button>
                <!-- Edit Modal -->
                <div id="{{$payment->id}}type_edit_Modal" class="modal fade" role="dialog">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Edit Payment</h4>
                      </div>
                      {!! Form::model($payment, ['method' => 'PATCH', 'action' => ['AdminPaymentController@update', $payment->id]]) !!}
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group{{ $errors->has('discount') ? ' has-error' : '' }}">
                                {!! Form::label('discount', 'Discount') !!}
                                {!! Form::text('discount', null, ['class' => 'form-control', 'placeholder'=>'Enter Discount']) !!}
                                <small class="text-danger">{{ $errors->first('discount') }}</small>
                              </div>
                              <div class="form-group{{ $errors->has('payment_mode_id') ? ' has-error' : '' }}">
                                {!! Form::label('payment_mode_id', 'Payment Mode') !!}
                                {!! Form::select('payment_mode_id', array(''=>'Chooes Payment Mode') + $payment_mode_lists, null , ['class' => 'form-control select2']) !!}
                                <small class="text-danger">{{ $errors->first('payment_mode_id') }}</small>
                              </div>
                              <div class="form-group{{ $errors->has('advance') ? ' has-error' : '' }}">
                                {!! Form::label('advance', 'Advance Payment') !!}
                                {!! Form::text('advance', null, ['class' => 'form-control', 'placeholder'=>'Enter Payment In Advance']) !!}
                                <small class="text-danger">{{ $errors->first('advance') }}</small>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group{{ $errors->has('remark') ? ' has-error' : '' }}">
                                {!! Form::label('remark', 'Remark') !!}
                                {!! Form::textarea('remark', null, ['class' => 'form-control', 'rows'=>'8', 'placeholder'=>'Enter Remark']) !!}
                                <small class="text-danger">{{ $errors->first('remark') }}</small>
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
                <button type="button" class="btn btn-danger btn-sm add-btn" data-toggle="modal" data-target="#{{$payment->id}}type_del_Modal">Delete</button>
                <!-- Delete Modal -->
                <div id="{{$payment->id}}type_del_Modal" class="delete-modal modal fade" role="dialog">
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
                        {!! Form::open(['method' => 'DELETE', 'action' => ['AdminPaymentController@destroy', $payment->id]]) !!}
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
    @endif
  </div>
@endsection
