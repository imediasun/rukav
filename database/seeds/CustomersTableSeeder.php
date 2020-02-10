<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            /*1*/
            [
                'user_id' => 1,
                'company_id' => 1,
                'department'=> 'department',
                'phone'=> '13232',
                'photo'=> 'avatar-a.png',
                'info'=>'info',
                'position'=>'developer',
                'active'=>1,
                'address'=>'address',
                'location'=>'Kiev',
                'manager_id'=>2,
                'birth_date'=>\Carbon\Carbon::now(),
                'start_date'=>\Carbon\Carbon::now(),
                'sex'=>1,

            ],

            /*2*/
            [
                'user_id' => 2,
                'company_id' => 1,
                'department'=> 'department',
                'phone'=> '13232',
                'photo'=> 'avatar-b.png',
                'info'=>'info',
                'position'=>'developer',
                'active'=>1,
                'address'=>'address',
                'location'=>'Kiev',
                'manager_id'=>1,
                'birth_date'=>\Carbon\Carbon::now(),
                'start_date'=>\Carbon\Carbon::now(),
                'sex'=>1,
            ],
            /*3*/
            [
                'user_id' => 3,
                'company_id' => 1,
                'department'=> 'department',
                'phone'=> '13232',
                'photo'=> 'avatar-b.png',
                'info'=>'info',
                'position'=>'developer',
                'active'=>1,
                'address'=>'address',
                'location'=>'Kiev',
                'manager_id'=>1,
                'birth_date'=>\Carbon\Carbon::now(),
                'start_date'=>\Carbon\Carbon::now(),
                'sex'=>1,
            ],
            /*3*/
            [
                'user_id' => 5,
                'company_id' => 1,
                'department'=> 'department',
                'phone'=> '13232',
                'photo'=> 'avatar-c.png',
                'info'=>'info',
                'position'=>'developer',
                'active'=>1,
                'address'=>'address',
                'location'=>'Kiev',
                'manager_id'=>1,
                'birth_date'=>\Carbon\Carbon::now(),
                'start_date'=>\Carbon\Carbon::now(),
                'sex'=>1,
            ],
            /*4*/
            [
                'user_id' => 4,
                'company_id' => 1,
                'department'=> 'department',
                'phone'=> '13232',
                'photo'=> 'avatar-c.png',
                'info'=>'info',
                'position'=>'developer',
                'active'=>1,
                'address'=>'address',
                'location'=>'Kiev',
                'manager_id'=>1,
                'birth_date'=>\Carbon\Carbon::now(),
                'start_date'=>\Carbon\Carbon::now(),
                'sex'=>1,
            ],

        ]);


    }
}
