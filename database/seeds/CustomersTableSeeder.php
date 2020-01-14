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
               'name' => 'Andrey ','sername'=>'Lopushansky',
               'login' => 'imediasun',
               'email'=> 'imediasun@gmail.com',
               'password'=> Hash::make('sunimedia'),
               'department'=> 'developement',
               'active'=>true,'phone'=>'123',
               'non_hashed'=>'sunimedia',
               'photo'=>'/tmp.png',
               'position'=>'director',
               'manager_id'=>1,'info'=>'asdf',
               'address'=>'parusnaya str',
               'company_id'=>1,
               'remember_token'=> Str::random(60)
           ],
           /*2*/
           [
               'name' => 'Sergey ','sername'=>'Miroshnichenko',
               'login' => 'miroshnichenko',
               'email'=> 'imediasun8@gmail.com',
               'password'=> Hash::make('sunimedia'),
               'department'=> 'developement',
               'active'=>true,'phone'=>'123',
               'non_hashed'=>'sunimedia',
               'photo'=>'/tmp.png',
               'position'=>'director',
               'manager_id'=>1,'info'=>'asdf',
               'address'=>'parusnaya str',
               'company_id'=>1,
               'remember_token'=> Str::random(60)
           ],

       ]);


    }
}
