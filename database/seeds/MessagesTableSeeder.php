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
               'addressant' => 5,
               'sender' => 1,
               'company_id' => 1,
               'title' => 'Testing messages 1',
               'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
               'badge_id'=> 1,
               'created_at'=>\Carbon\Carbon::now()
           ],
           /*2*/
           [
               'addressant' => 5,
               'sender' => 1,
               'company_id' => 1,
               'title' => 'Testing messages 2',
               'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
               'badge_id'=>2,
               'created_at'=>\Carbon\Carbon::now()
           ],
           /*3*/
           [
               'addressant' => 5,
               'sender' => 1,
               'company_id' => 1,
               'title' => 'Testing messages 3',
               'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
               'badge_id'=>3,
               'created_at'=>\Carbon\Carbon::now()
           ],
           /*4*/
           [
               'addressant' => 5,
               'sender' => 1,
               'company_id' => 1,
               'title' => 'Testing messages 4',
               'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
               'badge_id'=>4,
               'created_at'=>\Carbon\Carbon::now()
           ],
           /*5*/
           [
               'addressant' => 5,
               'sender' => 1,
               'company_id' => 1,
               'title' => 'Testing messages 5',
               'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
               'badge_id'=> 1,
               'created_at'=>\Carbon\Carbon::now()
           ],
           /*6*/
           [
               'addressant' => 5,
               'sender' => 1,
               'company_id' => 1,
               'title' => 'Testing messages 6',
               'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
               'badge_id'=>2,
               'created_at'=>\Carbon\Carbon::now()
           ],
           /*7*/
           [
               'addressant' => 5,
               'sender' => 1,
               'company_id' => 1,
               'title' => 'Testing messages 7',
               'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
               'badge_id'=>3,
               'created_at'=>\Carbon\Carbon::now()
           ],
           /*8*/
           [
               'addressant' => 5,
               'sender' => 1,
               'company_id' => 1,
               'title' => 'Testing messages 8',
               'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
               'badge_id'=>4,
               'created_at'=>\Carbon\Carbon::now()
           ],

           /*9*/
           [
               'addressant' => 5,
               'sender' => 1,
               'company_id' => 1,
               'title' => 'Testing messages 9',
               'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
               'badge_id'=> 1,
               'created_at'=>\Carbon\Carbon::now()
           ],
           /*10*/
           [
               'addressant' => 5,
               'sender' => 1,
               'company_id' => 1,
               'title' => 'Testing messages 10',
               'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
               'badge_id'=>2,
               'created_at'=>\Carbon\Carbon::now()
           ],
           /*11*/
           [
               'addressant' => 5,
               'sender' => 1,
               'company_id' => 1,
               'title' => 'Testing messages 11',
               'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
               'badge_id'=>3,
               'created_at'=>\Carbon\Carbon::now()
           ],
           /*12*/
           [
               'addressant' => 5,
               'sender' => 1,
               'company_id' => 1,
               'title' => 'Testing messages 12',
               'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
               'badge_id'=>4,
               'created_at'=>\Carbon\Carbon::now()
           ],
           /*13*/
           [
               'addressant' => 5,
               'sender' => 1,
               'company_id' => 1,
               'title' => 'Testing messages 13',
               'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
               'badge_id'=> 1,
               'created_at'=>\Carbon\Carbon::now()
           ],
           /*14*/
           [
               'addressant' => 5,
               'sender' => 1,
               'company_id' => 1,
               'title' => 'Testing messages 14',
               'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
               'badge_id'=>2,
               'created_at'=>\Carbon\Carbon::now()
           ],
           /*15*/
           [
               'addressant' => 5,
               'sender' => 1,
               'company_id' => 1,
               'title' => 'Testing messages 15',
               'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
               'badge_id'=>3,
               'created_at'=>\Carbon\Carbon::now()
           ],


       ]);



    }
}
