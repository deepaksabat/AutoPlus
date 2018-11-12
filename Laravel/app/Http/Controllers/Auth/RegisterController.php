<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Contact;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'sex'=> 'required',
            'dob' => 'required',
            'mobile' => 'required|max:14',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @retu  rn \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'dob' => $data['dob'],
            'mobile' => $data['mobile'],
            'phone' => $data['phone'],
            'address' => $data['address'],
            'dob' => $data['dob'],
            'sex' => $data['sex'],
        ]);
    }

    public function getRegister(){
      $contacts = Contact::all();
      return view('auth.register', compact('contacts'));
    }

    public function postLogin(Request $request){
        $credentials = $request->only('email','password');
        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']]))  {

            return redirect($this->redirectPath());

        }
        else
        {
        return redirect('/auth/login')
           ->withInput($request->only('email'))
           ->withErrors([
               'email' => 'These credentials do not match our record',
           ]);
        }
    }
     public function redirectPath(){
        return property_exists($this,'redirectTo') ? $this->redirectTo:'/';
    }
}
