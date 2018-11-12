@extends('layouts.admin')

@section('sidebar_active')
  @include('include.sidebar_links', [
    'users' => '', 'all_user' => '', 'create_user' => '',
    'teams' => 'active', 'all_team' => 'active', 'create_team' => '', 'team_task' => '',
    'plan' => '', 'all_plan' => '', 'plan_price' => '',
    'vehicle' => '', 'vehicle_company' => '', 'vehicle_modal' => '', 'vehicle_type' => '',
    'appointments' => '', 'appointment' => '', 'payment' => '', 'payment_mode' => '', 'currency' => '', 'status' => '',
    'settings' => '', 'services' => '', 'gallery' => '', 'facts' => '', 'testimonial' => '', 'blog' => '', 'clients' => '', 'opening_hours' => '', 'company_social' => '',
    'profile' => '', 'sub_appointment' => '',
  ])
@endsection

@section('breadcum')
  @include('include.breadcum', [
    'title' => 'My Team',
    'from' => 'Admin',
    'to' => 'My Team',
  ])
@endsection

@section('content')
<div class="teams-table-block table-responsive">
  <table class="table table-hover teams-table">
    <thead>
      <tr class="info">
        <th>S.No.</th>
        <th>Image</th>
        <th>Name</th>
        <th>Email</th>
        <th>Sex</th>
        <th>DOB</th>
        <th>Mobile</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Post</th>
        <th>Status</th>
        <th>Socials</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      @if ($teams)
        @php($i = 1)
        @foreach ($teams as $team)
          <tr>
            <td>
              {{$i}}
              @php($i++)
            </td>
            <td><img width="80px" height="80px" src="{{asset('images/teams/')}}/{{$team->photo}}" alt="" class="img-responsive"></td>
            <td>{{$team->name}}</td>
            <td>{{$team->email}}</td>
            <td>{{$team->sex == 'M' ? 'Male' : 'Female'}}</td>
            <td>{{$team->dob}}</td>
            <td>{{$team->mobile}}</td>
            <td>{{$team->phone ? $team->phone : '-'}}</td>
            <td>{{str_limit($team->address, 10)}}</td>
            <td>{{$team->post}}</td>
            <td>{{$team->status == 'A' ? 'Active' : 'Inactive'}}</td>
            <td>
              <a href="#" type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#{{$team->id}}createModal">Add Social</a>
              <!-- Social Modal -->
              <div id="{{$team->id}}createModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Social Links</h4>
                    </div>
                    <div class="modal-body">
                      <div class="box box-primary table-responsive">
                        <table class="table table-hover teams-social-table">
                          <thead>
                            <tr class="info">
                              <th>Social Link</th>
                              <th>Social Network</th>
                              <th>Social Icon</th>
                              <th>Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($socials as $social)
                              @if ($social->team_id == $team->id)
                                <tr>
                                  <td>{{$social->url}}</td>
                                  <td>{{$social->social}}</td>
                                  <td><i class="fa {{$social->social_icon ? $social->social_icon : 'No Icon Select'}}"></i></td>
                                  <td>
                                    <a href="" type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit_modal{{$social->id}}">Edit</a>
                                    <!-- Social Modal -->
                                    <div id="edit_modal{{$social->id}}" class="modal fade" role="dialog">
                                      <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Update Social Links</h4>
                                          </div>
                                          {!! Form::model($social, ['method' => 'PATCH', 'action' => ['AdminTeamSocialController@update', $social->id]]) !!}
                                            <div class="modal-body">
                                              <div class="row">
                                                <div class="col-md-4">
                                                  {!! Form::hidden('team_id', $team->id) !!}
                                                  <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
                                                    {!! Form::label('url', 'Social URL') !!}
                                                    {!! Form::text('url', null, ['class' => 'form-control', 'required' => 'required', 'placeholder'=>'social url']) !!}
                                                    <small class="text-danger">{{ $errors->first('url') }}</small>
                                                  </div>
                                                </div>
                                                <div class="col-md-4">
                                                  <div class="form-group{{ $errors->has('social') ? ' has-error' : '' }}">
                                                    {!! Form::label('social', 'Social') !!}
                                                    {!! Form::select('social', [""=>"Social Networks", "Facebook"=>"Facebook", "Instagram"=>"Instagram", "Twitter"=>"Twitter", "Google"=>"Google", "Pinterest"=>"Pinterest", "You Tube"=>"You Tube", "Tumblr"=>"Tumblr", "Dribbble"=>'Dribbble', "Flickr"=>"Flickr", "Github"=>"Github", "Linkedin"=>"Linkedin", "Skype"=>"Skype"], null, ['class' => 'form-control select2', 'required' => 'required']) !!}
                                                    <small class="text-danger">{{ $errors->first('social') }}</small>
                                                  </div>
                                                </div>
                                                <div class="col-md-4">
                                                  <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                                                      {!! Form::label('social_icon', 'Social Icons') !!}
                                                      {!! Form::text('social_icon', null, ['class' => 'form-control social-icon-picker-left', 'required' => 'required', 'placeholder'=>'Choose social icon']) !!}
                                                      <small class="text-danger">{{ $errors->first('inputname') }}</small>
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
                                    <!-- delete button -->
                                    <a href="" type="button" class="btn btn-info btn-sm btn-danger" data-toggle="modal" data-target="#delete_modal{{$social->id}}">Delete</a>
                                    <!-- Social Modal -->
                                    <div id="delete_modal{{$social->id}}" class="delete-modal modal fade" role="dialog">
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
                                            {!! Form::open(['method' => 'DELETE',  'action' => ['AdminTeamSocialController@destroy', $social->id]]) !!}
                                              {!! Form::reset("No", ['class' => 'btn btn-gray', 'data-dismiss' => 'modal']) !!}
                                              {!! Form::submit("Yes", ['class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!}
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </td>
                                </tr>
                              @endif
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                      {!! Form::open(['method' => 'POST', 'action' => 'AdminTeamSocialController@store']) !!}
                        <div class="row">
                          <div class="col-md-4">
                            {!! Form::hidden('team_id', $team->id) !!}
                            <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
                              {!! Form::label('url', 'Social URL') !!}
                              {!! Form::text('url', null, ['class' => 'form-control', 'required' => 'required', 'placeholder'=>'social url']) !!}
                              <small class="text-danger">{{ $errors->first('url') }}</small>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group{{ $errors->has('social') ? ' has-error' : '' }}">
                              {!! Form::label('social', 'Social') !!}
                              {!! Form::select('social', [""=>"Social Networks", "Facebook"=>"Facebook", "Instagram"=>"Instagram", "Twitter"=>"Twitter", "Google"=>"Google", "Pinterest"=>"Pinterest", "You Tube"=>"You Tube", "Tumblr"=>"Tumblr", "Dribbble"=>'Dribbble', "Flickr"=>"Flickr", "Github"=>"Github", "Linkedin"=>"Linkedin", "Skype"=>"Skype"], null, ['class' => 'form-control select2', 'required' => 'required']) !!}
                              <small class="text-danger">{{ $errors->first('social') }}</small>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                                {!! Form::label('social_icon', 'Social Icons') !!}
                                {!! Form::text('social_icon', null, ['class' => 'form-control social-icon-picker', 'required' => 'required', 'placeholder'=>'Choose social icon']) !!}
                                <small class="text-danger">{{ $errors->first('inputname') }}</small>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <div class="btn-group pull-right">
                          {!! Form::reset("Reset", ['class' => 'btn btn-default btn-yellow']) !!}
                          {!! Form::submit("Add Link", ['class' => 'btn btn-add btn-default']) !!}
                        </div>
                        {!! Form::close() !!}
                      </div>
                  </div>
                </div>
              </div>
            </td>
            <td>{{$team->created_at->diffForHumans()}}</td>
            <td>{{$team->updated_at->diffForHumans()}}</td>
            <td>
              <!-- edit button -->
              <a href="{{route('team.edit', $team->id)}}" class="btn btn-info btn-sm">Edit</a>
            </td>
            <td>
              <!-- Delete button -->
              <button type="button" class="btn btn-info btn-sm btn-danger" data-toggle="modal" data-target="#{{$team->id}}deleteModal">Delete</button>
              <!-- Delete Modal -->
              <div id="{{$team->id}}deleteModal" class="delete-modal modal fade" role="dialog">
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
                      {!! Form::open(['method' => 'DELETE', 'action' => ['AdminTeamController@destroy', $team->id]]) !!}
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
