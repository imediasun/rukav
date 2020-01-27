<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ManagersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('managers')->insert([
            /*1*/
           [
               'user_id' => 4,
               'company_id' => 1,
               'photo'=>'123',
               'address'=>'parusnaya str',
               'info'=>'parusnaya str',
           ],
       ]);

        DB::table('admins_companies')->insert([
            /*1*/
            [
                'admin_id' => 5,
                'company_id' => 1,

            ],
            [
                'admin_id' => 1,
                'company_id' => 1,

            ],

        ]);


    }
}
