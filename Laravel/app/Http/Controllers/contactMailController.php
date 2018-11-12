<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company_social;
use App\Service;
use App\Opening_hour;
use App\Contact;
use Mail;

class contactMailController extends Controller
{
    public function index()
    {
      $company_socials = Company_social::all();
      $services = Service::all();
      $opening_times = Opening_hour::all();
      $contacts = Contact::all();
      return view('contact', compact('company_socials', 'services', 'opening_times', 'contacts'));
    }

    public function send(Request $request)
    {
        $this->validate($request, [
          'name'=>'required',
          'email'=>'required|email',
          'subject'=>'required',
          'mail_message'=>'required|min:10',
        ]);

        $data = array(
          'name' => $request->name,
          'email' => $request->email,
          'subject' => $request->subject,
          'mail_message' => $request->mail_message,
        );

        Mail::send('emails.contact_mail', compact('data'), function($message) use ($data){
          $message->from($data['email']);
          $message->to(env('MAIL_USERNAME'));
          $message->subject($data['subject']);
        });

        return back()->with('added', 'Email Send Successfully...');
    }
}
