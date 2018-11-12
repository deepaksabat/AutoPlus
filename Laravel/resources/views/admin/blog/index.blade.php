@extends('layouts.admin')

@section('sidebar_active')
  @include('include.sidebar_links', [
    'users' => '', 'all_user' => '', 'create_user' => '',
    'teams' => '', 'all_team' => '', 'create_team' => '', 'team_task' => '',
    'plan' => '', 'all_plan' => '', 'plan_price' => '',
    'vehicle' => '', 'vehicle_company' => '', 'vehicle_modal' => '', 'vehicle_type' => '',
    'appointments' => '', 'appointment' => '', 'payment' => '', 'payment_mode' => '', 'currency' => '', 'status' => '',
    'settings' => 'active', 'services' => '', 'gallery' => '', 'facts' => '', 'testimonial' => '', 'blog' => 'active', 'clients' => '', 'opening_hours' => '', 'company_social' => '',
    'profile' => '', 'sub_appointment' => '',
  ])
@endsection

@section('breadcum')
  @include('include.breadcum', [
    'title' => 'Blog CRUD',
    'from' => 'Admin',
    'to' => 'Blog',
  ])
@endsection

@section('content')

  <div class="box-body">
    <button type="button" class="btn btn-default btn-add" data-toggle="modal" data-target="#blogModal">Add Blog</button>
  </div>
  <!-- Create Modal -->
  <div id="blogModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Create Blog</h4>
        </div>
        {!! Form::open(['method' => 'POST', 'action' => 'AdminBlogController@store', 'files'=>true]) !!}
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                {!! Form::hidden('user_id', Auth::user()->id) !!}
                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                  {!! Form::label('title', 'Title') !!}
                  {!! Form::text('title', null, ['class' => 'form-control', 'required' => 'required', 'placeholder'=>'Enter Blog Title']) !!}
                  <small class="text-danger">{{ $errors->first('title') }}</small>
                </div>
                <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                    {!! Form::label('date', 'Date') !!}
                    {!! Form::date('date', null, ['class' => 'form-control', 'required' => 'required', 'placeholder'=>'Enter Date']) !!}
                    <small class="text-danger">{{ $errors->first('date') }}</small>
                </div>
                <div class="form-group{{ $errors->has('img') ? ' has-error' : '' }}">
                  {!! Form::label('img', 'Image') !!}
                  {!! Form::file('img') !!}
                  <p class="help-block">Help block text</p>
                  <small class="text-danger">{{ $errors->first('img') }}</small>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group{{ $errors->has('dtl') ? ' has-error' : '' }}">
                  {!! Form::label('dtl', 'Detail') !!}
                  {!! Form::textarea('dtl', null, ['class' => 'form-control', 'required' => 'required', 'placeholder'=>'Enter Details']) !!}
                  <small class="text-danger">{{ $errors->first('dtl') }}</small>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <div class="btn-group pull-right">
              {!! Form::reset("Reset", ['class' => 'btn btn-default btn-yellow']) !!}
              {!! Form::submit("Add Blog", ['class' => 'btn btn-default btn-add']) !!}
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
          <th>User</th>
          <th>Title</th>
          <th>Date</th>
          <th>Details</th>
          <th>Created at</th>
          <th>updated at</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @if ($blogs)
          @php($i = 1)
          @foreach ($blogs as $blog)
            <tr>
              <td>
                {{$i}}
                @php($i++)
              </td>
              <td>{{$blog->users->name}}</td>
              <td title="{{$blog->title}}">{{str_limit($blog->title, 25)}}</td>
              <td>{{$blog->date}}</td>
              <td title="{{$blog->dtl}}">{{str_limit($blog->dtl, 45)}}</td>
              <td>{{$blog->created_at->diffForHumans()}}</td>
              <td>{{$blog->updated_at->diffForHumans()}}</td>
              <td>
                <div class="action-btns">
                  <!-- Edit Button -->
                  <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#{{$blog->id}}editModal">Edit</button>
                  <!-- Edit Modal -->
                  <div id="{{$blog->id}}editModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Edit Blog</h4>
                        </div>
                        {!! Form::model($blog, ['method' => 'PATCH', 'action' => ['AdminBlogController@update', $blog->id], 'files'=>true]) !!}
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-md-6">
                                {!! Form::hidden('user_id', Auth::user()->id) !!}
                                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                  {!! Form::label('title', 'Title') !!}
                                  {!! Form::text('title', null, ['class' => 'form-control', 'required' => 'required', 'placeholder'=>'Enter Blog Title']) !!}
                                  <small class="text-danger">{{ $errors->first('title') }}</small>
                                </div>
                                <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                                    {!! Form::label('date', 'Date') !!}
                                    {!! Form::date('date', null, ['class' => 'form-control', 'required' => 'required', 'placeholder'=>'Enter Date']) !!}
                                    <small class="text-danger">{{ $errors->first('date') }}</small>
                                </div>
                                <div class="form-group{{ $errors->has('img') ? ' has-error' : '' }}">
                                  {!! Form::label('img', 'Image') !!}
                                  {!! Form::file('img') !!}
                                  <p class="help-block">Help block text</p>
                                  <small class="text-danger">{{ $errors->first('img') }}</small>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group{{ $errors->has('dtl') ? ' has-error' : '' }}">
                                  {!! Form::label('dtl', 'Detail') !!}
                                  {!! Form::textarea('dtl', null, ['class' => 'form-control', 'required' => 'required', 'placeholder'=>'Enter Details']) !!}
                                  <small class="text-danger">{{ $errors->first('dtl') }}</small>
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
                  <!-- Delete Button -->
                  <button type="button" class="btn btn-info btn-sm btn-danger" data-toggle="modal" data-target="#{{$blog->id}}DeleteModal">Delete</button>
                  <!-- Testimonial Delete Modal -->
                  <div id="{{$blog->id}}DeleteModal" class="delete-modal modal fade" role="dialog">
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
                          {!! Form::open(['method' => 'DELETE', 'action' => ['AdminBlogController@destroy', $blog->id]]) !!}
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
