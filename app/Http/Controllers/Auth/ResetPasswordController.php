<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Auth;

//Password Broker Facade
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    //trait for handling reset Password
    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */

    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:superadmin');
    }
	
	public function broker()
    {
     return Password::broker('superadmins');
    }
	
	public function showResetForm(Request $request, $token = null)
    {
        return view('auth.passwords.superadmin.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

	protected function guard()
	{
		return Auth::guard('superadmin');
	}
}
