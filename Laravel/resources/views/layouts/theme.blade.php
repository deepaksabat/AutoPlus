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
<title>
  @if ($contacts)
    @foreach ($contacts as $contact)
      @for ($i=1; $i <= 1; $i++)
        {{$contact->c_name}}
      @endfor
    @endforeach
  @else
    Car Wash
  @endif
</title>
<meta charset="utf-8" />
<meta content="width=device-width, initial-scale=1.0" name="viewport" />
<meta name="description" content="Auto Plus" />
<meta name="keywords" content="car wash, html template, car wash template, auto plus, car repair, auto wash, auto detail, auto detailing, car, cleaning, mechanic, repair, wash, car service, workshop">
<meta name="author" content="Media City" />
<meta name="MobileOptimized" content="320" />
<link rel="icon" type="image/icon" href="images/favicon/favicon.ico"> <!-- favicon-icon -->
<!-- theme style -->
<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/> <!-- bootstrap css -->
<link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" type="text/css"/> <!-- fontawesome css -->
<link href="{{asset('css/icon-font.css')}}" rel="stylesheet" type="text/css"/> <!-- icon-font css -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,700|Poppins:400,500,700" rel="stylesheet"> <!-- google font -->
<link href="{{asset('css/select2.min.css')}}" rel="stylesheet" type="text/css"> <!-- Select2 -->
<link href="{{asset('css/menumaker.css')}}" rel="stylesheet" type="text/css"/> <!-- menu css -->
<link href="{{asset('css/owl.carousel.css')}}" rel="stylesheet" type="text/css"/> <!-- owl carousel css -->
<link href="{{asset('css/magnific-popup.css')}}" rel="stylesheet" type="text/css"/> <!-- magnify popup css -->
<link href="{{asset('css/datepicker.css')}}" rel="stylesheet" type="text/css"/> <!-- datepicker css -->
<link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css"/> <!-- custom css -->
<!-- end theme style -->
</head>
<!-- end head -->
<!--body start-->
<body>
<!-- preloader -->
  <div class="preloader">
    <div class="status">
      <div class="status-message">
      </div>
    </div>
  </div>
<!-- end preloader -->
<!-- session -->
@if (Session::has('added'))
  <div id="sessionModal" class="sessionmodal alert alert-success">
    <p>{{session('added')}}</p>
  </div>
@elseif (Session::has('error'))
  <div id="sessionModal" class="sessionmodal alert alert-danger">
    <p>{{session('error')}}</p>
  </div>
