<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class LogosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

       DB::table('logos')->insert([
            /*1*/
           [
               'name' => 'White_sign',
               'photo' => '5e299211a875c.png',
               'company_id' => 1,
               'active' => 1,
           ],


       ]);


    }
}
