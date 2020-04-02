<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use Laravel\Socialite\Facades\Socialite;
class SiteAdminLoginController extends Controller
{

    /**
     * Redirect the user to the Google authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }


    //
    public function __construct()
    {
        $this->middleware('guest:admin',['except' => ['logout', 'getLogout']]);
    }


    public function getLogout()
    {
        \Auth::guard('admin')->logout();
        \Session::flush();
        return redirect('/');
    }
    public function showLoginForm(){
        return view('auth.admin-login');
    }

    public function login(Request $request){
        $this->validate($request, [
            'email'=>'required|email',
            'password'=>'required|min:6'

        ]);

        if(Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember)){
            return redirect()->intended(route('admin.dashboard'));
        }
        return redirect()->back()->withInput($request->only('email','remember'));
    }

    /**
     * Obtain the user information from Google.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {


        try {
            $user = Socialite::driver('google')->user();
            //dd($user );
        } catch (\Exception $e) {
            return redirect('/login');
        }
        // only allow people with @company.com to login
     /*   if(explode("@", $user->email)[1] !== 'company.com'){
            return redirect()->to('/');
        }*/
        // check if they're an existing user
        $existingUser = User::where('email', $user->email)->first();
        if($existingUser){
            // log them in
            auth()->login($existingUser, true);
        } else {
            // create a new user
            $newUser                  = new User;
            $newUser->name            = $user->name;
            $newUser->email           = $user->email;
            $newUser->google_id       = $user->id;
            $newUser->avatar          = $user->avatar;
            $newUser->avatar_original = $user->avatar_original;
            $newUser->save();
            auth()->login($newUser, true);
        }
        return redirect()->to('/');
    }


}
