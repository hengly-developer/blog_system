<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsSchedulers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts_schedulers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('post_id');
            $table->dateTime('scheduled_on');
            $table->tinyInteger('status')->default(1); // If schedule already run set to 0
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
        Schema::dropIfExists('posts_schedulers');
    }
}
