@if (Auth::user()->role == 'A')
  <li><a href="{{url('/admin')}}"><i class="fa fa-dashboard" aria-hidden="true"></i> <span>Dashboard</span></li>
  <li class="treeview {{$users}}">
    <i class="fa fa-user"></i> <span>Users</span>
    <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
    <ul class="treeview-menu">
      <li class="{{$all_user}}"><a href="{{route('users.index')}}"><i class="fa fa-circle-o"></i>All Users</a></li>
      <li class="{{$create_user}}"><a href="{{route('users.create')}}"><i class="fa fa-circle-o"></i>Create User</a></li>
    </ul>
  </li>
  <li class="treeview {{$teams}}">
    <a href="#"><i class="fa fa-users" aria-hidden="true"></i> <span>Team</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li class="{{$all_team}}"><a href="{{route('team.index')}}"><i class="fa fa-circle-o"></i>All Team Members</a></li>
      <li class="{{$create_team}}"><a href="{{route('team.create')}}"><i class="fa fa-circle-o"></i>Create Team Member</a></li>
      <li class="{{$team_task}}"><a href="{{route('team_task.index')}}"><i class="fa fa-circle-o"></i>Team Task</a></li>
    </ul>
  </li>
  <li class="treeview {{$plan}}">
    <a href="#"><i class="fa fa-bar-chart" aria-hidden="true"></i> <span>Washing Plan</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li class="{{$all_plan}}"><a href="{{route('washing_plan.index')}}"><i class="fa fa-circle-o"></i>Washing Plan</a></li>
      <li class="{{$plan_price}}"><a href="{{route('washing_price.index')}}"><i class="fa fa-circle-o"></i>Washing Plan Price</a></li>
    </ul>
  </li>
  <li class="treeview {{$vehicle}}">
    <a href="#"><i class="fa fa-car"></i> <span>Vehical</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li class="{{$vehicle_company}}"><a href="{{route('vehicle_company.index')}}"><i class="fa fa-circle-o"></i>Vehicle Company</a></li>
      <li class="{{$vehicle_modal}}"><a href="{{route('vehicle_modal.index')}}"><i class="fa fa-circle-o"></i>Vehicle Model</a></li>
      <li class="{{$vehicle_type}}"><a href="{{route('vehicle_type.index')}}"><i class="fa fa-circle-o"></i>Vehicle Type</a></li>
    </ul>
  </li>
  <li class="treeview {{$appointments}}">
    <a href="#"><i class="fa fa-calendar"></i> <span>Appointment</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li class="{{$appointment}}"><a href="{{route('appointment.index')}}"><i class="fa fa-circle-o"></i>Appointment</a></li>
      <li class="{{$payment}}"><a href="{{route('payment.index')}}"><i class="fa fa-circle-o"></i>Payment</a></li>
      <li class="{{$payment_mode}}"><a href="{{route('payment_mode.index')}}"><i class="fa fa-circle-o"></i>Payment Mode</a></li>
      <li class="{{$status}}"><a href="{{route('status.index')}}"><i class="fa fa-circle-o"></i>Status</a></li>
    </ul>
  </li>
  <li class="treeview {{$settings}}">
    <a href="#"><i class="fa fa-gear"></i> <span>Home Sections</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li class="{{$services}}"><a href="{{route('services.index')}}"><i class="fa fa-circle-o"></i>Services</a></li>
      <li class="{{$gallery}}"><a href="{{route('gallery.index')}}"><i class="fa fa-circle-o"></i>Gallery</a></li>
      <li class="{{$facts}}"><a href="{{route('facts.index')}}"><i class="fa fa-circle-o"></i>Facts</a></li>
      <li class="{{$testimonial}}"><a href="{{route('testimonial.index')}}"><i class="fa fa-circle-o"></i>Testimonial</a></li>
      <li class="{{$blog}}"><a href="{{route('blog.index')}}"><i class="fa fa-circle-o"></i>Blog</a></li>
      <li class="{{$clients}}"><a href="{{route('clients.index')}}"><i class="fa fa-circle-o"></i>Clients</a></li>
      <li class="{{$opening_hours}}"><a href="{{route('opening_hours.index')}}"><i class="fa fa-circle-o"></i>Opening Hours</a></li>
      <li class="{{$company_social}}"><a href="{{route('company_social.index')}}"><i class="fa fa-circle-o"></i>Company Social</a></li>
      <li><a href="{{route('contact.index')}}"><i class="fa fa-circle-o"></i>Contact</a></li>
    </ul>
  </li>
@endif
@if (Auth::user()->role == 'S')
  <li class="{{$profile}}"><a href="{{url('/admin/profile')}}"><i class="fa fa-id-badge" aria-hidden="true"></i> <span>Profile</span></li>
  <li class="{{$sub_appointment}}"><a href="{{route('appointment.index')}}"><i class="fa fa-calendar"></i> <span>Appointment</span></li>
@endif
<li><a href="#"><i class="fa fa-lightbulb-o" aria-hidden="true"></i> <span>Help</span></li>
