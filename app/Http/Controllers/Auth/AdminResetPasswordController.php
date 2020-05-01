<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Auth;

//Password Broker Facade
use Illuminate\Support\Facades\Password;

class AdminResetPasswordController extends Controller
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
    protected $redirectTo = '/admin/kreditanfragen';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin');
    }
	
	public function broker()
    {
     return Password::broker('admins');
    }
	
	public function showResetForm(Request $request, $token = null)
    {
        return view('auth.passwords.admin.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

	protected function guard()
	{
		return Auth::guard('admin');
	}
}
