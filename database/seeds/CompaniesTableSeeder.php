<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

       DB::table('companies')->insert([
            /*1*/
           [
               'name' => 'Awesome ',
               'email'=> 'imediasun@gmail.com',
               'phone'=>'123',
             /*  'info'=>'123',*/
               'address'=>'parusnaya str',
               'web'=>'http://index.com',
               'biling_address'=>'parusnaya str',
               'status'=>1,
               'registration_date'=>\Carbon\Carbon::now(),
               'clients_segment'=>'IT'
           ],

       ]);

        DB::table('banners')->insert([
            /*1*/
            [
                'name' => 'Awesome ',
                'photo'=> '1.jpg',
                'company_id'=>1,
                'active'=>1,

            ],

        ]);


    }
}
