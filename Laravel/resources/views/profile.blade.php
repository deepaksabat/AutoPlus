@extends('layouts.admin')

@section('sidebar_active')
  @include('include.sidebar_links', [
    'users' => '', 'all_user' => '', 'create_user' => '',
    'teams' => '', 'all_team' => '', 'create_team' => '', 'team_task' => '',
    'plan' => '', 'all_plan' => '', 'plan_price' => '',
    'vehicle' => '', 'vehicle_company' => '', 'vehicle_modal' => '', 'vehicle_type' => '',
    'appointments' => '', 'appointment' => '', 'payment' => '', 'payment_mode' => '', 'currency' => '', 'status' => '',
    'settings' => '', 'services' => '', 'gallery' => '', 'facts' => '', 'testimonial' => '', 'blog' => '', 'clients' => '', 'opening_hours' => '', 'company_social' => '',
    'profile' => 'active', 'sub_appointment' => '',
  ])
@endsection

@section('breadcum')
  @include('include.breadcum', [
    'title' => 'My Profile',
    'from' => 'Admin',
    'to' => 'My Profile',
  ])
@endsection

@section('dashboard')
  <div class="box-body profile-card">
    <div class="box box-widget widget-user">
      <div class="widget-user-header">
        <h3 class="widget-user-username">{{Auth::user()->name}}</h3>
        <h5 class="widget-user-desc">{{Auth::user()->role == 'A' ? 'Administrator' : 'Subscriber'}}</h5>
      </div>
      <div class="widget-user-image">
        <img src="{{asset('images/users')}}/{{Auth::user()->photo}}" class="img-responsive img-circle" alt="Profile">
      </div>
      <div class="box-footer">
        <div class="row">
          <div class="col-sm-4 border-right">
            <div class="description-block">
              <h5 class="description-header">Name</h5>
              <span class="description-text">{{Auth::user()->name}}</span>
            </div>
            <!-- /.description-block -->
          </div>
          <!-- /.col -->
          <div class="col-sm-4 border-right">
            <div class="description-block">
              <h5 class="description-header">Email</h5>
              <span class="description-text">{{Auth::user()->email}}</span>
            </div>
            <!-- /.description-block -->
          </div>
          <!-- /.col -->
          <div class="col-sm-4">
            <div class="description-block">
              <h5 class="description-header">Gender</h5>
              <span class="description-text">{{Auth::user()->sex == 'M' ? 'Male' : 'Female'}}</span>
            </div>
            <!-- /.description-block -->
          </div>
          <!-- /.col -->
          <div class="col-sm-4 border-right">
            <div class="description-block">
              <h5 class="description-header">Date Of Birth</h5>
              <span class="description-text">{{Auth::user()->dob}}</span>
            </div>
            <!-- /.description-block -->
          </div>
          <div class="col-sm-4 border-right">
            <div class="description-block">
              <h5 class="description-header">Mobile</h5>
              <span class="description-text">{{Auth::user()->mobile}}</span>
            </div>
            <!-- /.description-block -->
          </div>
          <div class="col-sm-4 border-right">
            <div class="description-block">
              <h5 class="description-header">Phone</h5>
              <span class="description-text">{{Auth::user()->phone ? Auth::user()->phone : '-'}}</span>
            </div>
            <!-- /.description-block -->
          </div>
          <div class="col-sm-4 border-right">
            <div class="description-block">
              <h5 class="description-header">Address</h5>
              <span class="description-text">{{Auth::user()->address}}</span>
            </div>
            <!-- /.description-block -->
          </div>
          <div class="col-sm-4 border-right">
            <div class="description-block">
              <h5 class="description-header">Role</h5>
              <span class="description-text">{{Auth::user()->role == 'A' ? 'Administrator' : 'Subscriber'}}</span>
            </div>
            <!-- /.description-block -->
          </div>
          <div class="col-sm-4 border-right">
            <div class="description-block">
              <h5 class="description-header">Created At</h5>
              <span class="description-text">{{Auth::user()->created_at->diffForHumans()}}</span>
            </div>
            <!-- /.description-block -->
          </div>
          <div class="col-sm-4 border-right">
            <div class="description-block">
              <h5 class="description-header">Updated At</h5>
              <span class="description-text">{{Auth::user()->updated_at->diffForHumans()}}</span>
            </div>
            <!-- /.description-block -->
          </div>
          <div class="col-sm-4 border-right">
            <div class="description-block">
              <h5 class="description-header">Edit</h5>
              <span class="description-text"><a href="{{route('users.edit', Auth::user()->id)}}" class="btn btn-sm btn-info">Edit</a></span>
            </div>
            <!-- /.description-block -->
          </div>
          <div class="col-sm-4 border-right">
            <div class="description-block">
              <h5 class="description-header">Delete</h5>
              <span class="description-text">
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal">Delete</button>
                <!-- Modal -->
                <div id="deleteModal" class="delete-modal modal fade" role="dialog">
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
                        {!! Form::open(['method' => 'DELETE', 'action' => ['AdminUsersController@destroy', Auth::user()->id]]) !!}
                          {!! Form::reset("No", ['class' => 'btn btn-gray', 'data-dismiss'=>'modal']) !!}
                          {!! Form::submit("Yes", ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                      </div>
                    </div>
                  </div>
                </div>
              </span>
            </div>
            <!-- /.description-block -->
          </div>
        </div>
        <!-- /.row -->
      </div>
    </div>
  </div>
@endsection
