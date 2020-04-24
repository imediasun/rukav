<?php

namespace App\Http\Controllers\Auth;

use App\EstateOwners;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Auth;
use App\Jobs\SendEmailVerification;
use Log;

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
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $route= md5($data['name'] . $data['email'] . rand(10000, 100000));
        session()->put('user_dashboard', $route);
        return \App\User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'nan_hashed' => $data['password'],
            'company_id'=>1,
            'route'=>$route,
            'active'=>1,
            'avatar'=>'Default-avatar.jpg'
        ]);
    }


    public function store()
    {
        /*if(request('password')!=request('confirm_password')){
            $params['error']="Passwords dont match";
            $params['section']="Register";
            return json_encode($params);
        }*/
		
        $valid=$this->validate(request(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:estate_owners',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required|min:6',
            'phone' => 'required|min:6'
        ]);
			Log::info('RegisterController.php: '.date("Y-m-d H:i:s").
			'validation'.print_r($valid,true));
        if($valid){
            $user =self::create(request(['name', 'email', 'password','phone']));


            Auth::guard('partner')->login($user);

			dispatch(new SendEmailVerification($user)); 
            //$user->sendEmailVerificationNotification();

            return json_encode(['success'=>true]);
        }

    }
}
