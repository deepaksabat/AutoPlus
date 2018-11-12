<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;
use Auth;

class mailChimpController extends Controller
{
    protected $mailchimp;
    protected $listId = '';

    public function __construct(\Mailchimp $mailchimp)
    {
        $this->mailchimp = $mailchimp;
    }

   public function subscribe(Request $request)
    {
      	$this->validate($request, [
  	    	'email' => 'required|email',
        ]);

        try {
            $this->mailchimp->lists->subscribe($this->listId,['email' => $request->input('email')]);
            return redirect()->back()->with('added','Email Subscribed successfully');
        }
        catch (\Mailchimp_List_AlreadySubscribed $e) {
            return redirect()->back()->with('error','Email is Already Subscribed');
        }
        catch (\Mailchimp_Error $e) {
            return redirect()->back()->with('error','Error from MailChimp');
        }
    }

}
