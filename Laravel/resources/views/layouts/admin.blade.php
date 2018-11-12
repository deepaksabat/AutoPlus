<!DOCTYPE html>
<!--
**********************************************************************************************************
    Copyright (c) 2017 .
**********************************************************************************************************  -->
<!--
Template Name: Auto Plus – Laravel Car Wash Booking
Version: 1.0.0
Author: Media City
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]> -->
<html lang="en">
<!-- <![endif]-->
<!-- head -->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Auto Plus</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- bootstrap -->
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="{{asset('css/datepicker.css')}}">
  <!-- Time Picker -->
  <link rel="stylesheet" href="{{asset('css/bootstrap-timepicker.min.css')}}">
  <!-- Dropzone -->
  <link rel="stylesheet" href="{{asset('css/dropzone.css')}}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('css/select2.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/fontawesome-iconpicker.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('css/AdminLTE.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('css/ionicons.min.css')}}">
  <!-- icon-font css -->
  <link rel="stylesheet" href="{{asset('css/icon-font.css')}}"/>
  <link rel="stylesheet" href="{{asset('css/skin-blue.css')}}">
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body class="skin-blue">
@if (Auth::check())
<div class="wrapper">
  <!-- Main Header -->
  <header class="main-header">
    <!-- Logo -->
    <a href="{{url('/')}}" class="logo">
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">Auto Plus</span>
    </a>
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account Menu -->
          <li>
            <a href="{{url('/')}}" class="btn btn-default btn-add"><i class="fa fa-eye" aria-hidden="true"></i> Visit Site</a>
          </li>
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="{{asset('images/users')}}/{{ Auth::user()->photo}}" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="{{asset('images/users')}}/{{Auth::user()->photo}}" class="img-circle" alt="User Image">
                <p>
                  {{Auth::user()->name}} - @if (Auth::user()->role == 'A') Administrator @else Subscriber @endif
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{url('/admin/profile')}}" class="btn btn-yellow btn-default">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-default btn-add">Sign out</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                  </form>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('images/users/')}}/{{Auth::user()->photo}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{Auth::user()->name}}</p>
          <i class="fa fa-circle text-success"></i> Online
        </div>
      </div>
      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN SECTIONS</li>
        @yield('sidebar_active')
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

      @yield('breadcum')

    </section>

    <!-- Main content -->
    <section class="content crud-content container-fluid">
      @if (Session::has('added'))
        <div id="sessionModal" class="sessionmodal alert alert-success">
          <p>{{session('added')}}</p>
        </div>
      @elseif (Session::has('updated'))
        <div id="sessionModal" class="sessionmodal alert alert-info">
          <p>{{session('updated')}}</p>
        </div>
      @elseif (Session::has('deleted'))
        <div id="sessionModal" class="sessionmodal alert alert-danger">
          <p class="danger">{{session('deleted')}}</p>
        </div>
      @endif
      @yield('dashboard')
      <div class="box box-primary">

        @yield('content')

      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Auto Plus
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2017 <a href="#">Media City</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- Scripts -->
<script src="{{asset('js/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('js/select2.full.min.js')}}"></script>
<!-- bootstrap datepicker -->
<script src="{{asset('js/bootstrap-datepicker.js')}}"></script>
<!-- Time Picker -->
<script src="{{asset('js/bootstrap-timepicker.min.js')}}"></script>
<!-- Drop Zone -->
<script src="{{asset('js/dropzone.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('js/adminlte.js')}}"></script>
<script src="{{asset('js/fontawesome-iconpicker.min.js')}}"></script>
<script>
$(function () {
   // Session Popup
   $( document ).ready(function() {
     $('.sessionmodal').addClass("active");
     setTimeout(function() {
         $('.sessionmodal').removeClass("active");
    }, 4000);
   });

   //Select2
   $('.select2').select2();

   //Date picker
   $('.date-pick').datepicker({
     autoclose: true,
   });

   //Timepicker
    $('.timepicker').timepicker({
      showInputs: false,
    });

   // Icon Picker
   $('.icon-picker').iconpicker({
     title: 'Icon Piker',
     selectedCustomClass: 'label label-primary',
     mustAccept: true,
     placement: 'bottomLeft',
     showFooter: false,
     hideOnSelect: true,
   });

   $('.social-icon-picker').iconpicker({
     title: 'Social Icons',
     icons: ['fa-facebook', 'fa-instagram', 'fa-twitter', 'fa-google-plus', 'fa-google', 'fa-pinterest', 'fa-youtube', 'fa-tumblr', 'fa-dribbble', 'fa-flickr', 'fa-github', 'fa-github-alt', 'fa-linkedin', 'fa-skype', 'fa-youtube-play'],
     selectedCustomClass: 'label label-primary',
     mustAccept: false,
     placement: 'topRight',
     showFooter: false,
     hideOnSelect: true,
   });

   $('.social-icon-picker-left').iconpicker({
     title: 'Social Icons',
     icons: ['fa-facebook', 'fa-instagram', 'fa-twitter', 'fa-google-plus', 'fa-google', 'fa-pinterest', 'fa-youtube', 'fa-tumblr', 'fa-dribbble', 'fa-flickr', 'fa-github', 'fa-github-alt', 'fa-linkedin', 'fa-skype', 'fa-youtube-play'],
     selectedCustomClass: 'label label-primary',
     mustAccept: false,
     placement: 'bottomRight',
     showFooter: false,
     hideOnSelect: true,
   });

   $('.iconpicker-custom').iconpicker({
     title: 'Vehicle Icons',
     icons: ['icon-1', 'icon-2', 'icon-3', 'icon-4', 'icon-5', 'icon-6', 'fa-car', 'fa-truck'],
     selectedCustomClass: 'label label-primary',
     mustAccept: false,
     placement: 'bottomLeft',
     showFooter: false,
     hideOnSelect: true,
   });

   //Dropzone
   Dropzone.options.galleryDropzone = {
     paramName: "gallery_img",
     maxFilesize: 2, // MB
     acceptedFiles: ".jpeg,.jpg,.png,.gif",
  };
});
</script>
@endif
</body>
</html>
