<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class CustomerLoginController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('guest:web',['except' => ['logout', 'getLogout']]);
    }


    public function getLogout()
    {
        \Auth::guard('web')->logout();
        \Session::flush();
        return redirect('/');
    }
    public function showLoginForm(){
        dump(123);
        return view('auth.login');
    }

    public function login(Request $request){
        $this->validate($request, [
            'email'=>'required|email',
            'password'=>'required|min:6'

        ]);

        if(Auth::guard('web')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember)){
            return redirect()->intended(route('dashboard'));
        }
        return redirect()->back()->withInput($request->only('email','remember'));
    }
}
