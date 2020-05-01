<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Auth\AuthenticationException;
class SuperAdminLoginController extends Controller
{
    //
    public function __construct()
    {

     $this->middleware('guest:superadmin');
    }

    public function showLoginForm(){
        return view('auth.superadmin-login');
    }

    public function login(Request $request){

        $this->validate($request, [
            'email'=>'required|email',
            'password'=>'required|min:6'

        ]);

        if(Auth::guard('superadmin')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember)){
         return redirect()->intended(route('superadmin.dashboard'));
        }

        return redirect()->back()->withInput($request->only('email','remember'));
    }
}
