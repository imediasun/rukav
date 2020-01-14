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
            $table->integer('company_id')->unsigned();
            $table->string('name');
            $table->string('sername');
            $table->string('login');
            $table->string('email')->unique();
            $table->string('department');
            $table->string('phone');
            $table->string('photo');
            $table->text('info');
            $table->string('position');
            $table->integer('manager_id');
            $table->boolean('active')->default(0);
            $table->string('address');
            $table->string('password');
            $table->string('non_hashed');
            $table->rememberToken();
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
