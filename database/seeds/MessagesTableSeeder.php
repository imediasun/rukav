<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

       DB::table('messages')->insert([
            /*1*/
           [
               'category_id' => 14,
               'sender' => 1,
               'company_id' => 1,
               'title' => 'Детские футболочки',
               'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
               'badge_id'=> 1,
               'created_at'=>\Carbon\Carbon::now(),
               'visibility'=>3
           ],
           /*2*/
           [
               'category_id' => 14,
               'sender' => 1,
               'company_id' => 1,
               'title' => 'Детские футболочки',
               'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
               'badge_id'=> 1,
               'created_at'=>\Carbon\Carbon::now(),
               'visibility'=>3
           ],
           /*3*/
           [
               'category_id' => 14,
               'sender' => 1,
               'company_id' => 1,
               'title' => 'Детские футболочки',
               'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
               'badge_id'=> 1,
               'created_at'=>\Carbon\Carbon::now(),
               'visibility'=>3
           ],
           /*4*/
           [
               'category_id' => 14,
               'sender' => 1,
               'company_id' => 1,
               'title' => 'Детские футболочки',
               'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
               'badge_id'=> 1,
               'created_at'=>\Carbon\Carbon::now(),
               'visibility'=>3
           ],
           /*5*/
           [
               'category_id' => 14,
               'sender' => 1,
               'company_id' => 1,
               'title' => 'Детские футболочки',
               'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
               'badge_id'=> 1,
               'created_at'=>\Carbon\Carbon::now(),
               'visibility'=>3
           ],
           /*6*/
           [
               'category_id' => 14,
               'sender' => 1,
               'company_id' => 1,
               'title' => 'Детские футболочки',
               'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
               'badge_id'=> 1,
               'created_at'=>\Carbon\Carbon::now(),
               'visibility'=>3
           ],
           /*7*/
           [
               'category_id' => 14,
               'sender' => 1,
               'company_id' => 1,
               'title' => 'Детские футболочки',
               'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
               'badge_id'=> 1,
               'created_at'=>\Carbon\Carbon::now(),
               'visibility'=>3
           ],
           /*8*/
           [
               'category_id' => 14,
               'sender' => 1,
               'company_id' => 1,
               'title' => 'Детские футболочки',
               'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
               'badge_id'=> 1,
               'created_at'=>\Carbon\Carbon::now(),
               'visibility'=>3
           ],

           /*9*/
           [
               'category_id' => 14,
               'sender' => 1,
               'company_id' => 1,
               'title' => 'Детские футболочки',
               'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
               'badge_id'=> 1,
               'created_at'=>\Carbon\Carbon::now(),
               'visibility'=>3
           ],
           /*10*/
           [
               'category_id' => 14,
               'sender' => 1,
               'company_id' => 1,
               'title' => 'Детские футболочки',
               'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
               'badge_id'=> 1,
               'created_at'=>\Carbon\Carbon::now(),
               'visibility'=>3
           ],
           /*11*/
           [
               'category_id' => 14,
               'sender' => 1,
               'company_id' => 1,
               'title' => 'Детские футболочки',
               'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
               'badge_id'=> 1,
               'created_at'=>\Carbon\Carbon::now(),
               'visibility'=>3
           ],
           /*12*/
           [
               'category_id' => 14,
               'sender' => 1,
               'company_id' => 1,
               'title' => 'Детские футболочки',
               'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
               'badge_id'=> 1,
               'created_at'=>\Carbon\Carbon::now(),
               'visibility'=>3
           ],
           /*13*/
           [
               'category_id' => 14,
               'sender' => 1,
               'company_id' => 1,
               'title' => 'Детские футболочки',
               'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
               'badge_id'=> 1,
               'created_at'=>\Carbon\Carbon::now(),
               'visibility'=>3
           ],
           /*14*/
           [
               'category_id' => 14,
               'sender' => 1,
               'company_id' => 1,
               'title' => 'Детские футболочки',
               'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
               'badge_id'=> 1,
               'created_at'=>\Carbon\Carbon::now(),
               'visibility'=>3
           ],
           /*15*/
           [
               'category_id' => 14,
               'sender' => 1,
               'company_id' => 1,
               'title' => 'Детские футболочки',
               'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
               'badge_id'=> 1,
               'created_at'=>\Carbon\Carbon::now(),
               'visibility'=>3
           ],


       ]);



    }
}
