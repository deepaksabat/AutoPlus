<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Auto Plus</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="{{asset('css/datepicker.css')}}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('css/select2.min.css')}}">
  <!-- bootstrap -->
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/fontawesome-iconpicker.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('css/AdminLTE.css')}}">
  <!-- icon-font css -->
  <link rel="stylesheet" href="{{asset('css/icon-font.css')}}"/>
  <link rel="stylesheet" href="{{asset('css/skin-blue.css')}}">
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body class="login-register-page">
  <!-- login main block -->
  <div class="login-main-block">
    @yield('content')
  </div>
  <!-- end login main block -->
<!-- Scripts -->
<script src="{{asset('js/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('js/select2.full.min.js')}}"></script>
<!-- bootstrap datepicker -->
<script src="{{asset('js/bootstrap-datepicker.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('js/adminlte.js')}}"></script>
<script src="{{asset('js/fontawesome-iconpicker.min.js')}}"></script>
<script src="{{asset('js/theme.js')}}"></script>
</body>
</html>