@endif
<!-- end session -->
<!--  top bar -->
  <div class="top-bar hidden-xs">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-sm-6">
          <div class="info-bar">
            <ul>
              @if ($contacts)
                @foreach ($contacts as $contact)
                  @for ($i=0; $i < 1; $i++)
                    <li><i class="fa fa-envelope" aria-hidden="true"></i> {{$contact->email}}</li>
                    <li>|</li>
                    <li><i class="fa fa-phone" aria-hidden="true"></i>{{$contact->mobile}}</li>
                  @endfor
                @endforeach
              @endif
            </ul>
          </div>
        </div>
        <div class="col-md-6 col-sm-6">
          <div class="top-bar-right">
            <div class="top-menu hidden-sm">
              <ul>
                @if (Route::has('login'))
                  @auth
                    <li><a href="{{url('/admin')}}"> Dashboard </a></li>
                    <li>
                      <div class="dropdown user-menu">
                        <button class="btn btn-default dropdown-toggle name" type="button" data-toggle="dropdown">{{Auth::user()->name}}<span class="caret"></span></button>
                        <ul class="dropdown-menu">
                          <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                              Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              {{ csrf_field() }}
                            </form>
                          </li>
                        </ul>
                      </div>
                    </li>
                  @else
                      <li><a href="{{ route('login') }}">Login</a></li>
                      <li><a href="{{ route('register') }}">Register</a></li>
                  @endauth
                @endif
              </ul>
            </div>
            <div class="social-icon">
              <ul>
                @if ($company_socials)
                  @foreach ($company_socials as $company_social)
                    <li><a href="{{$company_social->link}}" title="{{$company_social->social_site}}" target="_blank"><i class="fa {{$company_social->social_icon}}" aria-hidden="true"></i></a></li>
                  @endforeach
                @endif
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<!--  end top bar -->
<!--  navigation -->
  <div class="nav-bar">
    <div class="container">
      <div class="row">
        <div class="col-sm-4">
          <div class="logo">
            @if ($contacts)
              @foreach ($contacts as $contact)
                @for ($i=0; $i < 1; $i++)
                  <a href="{{url('/')}}"><img src="{{asset('images/logo')}}/{{$contact->logo}}" class="img-responsive" alt="logo"></a>
                @endfor
              @endforeach
            @endif
          </div>
        </div>
        <div class="col-sm-8">
          <div class="navigation">
            <div id="cssmenu">
              <ul>
                <li><a href="{{url('/')}}">Home</a>
                </li>
                <li><a href="#">Pages</a>
                  <ul>
                    <li><a href="{{url('/pricing_plan')}}">Pricing Plan</a></li>
                    <li><a href="{{url('/faq')}}">Faq's</a></li>
                    <li><a href="{{url('/404')}}">404 Page</a></li>
                    <li><a href="{{url('/403')}}">403</a></li>
                    <li><a href="{{url('/coming_soon')}}">Coming Soon</a></li>
                    <li><a href="{{url('/under_construction')}}">Under Construction</a></li>
                  </ul>
                </li>
                <li><a href="{{url('/gallery')}}">Gallery</a>
                </li>
                 <li><a href="{{url('/team')}}">Team</a>
                </li>
                <li><a href="{{url('/contact')}}">Contact</a>
                </li>
                @if (Route::has('login'))
                  @auth
                    <li class="hidden-md hidden-lg"><a href="{{url('/admin')}}"> Dashboard </a></li>
                    <li class="hidden-md hidden-lg">
                      <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                      </form>
                    </li>
                  @else
                    <li class="hidden-md hidden-lg"><a href="{{ route('login') }}">Login</a></li>
                    <li class="hidden-md hidden-lg"><a href="{{ route('register') }}">Register</a></li>
                  @endauth
                @endif
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<!--  end navigation -->
  @yield('inner_content')
