<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('messages', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->bigInteger('addressant')->unsigned();
            $table->bigInteger('sender')->unsigned();
            $table->integer('company_id');
            $table->string('title');
            $table->string('message');
            $table->integer('badge_id');
            $table->integer('visibility');
            $table->foreign('sender')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('addressant')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
