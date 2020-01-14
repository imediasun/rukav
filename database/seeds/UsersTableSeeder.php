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
               'name' => 'Andrey Lopushansky',
               'login' => 'imediasun',
               'email'=> 'imediasun@gmail.com',
               'password'=> Hash::make('sunimedia'),
               'department'=> 'developement',
               'active'=>true,
               'non_hashed'=>'sunimedia'
           ],
           /*2*/
           [
               'name' => 'Sergey Lopushansky',
               'login' => 'imediasun8',
               'email'=> 'imediasun8@gmail.com',
               'password'=> Hash::make('sunimedia'),
               'department'=> 'developement',
               'active'=>true,
               'non_hashed'=>'sunimedia'
           ],
           /*3*/
           [
               'name' => 'Test editor',
               'login' => 'editor user',
               'email'=> 'test_email@gmail.com',
               'password'=> Hash::make('sunimedia'),
               'department'=> 'developement',
               'active'=>true,
               'non_hashed'=>'sunimedia'
           ],
           /*4*/
           [
               'name' => 'Manager',
               'login' => 'editor user',
               'email'=> 'senior.dev.php@gmail.com',
               'password'=> Hash::make('sunimedia'),
               'department'=> 'developement',
               'active'=>true,
               'non_hashed'=>'sunimedia'
           ],
           /*5*/
           [
               'name' => 'Company_admin',
               'login' => 'editor user',
               'email'=> 'dev.magellan@gmail.com',
               'password'=> Hash::make('sunimedia'),
               'department'=> 'developement',
               'active'=>true,
               'non_hashed'=>'sunimedia'
           ],
        ]);

       $users=\App\User::get();
       foreach($users as $user){
           $user->remember_token= Str::random(60);
           $user->save();
       }



    }
}
