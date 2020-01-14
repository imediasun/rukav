<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_languages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('language_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->string('tag_title')->nullable()->default(null);
            $table->string('meta_description')->nullable()->default(null);
            $table->string('meta_keywords')->nullable()->default(null);
            $table->string('menu')->nullable()->default(null);
            $table->string('title')->nullable()->default(null);
            $table->text('text')->nullable()->default(null);
            $table->text('footer_text')->nullable()->default(null);
            $table->string('on_image_title')->nullable()->default(null);
            $table->string('on_image_alt')->nullable()->default(null);
            $table->timestamp('updated_at')->useCurrent();
            $table->timestamp('created_at')->useCurrent();

            $table->foreign('language_id')->references('id')->on('languages')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('category_id')->references('id')->on('categories')
                ->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_languages');
    }
}
