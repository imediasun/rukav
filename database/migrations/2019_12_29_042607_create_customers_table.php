<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned();
            $table->integer('company_id')->unsigned();
            $table->date('birth_date');
            $table->date('start_date');
            $table->string('department');
            $table->boolean('sex');
            $table->string('phone');
            $table->string('photo');
            $table->text('info');
            $table->string('position');
            $table->integer('manager_id');
            $table->boolean('active')->default(0);
            $table->string('address');
            $table->string('location');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('company_id')->references('id')->on('companies');
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
        Schema::dropIfExists('customers');
    }
}
