<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->string('profile_pic', 255)->nullable();
            $table->string('email', 70)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 255);
            $table->unsignedInteger('tg_id')->nullable();
            $table->string('tg_activation_link', 255)->nullable();
            $table->tinyInteger('status')->default(1);
            $table->string('user_type', 25)->default('basic'); // Basic, Premium, Top
            $table->rememberToken();
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
        Schema::dropIfExists('posters');
    }
}
