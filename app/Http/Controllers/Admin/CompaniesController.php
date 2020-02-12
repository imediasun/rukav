<?php

namespace App\Http\Controllers\Admin;

use App\Domain\Company\Models\CompanyBadge;
use Illuminate\Http\Request;
use App\Domain\Company\Facades\Company;
use App\Domain\Company\Models\Company as CompanyModel;
use App\Domain\Company\Models\Badge as BadgeModel;
use App\Domain\Company\Models\CompanyBadge as CompanyBadgesModel;
use App\Domain\Company\Models\Logo as CompanyLogoModel;
use App\Domain\Admin\Models\BadgesGroup as BadgesGroupModel;

class CompaniesController extends BaseController
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

        return view('main_admin.companies.index',$data);
    }

    public function showBadgesStatistic(){

        $data=$this->mainSettings();
        $data['menu']=$this->menu();
        $data['title']="Додати товар";
        $data['keywords']="Ukrainian industry platform";
        $data['description']="Ukrainian industry platform";

        return view('company.statistic.index',$data);
    }

    public function postBadgesStatisticData(Request $request){

        $data['title']="Company postBadgesData";
        $data['menu']=$this->menu();
        $user=\Auth::user();
        $data['company_id']=$user->getCompany[0]->id;
        $data['company_badges_groups']=CompanyBadge::select('badges_group_id')->where('company_id',$data['company_id'])->get()->toArray();
        $company_badges_groups=[];
        foreach($data['company_badges_groups'] as $badges_group){
            $company_badges_groups[]=$badges_group['badges_group_id'];
        }
        $data['badges']=BadgeModel::whereIn('group_id',$company_badges_groups)->get();
        $from=\Carbon\Carbon::createFromFormat('m/d/Y', $request->input('start'));
        $to=\Carbon\Carbon::createFromFormat('m/d/Y', $request->input('finish'));
        foreach($data['badges'] as $badge){

            $messages_on_period=\App\Domain\Customer\Models\Message::whereBetween('created_at', [$from, $to])->where('badge_id',$badge->id)->get();
            $messages_on_period_grouped_by_sender=\App\Domain\Customer\Models\Message::whereBetween('created_at', [$from, $to])->where('badge_id',$badge->id)->groupBy('sender')->get();
            $badge->badges_on_period=count($messages_on_period);
            $badge->badges_on_period_grouped_by_sender=count($messages_on_period_grouped_by_sender);
        }
        return view('company.statistic.table',$data);
    }


    public function postData(Request $request){

        $data['title']="Company postData";
        $data['companies']=CompanyModel::with('logo')->with('admin')->get();
        return view('main_admin.companies.table',$data);
    }

    public function postLogosData(Request $request){

        $data['title']="Company postLogosData";
        $data['logos']=CompanyLogoModel::get();
        return view('main_admin.companies.logo.table',$data);
    }

    public function postBadgesData(Request $request){

        $data['title']="Company postBadgesData";
        $data['menu']=$this->menu();
        $user=\Auth::user();
        $data['company_id']=$user->getCompany[0]->id;
        $data['company_badges_groups']=CompanyBadge::select('badges_group_id')->where('company_id',$data['company_id'])->get()->toArray();
        $company_badges_groups=[];
        foreach($data['company_badges_groups'] as $badges_group){
            $company_badges_groups[]=$badges_group['badges_group_id'];
        }
        $data['badges']=BadgeModel::whereIn('group_id',$company_badges_groups)->get();
        return view('company.badges.table',$data);
    }

    public function getCompany(Request $request){
        $data=CompanyModel::where('id',$request->input('company_id'))->first();

        return $data;
    }

    public function getCompanyBadges(Request $request){
        $data=CompanyBadgesModel::where('company_id',$request->input('company_id'))->get();
        return $data;
    }

    public function getLogo(Request $request){
        $data=CompanyLogoModel::where('id',$request->input('logo_id'))->first();

        return $data;
    }

    public function getBadge(Request $request){
        $data=BadgeModel::where('id',$request->input('badge_id'))->first();

        return $data;
    }

    public function postSave(Request $request){
        $company['values']=['name'=>$request->input('company_name'),'email'=>$request->input('company_email')
            ,'info'=>$request->input('company_info'),'phone'=>$request->input('company_phone')
            ,'address'=>$request->input('company_address'),'biling_address'=>$request->input('company_biling_address')

        ];
        $company['attributes']['id']=(null!=($request->input('company_id')) && !empty($request->input('company_id'))) ? $request->input('company_id') : null;
        Company::updateCompany($company);
    }

    public function postDelete(Request $request){
        $company=CompanyModel::where('id',$request->input('company_id'))->first();
        $result=Company::deleteCompany($company);

        return \Response::json($result);
    }

    public function postLogoDelete(Request $request){
        $logo=CompanyLogoModel::where('id',$request->input('logo_id'))->first();
        $result=Company::deleteCompanyLogo($logo);

        return \Response::json($result);
    }

    public function postBadgeDelete(Request $request){
        $logo=BadgeModel::where('id',$request->input('badge_id'))->first();
        $result=Company::deleteCompanyBadge($logo);

        return \Response::json($result);
    }

    public function themes()
    {
        $data=$this->mainSettings();
        $data['menu']=$this->menu();
        $user=\Auth::user();
        $data['company_id']=$user->getCompany[0]->id;
        $data['title']="Додати товар";
        $data['keywords']="Ukrainian industry platform";
        $data['description']="Ukrainian industry platform";

        return view('main_admin.companies.themes',$data);
    }

    public function saveTheme(Request $request){
        $companySetting['values']=['theme_options'=>$request->input('theme_options')];
        $companySetting['attributes']['id']=(null!=($request->input('company_id')) && !empty($request->input('company_id'))) ? $request->input('company_id') : null;
        Company::updateCompanySetting($companySetting);

    }

    public function showLogoPage(){

        $data['menu']=$this->menu();
        $user=\Auth::user();
        $data['company_id']=$user->getCompany[0]->id;
        $data['title']="Додати товар";
        $data['keywords']="Ukrainian industry platform";
        $data['description']="Ukrainian industry platform";
        \Session::forget('temp_logo_filename');

        return view('main_admin.companies.logo.index',$data);
    }


    public function showCustomBadges(){

        $data=$this->mainSettings();
        $data['menu']=$this->menu();
        $user=\Auth::user();
        $data['badges_groups']=BadgesGroupModel::get();
        $data['company_id']=$user->getCompany[0]->id;
        $data['title']="Додати товар";
        $data['keywords']="Ukrainian industry platform";
        $data['description']="Ukrainian industry platform";
        \Session::forget('temp_badge_filename');

        return view('company.badges.index',$data);
    }
}
