<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProfile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile', function (Blueprint $table) {
            $table->increments('id');
            $table->string('truename', 32);
            $table->tinyInteger('age');
            $table->enum('sex', ['男', '女' , '保密']);
            $table->dateTime('birthday');
            $table->string('nickname', 32);
            $table->string('company', 100);
            $table->integer('userid');
            $table->index('userid');
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
        Schema::dropIfExists('profile');
    }
}
