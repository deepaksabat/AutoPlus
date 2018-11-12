<?php

use App\Company_social;
use App\Service;
use App\Opening_hour;
use App\Contact;
use App\Washing_plan;
use App\Washing_plan_include;
use App\Washing_price;
use App\Vehicle_type;
use App\Gallery;
use App\Team;
use App\Social_team;
use App\Appointment_user;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('/', 'HomePageController');

Auth::routes();

Route::get('/home', function(){
  return Redirect('/');
});

Route::get('login', [ 'as' => 'login', 'uses' => 'Auth\LoginController@getLogin']);
Route::get('register', [ 'as' => 'register', 'uses' => 'Auth\RegisterController@getRegister']);
Route::get('password/reset', [ 'as' => 'password.reset', 'uses' => 'Auth\ForgotPasswordController@showResetPassword']);
Route::post('password/reset', ['as'=>'password.request', 'uses'=>'Auth\ResetPasswordController@reset']);
Route::get('password/reset{token}', [ 'as' => 'password.reset.token', 'uses' => 'Auth\ResetPasswordController@showResetForm']);

Route::post('subscribe', 'mailChimpController@subscribe');
Route::post('subscribe', 'HomePageController@mailError');

Route::get('/contact', 'contactMailController@index');
Route::post('/contact', 'contactMailController@send');

Route::get('/404', function(){
  $company_socials = Company_social::all();
  $services = Service::all();
  $opening_times = Opening_hour::all();
  $contacts = Contact::all();
  return view('404', compact('company_socials', 'services', 'opening_times', 'contacts'));
});

Route::get('/403', function(){
  $company_socials = Company_social::all();
  $services = Service::all();
  $opening_times = Opening_hour::all();
  $contacts = Contact::all();
  return view('403', compact('company_socials', 'services', 'opening_times', 'contacts'));
});

Route::get('/pricing_plan', function(){
  $company_socials = Company_social::all();
  $services = Service::all();
  $opening_times = Opening_hour::all();
  $contacts = Contact::all();
  $washing_plans = Washing_plan::all();
  $washing_includes = Washing_plan_include::with('washing_plan')->get();
  $vehicle_types = Vehicle_type::all();
  $washing_prices = Washing_price::all();
  return view('pricing_plan', compact('company_socials', 'services', 'opening_times', 'contacts', 'washing_plans', 'washing_includes', 'vehicle_types', 'washing_prices'));
});

Route::get('/faq', function(){
  $company_socials = Company_social::all();
  $services = Service::all();
  $opening_times = Opening_hour::all();
  $contacts = Contact::all();
  return view('faq', compact('company_socials', 'services', 'opening_times', 'contacts'));
});

Route::get('/coming_soon', function(){
  $company_socials = Company_social::all();
  $services = Service::all();
  $opening_times = Opening_hour::all();
  $contacts = Contact::all();
  return view('coming_soon', compact('company_socials', 'services', 'opening_times', 'contacts'));
});

Route::get('/under_construction', function(){
  $company_socials = Company_social::all();
  $services = Service::all();
  $opening_times = Opening_hour::all();
  $contacts = Contact::all();
  return view('under_construction', compact('company_socials', 'services', 'opening_times', 'contacts'));
});

Route::get('/gallery', function(){
  $company_socials = Company_social::all();
  $services = Service::all();
  $opening_times = Opening_hour::all();
  $contacts = Contact::all();
  $galleries = Gallery::all();
  return view('gallery', compact('company_socials', 'services', 'opening_times', 'contacts', 'galleries'));
});

Route::get('/team', function(){
  $company_socials = Company_social::all();
  $services = Service::all();
  $opening_times = Opening_hour::all();
  $contacts = Contact::all();
  $teams = Team::all();
  $socials = Social_team::with('teams')->get();
  return view('team', compact('company_socials', 'services', 'opening_times', 'contacts', 'teams', 'socials'));
});

Route::group(['middleware'=>'iscommon'], function(){

  Route::get('/admin', 'AdminController@index');

  Route::get('/admin/profile', function(){
    return view('profile');
  });

  Route::resource('/admin/users', 'AdminUsersController');

  Route::resource('admin/appointment', 'AdminAppointmentController');

});

Route::group(['middleware'=>'isadmin'], function(){

  Route::resource('/admin/team', 'AdminTeamController');

  Route::resource('/admin/team_social', 'AdminTeamSocialController');

  Route::resource('admin/services', 'AdminServiceController');

  Route::resource('admin/gallery', 'AdminGalleryController');

  Route::resource('admin/testimonial', 'AdminTestimonialController');

  Route::resource('admin/washing_plan', 'AdminWashingPlanController');

  Route::resource('admin/washing_include', 'AdminWashingIncludeController');

  Route::resource('admin/vehicle_type', 'AdminVehicleTypeController');

  Route::resource('admin/washing_price', 'AdminWashingPriceController');

  Route::resource('admin/status', 'AdminTaskStatusController');

  Route::resource('admin/team_task', 'AdminTeamTaskController');

  Route::resource('admin/facts', 'AdminFactsController');

  Route::resource('admin/blog', 'AdminBlogController');

  Route::resource('admin/clients', 'AdminClientsController');

  Route::resource('admin/opening_hours', 'AdminOpeningHoursController');

  Route::resource('admin/company_social', 'AdminCompanySocialController');

  Route::resource('admin/payment_mode', 'AdminPaymentModeController');

  Route::resource('admin/vehicle_company', 'AdminVehicleCompController');

  Route::resource('admin/vehicle_modal', 'AdminVehicleModalController');

  Route::resource('admin/payments', 'AdminPaymentController');

  Route::resource('admin/contact', 'AdminContactController');

  Route::resource('admin/payment', 'AdminPaymentController');

});
