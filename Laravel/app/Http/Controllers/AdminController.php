<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Team;
use App\Washing_plan;
use App\Team_task;
use App\Appointment;
use App\Service;
use App\Blog;
use App\Testimonial;

class AdminController extends Controller
{
    public function index(){
      $users = User::orderBy('created_at', 'desc')->get();
      $u_count = User::count();
      $teams = Team::count();
      $washing_plan = Washing_plan::count();
      $team_task = Team_task::count();
      $appointment = Appointment::count();
      $services = Service::count();
      $blogs = Blog::count();
      $testimonials = Testimonial::count();
      return view('admin.index', compact('users', 'u_count','teams','washing_plan','team_task','appointment','services','blogs','testimonials'));
    }
}
