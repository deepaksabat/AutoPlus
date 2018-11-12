@extends('layouts.theme')
@section('inner_content')
<!--  page banner -->
  <div id="page-banner" class="page-banner-main" style="background-image: url('images/bg/page-banner.jpg')">
    <div class="container">
      <div class="page-banner-block">
        <div class="section">
          <h3 class="section-heading">Team</h3>
        </div>
        <ol class="breadcrumb">
          <li><a href="{{url('/')}}">Home</a></li>
          <li><a href="#">Team</a></li>
          <li class="active"><a>Team</a></li>
        </ol>
      </div>
    </div>
  </div>
<!--  end page banner  -->
<!--  team -->
  <div id="team" class="team-main-block">
    <div class="container">
      <div class="section text-center">
        <h3 class="section-heading">Our Awesome Team</h3>
        <p class="sub-heading">Nullam dictum felis eu pede mollis pretium integer tincidunt cras dapibus</p>
      </div>
      <div class="row">
        @if ($teams)
          @foreach ($teams as $team)
            <div class="col-md-3 col-sm-6">
              <div class="team-block text-center">
                <div class="team-img">
                  <a href="#"><img src="{{asset('images/teams')}}/{{$team->photo}}" class="img-responsive" alt="team">
                  <div class="overlay-bg"></div></a>
                </div>
                <div class="team-dtl">
                  <a href="team-details.html"><h6 class="team-heading">{{$team->name}}</h6></a>
                  <div class="team-post">{{$team->post}}</div>
                  <div class="team-social">
                    <ul>
                      @foreach ($socials as $social)
                        @if($social->team_id == $team->id)
                          <li><a href="{{$social->url}}" title="{{$social->social}}" target="_blank"><i class="fa {{$social->social_icon}}"></i></a></li>
                        @endif
                      @endforeach
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        @endif
      </div>
    </div>
  </div>
<!--  end team -->
@endsection
