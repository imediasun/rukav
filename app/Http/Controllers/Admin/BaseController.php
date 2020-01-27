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
        $data['company_badges_groups']=$companyBadgesGroups;
        $data['collegues']=$user->collegues;
        return $data;
    }

}
