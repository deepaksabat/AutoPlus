@extends('layouts.theme')
@section('inner_content')
<!--  page banner -->
  <div id="page-banner" class="page-banner-main" style="background-image: url('images/bg/page-banner.jpg')">
    <div class="container">
      <div class="page-banner-block">
        <div class="section">
          <h3 class="section-heading">Pricing Plan</h3>
        </div>
        <ol class="breadcrumb">
          <li><a href="{{url('/')}}">Home</a></li>
          <li><a href="#">Page</a></li>
          <li class="active"><a>Pricing Plan</a></li>
        </ol>
      </div>
    </div>
  </div>
<!--  end page banner  -->
<!--  plans -->
  <div id="pricing-plan" class="pricing-plan-main-block">
    <div class="container">
      <div class="section text-center">
        <h3 class="section-heading">Washing Plans</h3>
        <p class="sub-heading">Phasellus ullamcorper ipsum rutrum nunc nunc nonummy metus vestibulum</p>
      </div>
      <div class="pricing-plan-tab">
        <ul class="nav nav-tabs" role="tablist">
          @foreach ($vehicle_types as $count => $vehicle_type)
            @if ($vehicle_type->washing_price->vehicle_type_id == $vehicle_type->id)
              <li role="presentation" @if ($count == 0) class="active" @endif><a href="#plan-{{$vehicle_type->id}}" aria-controls="plan-{{$vehicle_type->id}}" role="tab" data-toggle="tab"><span><i class="{{$vehicle_type->icon}}"></i></span>{{$vehicle_type->type}}</a></li>
            @endif
          @endforeach
        </ul>
      </div>
      <!-- Tab panes -->
      <div class="tab-content">
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
      </div>
    </div>
  </div>
<!-- end pricing plan -->
@endsection
