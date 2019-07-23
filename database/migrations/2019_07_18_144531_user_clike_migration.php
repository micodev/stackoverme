<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserClikeMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   //user comment likes
        Schema::create('userclikes', function (Blueprint $table) {
            $table->bigIncrements('id')->unique();
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('comment_id')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('userclikes');
    }
}
