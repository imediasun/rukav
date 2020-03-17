<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    return MenuController::index('categories');

}

    protected function rubrics(){
        return MenuController::index('product_categories');

    }

    protected function mainSettings(){
        $user=\Auth::user();
        $data['user_id']=$user->id;
        $data['company_id']=$user->company_id;

        //$companyBadgesGroups=$user->getCompanyBadges;
        $companyBadgesGroups=\App\ProductCategory::where('parent_id',0)->get();
        $data['company_badges_groups']=$companyBadgesGroups;
        $data['customers']=\App\User::with('getCustomersCompany')->get();
        $data['collegues']=$user->collegues;
        return $data;
    }

}
