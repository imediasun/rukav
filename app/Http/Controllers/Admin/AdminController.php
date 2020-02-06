<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Domain\Admin\Facades\Admin;
use Illuminate\Support\Facades\Hash;
use App\Domain\Admin\Models\Avatar as AvatarModel;
use App\Domain\Admin\Models\BadgesGroup as BadgesGroupModel;
use App\Domain\Admin\Models\Badge as BadgeModel;
use App\Domain\Company\Models\CompanyBadge;

class AdminController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       parent::__construct();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=$this->mainSettings();
        $data['menu']=$this->menu();

        $data['title']="Додати товар";
        $data['keywords']="Ukrainian industry platform";
        $data['description']="Ukrainian industry platform";

        return view('admin.index',$data);
    }

    public function showProfile()
    {
        $data['menu']=$this->menu();
        $user=\Auth::user();
        $data['user']=$user;
        $data['title']="Додати товар";
        $data['keywords']="Ukrainian industry platform";
        $data['description']="Ukrainian industry platform";

        return view('admin.profile.index',$data);
    }

    public function postData(Request $request){

    $data=$this->mainSettings();
    $data['title']="Company postData";
    $data['user']=\App\User::where('id',\Auth::user()->id)->first();

    return view('admin.profile.form',$data);
    }

    public function postUpdate(Request $request){

        $data['title']="Company postData";


       $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|email',
           'login' => 'required',
           'department' => 'required',
           'password' => 'required|min:6',
           'password_confirmation' => 'required_with:password|same:password|min:6'
        ]);

        $user['values']=['name'=>$request->input('name'),'department'=>$request->input('department'),'email'=>$request->input('email'),
            'login'=>$request->input('login'),'password'=>Hash::make($request->input('password')),'non_hashed'=>$request->input('password')
            ];
        $user['attributes']['id']=(null!=($request->input('id'))) ? $request->input('id') : null;
        Admin::updateAdmin($user);

        return redirect()->route('admin.profile');
    }

    public function showAvatarPage(){

        $data['menu']=$this->menu();
        $user=\Auth::user();
        $data['user_id']=$user->id;
        $data['title']="Додати товар";
        $data['keywords']="Ukrainian industry platform";
        $data['description']="Ukrainian industry platform";
        \Session::forget('temp_avatar_filename');

        return view('admin.profile.avatar.index',$data);
    }

    public function postAvatarsData(Request $request){

        $data['title']="Company postLogosData";
        $data['avatars']=AvatarModel::get();
        return view('admin.profile.avatar.table',$data);
    }

    public function getAvatar(Request $request){
        $data=AvatarModel::where('id',$request->input('avatar_id'))->first();

        return $data;
    }

    public function postAvatarDelete(Request $request){
        $ava=AvatarModel::where('id',$request->input('avatar_id'))->first();
        $result=Admin::deleteAdminAvatar($ava);

        return \Response::json($result);
    }


    public function showCustomBadges(){

        $data=$this->mainSettings();
        $data['menu']=$this->menu();
        $user=\Auth::user();
        //$data['company_id']=$user->getCompany[0]->id;
        $data['badges_groups']=BadgesGroupModel::get();
        $data['title']="Додати товар";
        $data['keywords']="Ukrainian industry platform";
        $data['description']="Ukrainian industry platform";
        \Session::forget('temp_badge_filename');

        return view('main_admin.companies.badges.index',$data);
    }

    public function showBadgesGroups(){

        $data=$this->mainSettings();
        $data['menu']=$this->menu();
        $user=\Auth::user();

        $data['title']="Додати товар";
        $data['keywords']="Ukrainian industry platform";
        $data['description']="Ukrainian industry platform";

        return view('main_admin.companies.badges_groups.index',$data);
    }


    public function postBadgesGroupsData(Request $request){
        $data=$this->mainSettings();
        $data['title']="Company postBadgesGroupsData";
        $data['badges_groups']=BadgesGroupModel::get();
        return view('main_admin.companies.badges_groups.table',$data);
    }

    public function getBadgesGroups(Request $request){
        $data=BadgesGroupModel::where('id',$request->input('company_id'))->first();

        return $data;
    }

    public function postBadgesGroupsDelete(Request $request){
        $badges_group=BadgesGroupModel::where('id',$request->input('badges_group_id'))->first();
        $result=Admin::deleteBadgesGroup($badges_group);

        return \Response::json($result);
    }

    public function postBadgesData(Request $request){

        $data['title']="Company postBadgesData";
        $data['badges']=BadgeModel::with('group')->get();

        return view('main_admin.companies.badges.table',$data);
    }

    public function getBadge(Request $request){
        $data=BadgeModel::where('id',$request->input('badge_id'))->first();

        return $data;
    }

    public function postBadgeDelete(Request $request){
        $logo=BadgeModel::where('id',$request->input('badge_id'))->first();
        $result=Company::deleteCompanyBadge($logo);

        return \Response::json($result);
    }





}
