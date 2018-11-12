@extends('layouts.theme')
@section('inner_content')
<!--  page banner -->
  <div id="page-banner" class="page-banner-main" style="background-image: url('images/bg/page-banner.jpg')">
    <div class="container">
      <div class="page-banner-block">
        <div class="section">
          <h3 class="section-heading">403 Page</h3>
        </div>
        <ol class="breadcrumb">
          <li><a href="{{url('/')}}">Home</a></li>
          <li><a href="#">Page</a></li>
          <li class="active"><a>403 Page</a></li>
        </ol>
      </div>
    </div>
  </div>
<!--  end page banner  -->
<!-- error block -->
  <div id="error-page" class="error-page-main text-center">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="error-dtl">
            <h1 class="error-heading">4<span>0</span>3</h1>
            <p>Please go back to home and try to find out once again.</p>
            <div class="error-btn">
              <a href="index.html" class="btn btn-default">Go to Home</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- end error block -->
@endsection