<!--  footer -->
  <footer id="footer" class="footer-main-block">
    <div class="footer-block">
      <div class="container">
        <div class="row">
          <div class="col-md-3 col-sm-6">
            <div class="footer-about footer-widget">
              <h5 class="footer-heading">About Us</h5>
              @if ($contacts)
                @foreach ($contacts as $contact)
                  @for ($i=0; $i < 1; $i++)
                    <img src="{{asset('images/logo')}}/{{$contact->logo_two}}" class="img-responsive" alt="logo">
                  @endfor
                @endforeach
              @endif
              <p>Lorem ipsum dolor sit amet, consectetuer a dipiscing elit aenean commodo ligula eget in
              dolor aenean massa cum sociis natoque penatibus et magnis dis parturie.</p>
            </div>
          </div>
          <div class="col-md-3 col-sm-6">
            <div class="footer-services footer-widget">
              <h5 class="footer-heading">Our Services</h5>
              <ul>
                @if ($services)
                  @foreach ($services as $service)
                    <li><i class="fa fa-caret-right" aria-hidden="true"></i>{{$service->name}}</li>
                  @endforeach
                @endif
              </ul>
            </div>
          </div>
          <div class="col-md-3 col-sm-6">
            <div class="footer-opening footer-widget">
              <h5 class="footer-heading">Opening Hours</h5>
              <div class="row">
                @if ($opening_times)
                  @foreach ($opening_times as $opening_time)
                    <div class="col-xs-5">
                      <div class="opening-day">{{$opening_time->day}}</div>
                    </div>
                    <div class="col-xs-7">
                      <div class="opening-time">
                        @if ($opening_time->opening_time !== '-' ? true : false)
                          {{$opening_time->opening_time}} - {{$opening_time->closing_time}}
                        @endif
                        @if ($opening_time->opening_time == '-' ? true : false)
                         Closed
                        @endif
                      </div>
                    </div>
                  @endforeach
                @endif
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6">
            <div class="footer-subscribe footer-widget">
              <h5 class="footer-heading">Subscribe Newsletter</h5>
              <p>Lorem ipsum dolor sit amet consectetuer elit aenean commodo ligula eget dolo.</p>
              @if (env('MAILCHIMP_API_KEY') == '')
                {!! Form::open(['method' => 'POST', 'action'=>'HomePageController@mailError', 'class' => 'subscribe-form']) !!}
                  <label class="sr-only">Your Email address</label>
                  <div>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter email address">
                    <button type="submit" class="btn btn-default"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                    <small class="text-danger">{{ $errors->first('email') }}</small>
                  </div>
                {!! Form::close() !!}
              @else
                {!! Form::open(['method' => 'POST', 'action'=>'mailChimpController@subscribe', 'class' => 'subscribe-form']) !!}
                <label class="sr-only">Your Email address</label>
                <div>
                  <input type="email" class="form-control" name="email" id="email" placeholder="Enter email address">
                  <button type="submit" class="btn btn-default"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                  <small class="text-danger">{{ $errors->first('email') }}</small>
                </div>
                {!! Form::close() !!}
              @endif
              <div class="social-icon">
                <span>Follow us on:</span>
                <ul>
                  @if ($company_socials)
                    @foreach ($company_socials as $company_social)
                      <li><a href="{{$company_social->link}}" title="{{$company_social->social_site}}" target="_blank"><i class="fa {{$company_social->social_icon}}" aria-hidden="true"></i></a></li>
                    @endforeach
                  @endif
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <hr>
    <div class="copyright">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="copyright-text text-center">
              <p>&copy; Copyrights 2017 <a href="index.html">Auto Plus</a>. | All Rights Reserved.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
<!--  end footer -->
<!-- jquery -->
<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script> <!-- jquery library js -->
<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script> <!-- bootstrap js -->
<script type="text/javascript" src="{{asset('js/owl.carousel.js')}}"></script> <!-- owl carousel js -->
<script type="text/javascript" src="{{asset('js/select2.full.min.js')}}"></script> <!-- Select2 -->
<script type="text/javascript" src="{{asset('js/jquery.ajaxchimp.js')}}"></script> <!-- mail chimp js -->
<script type="text/javascript" src="{{asset('js/smooth-scroll.js')}}"></script> <!-- smooth scroll js -->
<script type="text/javascript" src="{{asset('js/jquery.magnific-popup.min.js')}}"></script> <!-- magnify popup js -->
<script type="text/javascript" src="{{asset('js/waypoints.min.js')}}"></script> <!-- facts count js required for jquery.counterup.js file -->
<script type="text/javascript" src="{{asset('js/jquery.counterup.js')}}"></script> <!-- facts count js-->
<script type="text/javascript" src="{{asset('js/menumaker.js')}}"></script> <!-- menu js-->
<script type="text/javascript" src="{{asset('js/jquery.appear.js')}}"></script> <!-- progress bar js -->
<script type="text/javascript" src="{{asset('js/jquery.countdown.js')}}"></script>  <!-- event countdown js -->
<script type="text/javascript" src="{{asset('js/price-slider.js')}}"></script> <!-- price slider / filter js-->
<script type="text/javascript" src="{{asset('js/bootstrap-datepicker.js')}}"></script> <!-- bootstrap datepicker js-->
<script type="text/javascript" src="{{asset('js/jquery.elevatezoom.js')}}"></script> <!-- image zoom js-->
<script type="text/javascript" src="{{asset('js/theme.js')}}"></script> <!-- custom js -->
<!-- end jquery -->
<script>
  $( document ).ready(function() {
    $('.sessionmodal').addClass("active");
    setTimeout(function() {
        $('.sessionmodal').removeClass("active");
   }, 4200);
  });

  //Select2
  $('.select2').select2();
</script>
</body>
<!--body end -->
</html>
