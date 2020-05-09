<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
//Password Broker Facade
use Illuminate\Support\Facades\Password;
use App\Http\Traits\LanguageTrait;
use App\CategoryLanguage;

class PartnerForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;
  use LanguageTrait;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:partner');
    }
	//Shows form to request password reset
    public function showLinkRequestForm()
    {
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
        ];
        return view('auth.passwords.partner.email',$result);
    }
	
	public function sendResetLinkEmail(Request $request)
    {
        $this->validateEmail($request);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $response = $this->broker()->sendResetLink(
            $this->credentials($request)
        );
		$_SESSION['reset_owner_password']=1;

        return $response == Password::RESET_LINK_SENT
                    ? $this->sendResetLinkResponse($request, $response)
                    : $this->sendResetLinkFailedResponse($request, $response);
    }

	
	
	
	
	//Password Broker for Seller Model
    public function broker()
    {
         return Password::broker('partners');
    }

}
