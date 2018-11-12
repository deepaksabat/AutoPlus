@extends('layouts.admin')

@section('sidebar_active')
  @include('include.sidebar_links', [
    'users' => '', 'all_user' => '', 'create_user' => '',
    'teams' => '', 'all_team' => '', 'create_team' => '', 'team_task' => '',
    'plan' => '', 'all_plan' => '', 'plan_price' => '',
    'vehicle' => '', 'vehicle_company' => '', 'vehicle_modal' => '', 'vehicle_type' => '',
    'appointments' => '', 'appointment' => '', 'payment' => '', 'payment_mode' => '', 'currency' => '', 'status' => '',
    'settings' => '', 'services' => '', 'gallery' => '', 'facts' => '', 'testimonial' => '', 'blog' => '', 'clients' => '', 'opening_hours' => '', 'company_social' => '',
    'profile' => '', 'sub_appointment' => '',
  ])
@endsection

@if (Auth::user()->role == 'A')
  @section('breadcum')
    @include('include.breadcum', [
      'title' => 'Dashboard',
      'from' => 'Dashboard',
      'to' => 'Admin',
    ])
  @endsection
  @section('dashboard')
    <div class="dashboard-main-block">
      <div class="row">
        <div class="col-md-8">
          <div class="row">
            <div class="col-md-4">
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>{{$u_count}}</h3>
                  <p>User Registrations</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="{{url('/admin/users')}}" class="small-box-footer">
                  More info <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <div class="col-md-4">
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>{{$teams}}</h3>
                  <p>Team Members</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="{{url('/admin/team')}}" class="small-box-footer">
                  More info <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <div class="col-md-4">
              <div class="small-box bg-red">
                <div class="inner">
                  <h3>{{$team_task}}</h3>
                  <p>Team Tasks</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="{{url('/admin/team_task')}}" class="small-box-footer">
                  More info <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <div class="col-md-4">
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>{{$washing_plan}}</h3>
                  <p>Washing Plans</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{url('/admin/washing_plan')}}" class="small-box-footer">
                  More info <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <div class="col-md-4">
              <div class="small-box bg-red">
                <div class="inner">
                  <h3>{{$appointment}}</h3>
                  <p>Appointments Booked!</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="{{url('/admin/appointment')}}" class="small-box-footer">
                  More info <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <div class="col-md-4">
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>{{$services}}</h3>
                  <p>All Services</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{url('/admin/services')}}" class="small-box-footer">
                  More info <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <div class="col-md-4">
              <div class="small-box bg-red">
                <div class="inner">
                  <h3>{{$blogs}}</h3>
                  <p>All Blogs</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{url('/admin/blog')}}" class="small-box-footer">
                  More info <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <div class="col-md-4">
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>{{$testimonials}}</h3>
                  <p>All Testimonials</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="{{url('/admin/testimonial')}}" class="small-box-footer">
                  More info <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="box box-danger">
            <div class="box-header with-border">
              <h4 class="box-title">Latest Members</h4>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <ul class="users-list clearfix">
                @if ($users)
                  @foreach ($users as $user)
                    <li>
                      {{-- {{$user}} --}}
                      <img src="{{asset('images/users')}}/{{$user->photo}}" alt="User Image">
                      <a class="users-list-name" href="{{url('admin/users/'.$user->id.'/edit')}}" title="{{$user->name}}">{{$user->name}}</a>
                      <span class="users-list-date">{{$user->created_at->diffForHumans()}}</span>
                    </li>
                  @endforeach
                @endif
              </ul>
              <!-- /.users-list -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
              <a href="javascript:void(0)" class="uppercase">View All Users</a>
            </div>
            <!-- /.box-footer -->
          </div>
        </div>
      </div>
    </div>
  @endsection

  @section('content')
    <div class="dashboard-btn-block box-body">
      <a href="{{url('/admin/users')}}" class="btn btn-default btn-add">All Users</a>
      <a href="{{url('/admin/team')}}" class="btn btn-default btn-add">Team</a>
      <a href="{{url('/admin/team_task')}}" class="btn btn-default btn-add">Team Task</a>
      <a href="{{url('/admin/washing_plan')}}" class="btn btn-default btn-add">Washing Plans</a>
      <a href="{{url('/admin/vehicle_type')}}" class="btn btn-default btn-add">Vehicle Type</a>
      <a href="{{url('/admin/appointment')}}" class="btn btn-default btn-add">Appointment</a>
      <a href="{{url('/admin/status')}}" class="btn btn-default btn-add">Status</a>
      <a href="{{url('/admin/services')}}" class="btn btn-default btn-add">Services</a>
      <a href="{{url('/admin/gallery')}}" class="btn btn-default btn-add">Gallery</a>
      <a href="{{url('/admin/facts')}}" class="btn btn-default btn-add">Facts</a>
      <a href="{{url('/admin/testimonial')}}" class="btn btn-default btn-add">Testimonials</a>
      <a href="{{url('/admin/blog')}}" class="btn btn-default btn-add">Blogs</a>
      <a href="{{url('/admin/clients')}}" class="btn btn-default btn-add">Clients</a>
      <a href="{{url('/admin/contact')}}" class="btn btn-default btn-add">Contact</a>
    </div>
  @endsection

@endif

@if (Auth::user()->role == 'S')
  @section('breadcum')
    @include('include.breadcum', [
      'title' => 'Dashboard',
      'from' => 'User',
      'to' => 'Dashboard',
    ])
  @endsection
  @section('content')
    <div class="dashboard-btn-block box-body">
      <a href="{{url('/admin/profile')}}" class="btn btn-default btn-add">Profile</a>
      <a href="{{url('/admin/appointment')}}" class="btn btn-default btn-add">Appointments</a>
    </div>
  @endsection
@endif
