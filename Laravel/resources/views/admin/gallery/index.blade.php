@extends('layouts.admin')

@section('sidebar_active')
  @include('include.sidebar_links', [
    'users' => '', 'all_user' => '', 'create_user' => '',
    'teams' => '', 'all_team' => '', 'create_team' => '', 'team_task' => '',
    'plan' => '', 'all_plan' => '', 'plan_price' => '',
    'vehicle' => '', 'vehicle_company' => '', 'vehicle_modal' => '', 'vehicle_type' => '',
    'appointments' => '', 'appointment' => '', 'payment' => '', 'payment_mode' => '', 'currency' => '', 'status' => '',
    'settings' => 'active', 'services' => '', 'gallery' => 'active', 'facts' => '', 'testimonial' => '', 'blog' => '', 'clients' => '', 'opening_hours' => '', 'company_social' => '',
    'profile' => '', 'sub_appointment' => '',
  ])
@endsection

@section('breadcum')
  @include('include.breadcum', [
    'title' => 'Galleries',
    'from' => 'Admin',
    'to' => 'Gallery',
  ])
@endsection

@section('content')
  <div id="dropzone" class="box-body">
    {!! Form::open(['id'=>'gallery-dropzone', 'method' => 'POST', 'action'=>'AdminGalleryController@store', 'class' => 'dropzone', 'files'=>true]) !!}
    {!! Form::close() !!}
    <p>Upload File: jpg, jpeg, png</p>
  </div>
  <div class="box-body">
    <div class="admin-gallery-main-block box-body">
      <div class="row">
        @if ($galleries)
          @foreach ($galleries as $gallery)
            <div class="col-md-2">
              <div class="admin-gallery-block">
                <img src="{{asset('images/gallery')}}/{{$gallery->gallery_img}}" class="img-responsive" alt="gallery-img">
                <div class="overlay-bg"></div>
                <div class="gallery-actions-block">
                  <div class="gallery-actions-btns">
                    <button type="button" data-toggle="modal" data-target="#{{$gallery->id}}galleryEditModal" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i></button>
                    <button type="button" data-toggle="modal" data-target="#{{$gallery->id}}galleryDeleteModal" title="Delete"><i class="fa fa-remove" aria-hidden="true"></i></button>
                  </div>
                </div>
                <!-- Gallery Update Modal -->
                <div id="{{$gallery->id}}galleryEditModal" class="modal fade" role="dialog">
                  <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Change Image</h4>
                      </div>
                      {!! Form::model($gallery, ['method' => 'PATCH', 'action' => ['AdminGalleryController@update', $gallery->id], 'files' => true]) !!}
                        <div class="modal-body">
                          <div class="form-group{{ $errors->has('gallery_img') ? ' has-error' : '' }}">
                            {!! Form::label('gallery_img', 'Gallery Image') !!}
                            {!! Form::file('gallery_img', ['required' => 'required']) !!}
                            <p class="help-block">Help block text</p>
                            <small class="text-danger">{{ $errors->first('gallery_img') }}</small>
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
                <!-- Gallery Delete Modal -->
                <div id="{{$gallery->id}}galleryDeleteModal" class="delete-modal modal fade" role="dialog">
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
                        {!! Form::open(['method' => 'DELETE', 'action' => ['AdminGalleryController@destroy', $gallery->id]]) !!}
                            {!! Form::reset("No", ['class' => 'btn btn-gray', 'data-dismiss'=>'modal']) !!}
                            {!! Form::submit("Yes", ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        @endif
      </div>
    </div>
  </div>
@endsection
