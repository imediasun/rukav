<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

       DB::table('users')->insert([
            /*1*/
           [
               'name' => ' .',
               'sername'=>'Игрушки',
               'login' => 'imediasun',
               'email'=> 'imediasun@gmail.com',
               'password'=> Hash::make('sunimedia'),
               'department'=> 'developement',
               'active'=>true,
               'non_hashed'=>'sunimedia',
               'company_id'=>1
           ],
           /*2*/
           [
               'name' => 'Sergey ',
               'sername'=>'Miroshnichenko',
               'login' => 'imediasun8',
               'email'=> 'imediasun8@gmail.com',
               'password'=> Hash::make('sunimedia'),
               'department'=> 'developement',
               'active'=>true,
               'non_hashed'=>'sunimedia',
               'company_id'=>1
           ],
           /*3*/
           [
               'name' => 'Дома',
               'sername'=>' .',
               'login' => 'editor user',
               'email'=> 'test_email@gmail.com',
               'password'=> Hash::make('sunimedia'),
               'department'=> 'developement',
               'active'=>true,
               'non_hashed'=>'sunimedia',
               'company_id'=>1
           ],
           /*4*/
           [
               'name' => 'Детские',
               'sername'=>'Коляски',
               'login' => 'editor user',
               'email'=> 'senior.dev.php@gmail.com',
               'password'=> Hash::make('sunimedia'),
               'department'=> 'developement',
               'active'=>true,
               'non_hashed'=>'sunimedia',
               'company_id'=>1
           ],
           /*5*/
           [
               'name' => 'Детская',
               'sername'=>'Одежда',
               'login' => 'editor user',
               'email'=> 'dev.magellan@gmail.com',
               'password'=> Hash::make('sunimedia'),
               'department'=> 'developement',
               'active'=>true,
               'non_hashed'=>'sunimedia',
               'company_id'=>1
           ],

        ]);

       $users=\App\User::get();
       foreach($users as $user){
           $user->remember_token= Str::random(60);
           $user->save();
       }






    }
}
