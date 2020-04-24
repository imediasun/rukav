<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MenuController;
class BaseController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    protected function menu(){
        return MenuController::index('admin_categories');

    }

    protected function mainSettings(){
        $user=\Auth::user();
        $data['user_id']=$user->id;
        $data['company_id']=$user->company_id;

        $companyBadgesGroups=$user->getCompanyBadges;
        foreach($companyBadgesGroups as $grp){
            $grp->group=\App\Domain\Admin\Models\BadgesGroup::where('id',$grp->badges_group_id)->first();
            $grp->badges=\App\Domain\Admin\Models\Badge::where('group_id',$grp->badges_group_id)->get();
            $data['company_badges_groups'][]=$grp;
        }
        $data['company_badges_groups']=$companyBadgesGroups;
        //dd($data['company_badges_groups']);
        $data['collegues']=$user->collegues;
        $data['companies']=\App\Domain\Company\Models\Company::get();
        $data['customers']=\App\User::with('getCustomersCompany')->get();
        return $data;
    }

}
