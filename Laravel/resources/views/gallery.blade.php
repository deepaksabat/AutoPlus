@extends('layouts.theme')
@section('inner_content')
<!--  page banner -->
  <div id="page-banner" class="page-banner-main" style="background-image: url('images/bg/page-banner.jpg')">
    <div class="container">
      <div class="page-banner-block">
        <div class="section">
          <h3 class="section-heading">Portfolio</h3>
        </div>
        <ol class="breadcrumb">
          <li><a href="{{url('/')}}">Home</a></li>
          <li><a href="#">Gallery</a></li>
          <li class="active"><a>Portfolio 3 Column</a></li>
        </ol>
      </div>
    </div>
  </div>
<!--  end page banner  -->
<!-- portfolio -->
  <div id="portfolio-col-three" class="portfolio-col-three-main">
    <div class="container">
      <div class="section text-center">
        <h3 class="section-heading">Working gallery</h3>
        <p class="sub-heading">Donec pede justo fringilla vel aliquet nec vulputate eget arcu enim rhoncus</p>
      </div>
      <div class="row">
        <div id="portfolio" class="work-gallery-slider">
          @if ($galleries)
            @foreach ($galleries as $gallery)
              <div class="col-md-3 col-sm-6 work-gallery-block">
                <div class="portfolio-img">
                  <img src="{{asset('images/gallery/')}}/{{$gallery->gallery_img}}" class="img-responsive" alt="gallery">
                  <div class="overlay-bg"><a href="{{asset('images/gallery/')}}/{{$gallery->gallery_img}}" title="Your Image Title"><i class="fa fa-plus"></i></a></div>
                </div>
              </div>
            @endforeach
          @endif
        </div>
      </div>
    </div>
  </div>
<!--end portfolio  -->
@endsection
