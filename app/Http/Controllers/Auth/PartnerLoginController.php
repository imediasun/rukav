<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Language;
use App\PageLanguage;
use App\Category;
use App\CategoryLanguage;
use Illuminate\Auth\AuthenticationException;
use App\Http\Traits\LanguageTrait;
class PartnerLoginController extends Controller
{
	use LanguageTrait;
    //
    public function __construct(Request $request)
    {
     $this->middleware('guest:partner');
     //dump(321);
    }

    public function showLoginForm(){ 
	dump(222);
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
        return view('auth.owners-login',$result);
    }

    public function login(Request $request,AuthenticationException $exception){

        $this->validate($request, [
            'email'=>'required|email',
            'password'=>'required|min:6'

        ]);
//dump($request->email,$request->password);
        if(Auth::guard('partner')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember)){

            $user=\App\EstateOwners::where('email',$request->email)->first();
            Auth::guard('partner')->login($user);
            //dump('auth=>guard',Auth::guard('partner')->check());
            //return redirect()->intended(route('owner.dashboard'));
            return json_encode(['success'=>true]);
        }
        //return redirect()->back()->withInput($request->only('email','remember'));
        return \Response::json([
            'error' => 'User with your credentions we can not find, try again!'
        ], 400);
    }
}
