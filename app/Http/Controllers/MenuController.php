<?php

namespace App\Http\Controllers;

use DB;
class MenuController extends Controller
{
    //
    static public function index($index){
    
        return DB::table($index)
            ->get(); 
        
    }
}
