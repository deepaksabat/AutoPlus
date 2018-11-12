@extends('layouts.theme')
<!-- inner content -->
  @section('inner_content')
    @if (Session::has('appointment_added'))
      <div id="sessionModal" class="sessionmodal appointment-session alert alert-success">
        <p>{{session('appointment_added')}}</p>
      </div>
    @endif
    <div id="home-slider" class="home-slider">
      <div class="item home-slider-bg" style="background-image: url('images/slider-1.jpg')">
        <div class="container">
          <div class="slider-dtl">
            <h4 class="slider-sub-heading">We Care</h4>
            <h1 class="slider-heading">For Your Car</h1>
            <p>Nam pretium turpis et arcu duis arcu tortor suscipit eget impe nec imperdiet iaculis ipsum sed aliquam ultrices mauris ante arcu accumsan a consectetuer eget posuere.</p>
            <div class="slider-btn">
              <a href="#" class="btn btn-orange">Read More</a>
              <a href="#" class="btn btn-default">Contact Us</a>
            </div>
          </div>
        </div>
      </div>
      <div class="item home-slider-bg" style="background-image: url('images/slider-2.jpg')">
        <div class="container">
          <div class="slider-dtl">
            <h4 class="slider-sub-heading">We Care</h4>
            <h1 class="slider-heading">For Your Car</h1>
            <p>Nam pretium turpis et arcu duis arcu tortor suscipit eget impe nec imperdiet iaculis ipsum sed aliquam ultrices mauris ante arcu accumsan a consectetuer eget posuere.</p>
            <div class="slider-btn">
              <a href="#" class="btn btn-orange">Read More</a>
              <a href="#" class="btn btn-default">Contact Us</a>
            </div>
          </div>
        </div>
      </div>
      <div class="item home-slider-bg" style="background-image: url('images/slider-3.jpg')">
        <div class="container">
          <div class="slider-dtl">
            <h4 class="slider-sub-heading">We Care</h4>
            <h1 class="slider-heading">For Your Car</h1>
            <p>Nam pretium turpis et arcu duis arcu tortor suscipit eget impe nec imperdiet iaculis ipsum sed aliquam ultrices mauris ante arcu accumsan a consectetuer eget posuere.</p>
            <div class="slider-btn">
              <a href="#" class="btn btn-orange">Read More</a>
              <a href="#" class="btn btn-default">Contact Us</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  <!--  end slider -->
  <!--  who we are -->
    <div id ="who-we-are" class="who-we-are-main-block">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <div class="section">
              <h3 class="section-heading">Who We Are?</h3>
              <p>Lorem ipsum dolor sit amet consectetuer adipiscing elit aenean commodo ligula eget dolor aenean mas cum soc iis natoque penatibus et magnis dis parturient montes nascetur ridiculus mus donec quam felis ultricies nec pellentesque eu pretium quis sem nulla consequat massa quis enim.</p>
            </div>
            <div class="row who-we-are-points">
              <div class="col-sm-6">
                <div class="who-we-are-block">
                  <div class="who-we-are-icon">
                    <i class="icon-1" aria-hidden="true"></i>
                  </div>
                  <div class="who-we-are-dtl">
                    <h5 class="who-we-are-heading">Donec Pede Fringilla</h5>
                    <p>Nullam dictum felis eu pede mollis preti integer tincidunt cras dapibus vivam elementum semper nisi.</p>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="who-we-are-block">
                  <div class="who-we-are-icon">
                    <i class="icon-2" aria-hidden="true"></i>
                  </div>
                  <div class="who-we-are-dtl">
                    <h5 class="who-we-are-heading">Donec Pede Fringilla</h5>
                    <p>Nullam dictum felis eu pede mollis preti integer tincidunt cras dapibus vivam elementum semper nisi.</p>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="who-we-are-block">
                  <div class="who-we-are-icon">
                    <i class="icon-3" aria-hidden="true"></i>
                  </div>
                  <div class="who-we-are-dtl">
                    <h5 class="who-we-are-heading">Donec Pede Fringilla</h5>
                    <p>Nullam dictum felis eu pede mollis preti integer tincidunt cras dapibus vivam elementum semper nisi.</p>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="who-we-are-block">
                  <div class="who-we-are-icon">
                    <i class="icon-8" aria-hidden="true"></i>
                  </div>
                  <div class="who-we-are-dtl">
                    <h5 class="who-we-are-heading">Donec Pede Fringilla</h5>
                    <p>Nullam dictum felis eu pede mollis preti integer tincidunt cras dapibus vivam elementum semper nisi.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 hidden-sm">
            <div class="who-we-are-img">
              <img src="images/who-we-are.jpg" class="img-responsive" alt="who-we-are">
            </div>
          </div>
        </div>
      </div>
    </div>
  <!--  end who we are -->
  <!--  services -->
    <div id="services" class="services-main-block">
      <div class="container">
        <div class="section text-center">
          <h3 class="section-heading">Our Services</h3>
          <p class="sub-heading">Sollicitudin urna dolor sagittis lacus donec elit libero sodales nec</p>
        </div>
        <div class="row">
          @if ($services)
            @foreach ($services as $service)
              <div class="col-md-3 col-sm-6">
                <div class="service-block text-center">
                  <div class="service-icon">
                    <a href="#"><img src="{{asset('images/services')}}/{{$service->icon}}" class="img-responsive" alt="service-01"></a>
                  </div>
                  <div class="service-dtl">
                    <a href="#"><h5 class="service-heading">{{$service->name}}</h5></a>
                    <p>{{$service->description}}</p>
                  </div>
                </div>
              </div>
            @endforeach
          @endif
        </div>
      </div>
    </div>
  <!--  end services -->
  <!--  gallery -->
    <div id="work-gallery" class="work-gallery-main-block">
      <div class="parallax" style="background-image: url('images/bg/work-gallery-bg.jpg')">
      <div class="overlay-bg"></div>
        <div class="container">
          <div class="section text-center">
            <h3 class="section-heading">Working gallery</h3>
            <p class="sub-heading">Donec pede justo fringilla vel aliquet nec vulputate eget arcu enim rhoncus</p>
          </div>
          <div id="work-gallery-slider" class="work-gallery-slider">
            @if ($galleries)
              @foreach ($galleries as $gallery)
                <div class="item work-gallery-block">
                  <img src="{{asset('images/gallery')}}/{{$gallery->gallery_img}}" class="img-responsive" alt="gallery">
                  <div class="overlay-bg"><a href="{{asset('images/gallery')}}/{{$gallery->gallery_img}}" title="Your Image Title"><i class="fa fa-plus"></i></a></div>
                </div>
              @endforeach
            @endif
          </div>
        </div>
      </div>
    </div>
  <!--  end gallery -->
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
              @if ($team->status == 'A' ? true : false)
                <div class="col-md-3 col-sm-6">
                  <div class="team-block text-center">
                    <div class="team-img">
                      <a href="#"><img src="{{asset('images/teams')}}/{{$team->photo}}" class="img-responsive" alt="team">
                      <div class="overlay-bg"></div></a>
                    </div>
                    <div class="team-dtl">
                      <a href="#"><h6 class="team-heading">{{$team->name}}</h6></a>
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
              @endif
            @endforeach
          @endif
        </div>
      </div>
    </div>
  <!--  end team -->
  <!--  facts -->
    <div id="facts" class="facts-main-block">
      <div class="parallax" style="background-image: url('images/bg/facts-bg.jpg')">
      <div class="overlay-bg"></div>
        <div class="container">
          <div class="row">
            @if ($facts)
              @foreach ($facts as $fact)
                <div class="col-md-3 col-sm-6">
                  <div class="facts-block text-center">
                    <div class="facts-icon">
                      <i class="fa {{$fact->icon}}" aria-hidden="true"></i>
                    </div>
                    <h2 class="facts-number counter">{{$fact->number}}</h2>
                    <div class="facts-text">{{$fact->detail}}</div>
                  </div>
                </div>
              @endforeach
            @endif
          </div>
        </div>
      </div>
    </div>
  <!--  end facts -->
  <!--  plans -->
    <div id="pricing-plan" class="pricing-plan-main-block">
      <div class="container">
        <div class="section text-center">
          <h3 class="section-heading">Washing Plans</h3>
          <p class="sub-heading">Phasellus ullamcorper ipsum rutrum nunc nunc nonummy metus vestibulum</p>
        </div>
        <div class="pricing-plan-tab">
          <ul class="nav nav-tabs" role="tablist">
            @if ($vehicle_types)
              @foreach ($vehicle_types as $count => $vehicle_type)
                @if ($vehicle_type->washing_price->vehicle_type_id == $vehicle_type->id)
                  <li role="presentation" @if ($count == 0) class="active" @endif><a href="#plan-{{$vehicle_type->id}}" aria-controls="plan-{{$vehicle_type->id}}" role="tab" data-toggle="tab"><span><i class="fa {{$vehicle_type->icon}}"></i></span>{{$vehicle_type->type}}</a></li>
                @endif
              @endforeach
            @endif
          </ul>
        </div>
        <!-- Tab panes -->
        <div class="tab-content">
          @if ($washing_prices)
            @for ($i=1; $i <= 6; $i++)
              @if ($i == 1)
                <div role="tabpanel" class="tab-pane active" id="plan-{{$i}}">
              @else
                <div role="tabpanel" class="tab-pane" id="plan-{{$i}}">
              @endif
                <div class="row">
                  @foreach ($washing_prices as $washing_price)
                    @for ($k=1; $k <= 4; $k++)
                      @if ($washing_price->washing_plan_id == $k && $washing_price->vehicle_type_id == $i)
                        <div class="col-md-3 col-sm-6">
                          <div class="pricing-block text-center">
                            <h6 class="pricing-heding">{{$washing_price->washing_plan->name}}</h6>
                            <div class="pricing-price-block">
                              <h2 class="pricing-price">
                                  {{$washing_price->price}}
                              </h2>
                              <div class="pricing-duration">{{$washing_price->duration}}</div>
                            </div>
                            <div class="pricing-dtl">
                              <ul>
                                @foreach ($washing_includes as $washing_include)
                                  @if ($washing_include->washing_plan_id == $washing_price->washing_plan_id)
                                    <li>{{$washing_include->washing_plan_include}}</li>
                                  @endif
                                @endforeach
                              </ul>
                              <a href="#" class="btn btn-default">Book Now</a>
                            </div>
                          </div>
                        </div>
                      @endif
                    @endfor
                  @endforeach
                </div>
              </div>
            @endfor
          @endif
        </div>
      </div>
    </div>
  <!--  end plans -->
  <!--  testimonials -->
    <div id="testimonials" class="testimonials-main-block">
      <div class="parallax" style="background-image: url('images/bg/testimonials-bg.jpg')">
      <div class="overlay-bg"></div>
        <div class="container">
          <div class="section text-center">
            <h3 class="section-heading">Testimonials</h3>
          </div>
          <div id="testimonials-slider" class="testimonials-slider">
            @if ($testimonials)
              @foreach ($testimonials as $testimonial)
                <div class="item testimonials-block">
                  <div class="testimonials-dtl text-center">
                    <p>{{$testimonial->detail}}</p>
                  </div>
                  <div class="testimonials-client">
                    <div class="testimonials-client-img">
                      <img src="{{asset('images/testimonial')}}/{{$testimonial->image}}" class="img-responsive" alt="client-01">
                    </div>
                    <div class="testimonials-client-dtl">
                      <h6 class="client-name">{{$testimonial->name}}</h6>
                      <div class="client-since">{{$testimonial->post}}</div>
                    </div>
                  </div>
                </div>
              @endforeach
            @endif
          </div>
        </div>
      </div>
    </div>
  <!--  end testimonials -->
  <!--  appointment -->
    <div id="appointment" class="appointment-main-block">
      <div class="container">
        <div class="row">
          <div class="col-md-4 hidden-sm">
            <div class="appointment-img">
              <img src="images/appointment.jpg" class="img-responsive" alt="Appointment">
            </div>
          </div>
          <div class="col-md-8 col-sm-12">
            <div class="appointment-block">
              <h3 class="section-heading">Get an Appointment</h3>
              <p class="sub-heading">Etiam imperdiet imperdiet orci nunc nec neque phasellus leo dolor tempus non auctor.</p>
              {!! Form::open(['method' => 'POST', 'action' => 'HomePageController@store', 'class' => 'appointment-form']) !!}
                <h5 class="form-heading-title"><span class="form-heading-no">1.</span>Vehicle Information</h5>
                <div class="row">
                  <div class="col-sm-6">
                    @if (Auth::check())
                      {!! Form::hidden('user_id', Auth::user()->id) !!}
                    @endif
                    <div class="form-group{{ $errors->has('washing_plan_id') ? ' has-error' : '' }}">
                        {!! Form::select('washing_plan_id', array(''=>'Choose Washing Plan') + $washing_plan_lists, null, ['class' => 'form-control select2', 'required' => 'required']) !!}
                        <small class="text-danger">{{ $errors->first('washing_plan_id') }}</small>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group{{ $errors->has('vehicle_company_id') ? ' has-error' : '' }}">
                        {!! Form::select('vehicle_company_id', array(''=>'Choose Vehicle Company') + $vehicle_company_lists, null, ['class' => 'form-control select2', 'required' => 'required']) !!}
                        <small class="text-danger">{{ $errors->first('vehicle_company_id') }}</small>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group{{ $errors->has('vehicle_modal_id') ? ' has-error' : '' }}">
                      {!! Form::select('vehicle_modal_id', array('' =>'Choose Vehicle Modal') + $vehicle_modal_lists , null, ['class' => 'form-control select2', 'required' => 'required']) !!}
                      <small class="text-danger">{{ $errors->first('vehicle_modal_id') }}</small>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group{{ $errors->has('vehicle_types_id') ? ' has-error' : '' }}">
                        {!! Form::select('vehicle_types_id', array(''=>'Choose Vehicle Type') + $vehicle_type_lists, null, ['class' => 'form-control select2', 'required' => 'required']) !!}
                        <small class="text-danger">{{ $errors->first('vehicle_types_id') }}</small>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <h5 class="form-heading-title"><span class="form-heading-no">2.</span>Appointment Information</h5>
                  <div class="col-sm-6">
                    <div class="form-group{{ $errors->has('appointment_date') ? ' has-error' : '' }}">
                        {!! Form::text('appointment_date', null, ['class' => 'form-control date-pick', 'required' => 'required', 'placeholder' => 'Appointment Date']) !!}
                        <small class="text-danger">{{ $errors->first('appointment_date') }}</small>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group{{ $errors->has('time_frame') ? ' has-error' : '' }}">
                        {!! Form::select('time_frame', array(''=>'Choose Time Frame', 'morning'=>'Morning', 'evening'=>'Evening', 'afternoon'=>'Afternoon'), null, ['class' => 'form-control select2', 'required' => 'required']) !!}
                        <small class="text-danger">{{ $errors->first('time_frame') }}</small>
                    </div>
                  </div>
                </div>
                @if (!Auth::check())
                  <h5 class="form-heading-title"><span class="form-heading-no">3.</span>Contact Details</h5>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                          {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required', 'placeholder'=>'Enter Your Name']) !!}
                          <small class="text-danger">{{ $errors->first('name') }}</small>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                          {!! Form::email('email', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'eg: foo@bar.com']) !!}
                          <small class="text-danger">{{ $errors->first('email') }}</small>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                          {!! Form::password('password', ['class' => 'form-control', 'required' => 'required', 'placeholder'=>'Enter Your Password']) !!}
                          <small class="text-danger">{{ $errors->first('password') }}</small>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                          {!! Form::text('mobile', null, ['class' => 'form-control', 'required' => 'required', 'placeholder'=>'Enter Mobile No.']) !!}
                          <small class="text-danger">{{ $errors->first('mobile') }}</small>
                      </div>
                      {!! Form::hidden('sex', '-') !!}
                      {!! Form::hidden('dob', Carbon\Carbon::now()) !!}
                    </div>
                  </div>
                @endif
                <div class="pull-right">
                  {!! Form::submit("Book Now", ['class' => 'btn btn-default pull-right']) !!}
                </div>
              {!! Form::close() !!}
            </div>
          </div>
        </div>
      </div>
    </div>
  <!--  end appointment -->
  <!--  latest news -->
    <div id="news" class="news-main-block">
      <div class="container">
        <div class="section text-center">
          <h3 class="section-heading">Latest News</h3>
          <p class="sub-heading">Phasellus ullamcorper ipsum rutrum nunc nunc nonummy metus vestibulum</p>
        </div>
        <div class="row">
          @if ($blogs)
            @foreach ($blogs as $blog)
              <div class="col-md-4 col-sm-6">
                <div class="news-block">
                  <div class="news-img">
                    <a href="#"><img src="{{asset('images/blog')}}/{{$blog->img}}" class="img-responsive" alt="news">
                      <div class="overlay-bg"></div>
                    </a>
                  </div>
                  <div class="news-top">
                    <div class="news-date text-center">
                      <h4 class="news-day">{{$blog->date->toFormattedDateString()}}</h4>
                    </div>
                    <div class="news-heading-block">
                      <a href="#"><h6 class="news-heading">{{$blog->title}}</h6></a>
                      <ul class="news-tag">
                        <li><i class="fa fa-user" aria-hidden="true"></i> <a href="#">{{$blog->users->name}}</a></li>
                      </ul>
                    </div>
                  </div>
                  <div class="news-dtl">
                    <p>{{$blog->dtl}}</p>
                  </div>
                </div>
              </div>
            @endforeach
          @endif
        </div>
      </div>
    </div>
  <!--  end latest news -->
  <!--  clients -->
    <div id="clients" class="clients-main-block">
      <div class="container">
        <div id="client-slider" class="client-slider">
          @if ($clients)
            @foreach ($clients as $client)
              <div class="item client-img">
                <img src="{{asset('images/clients')}}/{{$client->image}}" class="img-responsive" alt="client-1">
              </div>
            @endforeach
          @endif
        </div>
      </div>
    </div>
  <!--  end clients -->
  @endsection
