<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Gallery;
use App\Service;
use App\Team;
use App\Social_team;
use App\Facts;
use App\Testimonial;
use App\Washing_plan;
use App\Washing_price;
use App\Washing_plan_include;
use App\Vehicle_company;
use App\Vehicle_modal;
use App\Vehicle_type;
use App\Blog;
use App\Clients;
use App\Opening_hour;
use App\Company_social;
use App\Appointment;
use App\Contact;

class HomePageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        $galleries = Gallery::all();
        $teams = Team::all();
        $facts = Facts::all();
        $testimonials = Testimonial::all();
        $socials = Social_team::with('teams')->get();
        $washing_plans = Washing_plan::all();
        $washing_includes = Washing_plan_include::with('washing_plan')->get();
        $washing_prices = Washing_price::all();
        $vehicle_companies = Vehicle_company::all();
        $Vehicle_modals = Vehicle_modal::all();
        $vehicle_types = Vehicle_type::all();
        $blogs = Blog::orderBy('id', 'decs')->get();
        $clients = Clients::all();
        $opening_times = Opening_hour::all();
        $company_socials = Company_social::all();
        $contacts = Contact::all();

        $washing_plan_lists = Washing_plan::pluck('name', 'id')->all();
        $vehicle_company_lists = Vehicle_company::pluck('vehicle_company', 'id')->all();
        $vehicle_modal_lists = Vehicle_modal::pluck('vehicle_modal', 'id')->all();
        $vehicle_type_lists = Vehicle_type::pluck('type', 'id')->all();

        return view('index', compact('galleries', 'services', 'teams', 'socials', 'facts', 'testimonials', 'washing_prices', 'washing_includes', 'washing_plans', 'washing_plan_lists', 'vehicle_company_lists', 'vehicle_modal_lists', 'contacts', 'vehicle_type_lists', 'blogs', 'clients', 'opening_times', 'company_socials', 'vehicle_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      if (Auth::check()) {

        $input = $request->all();

        $user_name = User::findOrFail($input['user_id'])->name;
        $user_email = User::findOrFail($input['user_id'])->email;
        $washing_plan = Washing_plan::findOrFail($input['washing_plan_id'])->name;
        $vehicle_company = Vehicle_company::findOrFail($input['vehicle_company_id'])->vehicle_company;
        $vehicle_modal = Vehicle_modal::findOrFail($input['vehicle_modal_id'])->vehicle_modal;
        $vehicle_type = Vehicle_type::findOrFail($input['vehicle_types_id'])->type;
        $appointment_date = $input['appointment_date'];
        $time_frame = $input['time_frame'];

        $input['appointment_date'] = date("Y/m/d", strtotime($request->appointment_date));

        $new = Appointment::create($input);

        $user = User::findOrFail(Auth::user()->id);

        $user->appointment()->save($new);

        if (env('MAIL_USERNAME') == '' && env('MAIL_PASSWORD') == '') {
          return back()->with('added', 'Your Appointment Has Been Booked');
        }

        $data = array(
          'name' => $user_name,
          'email' => $user_email,
          'washing_plan' => $washing_plan,
          'vehicle_company' => $vehicle_company,
          'vehicle_modal' => $vehicle_modal,
          'vehicle_type' => $vehicle_type,
          'date' => $appointment_date,
          'time_frame' => $time_frame,
        );

        Mail::send('emails.home_appointment_emails', compact('data'), function($message) use ($data){
          $message->from(env('MAIL_USERNAME'));
          $message->to($data['email']);
        });

        Mail::send('emails.home_appointment_emails', compact('data'), function($message) use ($data){
          $message->to(env('MAIL_USERNAME'));
        });

        return back()->with('added', 'Appointment Has Been Booked Thanks!');

      }

      else {
        $password = bcrypt($request->password);

        $user = User::create(['name'=>$request->email, 'email'=>$request->email, 'password'=>$password, 'sex'=>$request->sex, 'dob'=>$request->dob, 'mobile'=>$request->mobile]);

        $input = $request->except(['name', 'email', 'password', 'sex', 'dob', 'mobile']);

        $input['user_id'] = $user->id;

        $input['appointment_date'] = date("Y/m/d", strtotime($request->appointment_date));

        $new = Appointment::create($input);

        $user = User::findOrFail($input['user_id']);

        $user->appointment()->save($new);

        if (env('MAIL_USERNAME') == '' && env('MAIL_PASSWORD') == '') {
          if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember_token )) {
              return back()->with('appointment_added', 'Appointment Has Been Booked!');
          }
        }

        $data = array(
          'name' => $user_name,
          'email' => $user_email,
          'washing_plan' => $washing_plan,
          'vehicle_company' => $vehicle_company,
          'vehicle_modal' => $vehicle_modal,
          'vehicle_type' => $vehicle_type,
          'date' => $appointment_date,
          'time_frame' => $time_frame,
        );

        Mail::send('emails.home_appointment_emails', compact('data'), function($message) use ($data){
          $message->from(env('MAIL_USERNAME'));
          $message->to($data['email']);
        });

        Mail::send('emails.home_appointment_emails', compact('data'), function($message) use ($data){
          $message->to(env('MAIL_USERNAME'));
        });

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember_token )) {
            return back()->with('appointment_added', 'Appointment Has Been Booked Thanks With Email');
        }
      }

    }

    public function mailError(){
      return back()->with('error', 'Please Provide MailChimp API Key...!');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
