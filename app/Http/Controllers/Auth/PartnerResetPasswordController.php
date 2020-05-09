<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Auth;

//Password Broker Facade
use App\Http\Traits\LanguageTrait;
use App\CategoryLanguage;
use Illuminate\Support\Facades\Password;

class PartnerResetPasswordController extends Controller
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
	 use LanguageTrait;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:partner');
    }
	
	public function broker()
    {
     return Password::broker('partners');
    }
	
	public function showResetForm(Request $request, $token = null)
    {
		
		$explode=explode('/',$request->getPathInfo());
		$this->page_id = 2;
		$lang=$this->lang($this->page_id);
		 $result = [
            'language' => $lang->language,
            'languages' => $lang->languages,
            'page_language' => $lang->page_language,
            'page_languages' => $lang->page_languages,
            'uri' => $lang->uri,
            'page_id' => $this->page_id,
            'category_languages' => $lang->category_languages,
            'categories' => CategoryLanguage::where('language_id', $lang->language->id)->get(),
			'token' => $token
        ];
        return view('auth.passwords.partner.reset')->with(
            $result
        );
    }

	protected function guard()
	{
		return Auth::guard('partner');
	}
}
