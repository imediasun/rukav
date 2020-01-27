<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

       DB::table('company_settings')->insert([
            /*1*/
           [
               'id'=>1,
               'theme_options' => '{"themeOptions":"mod-bg-1","themeURL":"/NewSmartAdmin/css/themes/cust-theme-2.css"}',

           ],


       ]);



    }
}
