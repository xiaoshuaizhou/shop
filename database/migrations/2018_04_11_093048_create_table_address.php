<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAddress extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address', function (Blueprint $table) {
            $table->increments('addressid');
            $table->string('firstname', 32)->default('');
            $table->string('lastname', 32)->default('');
            $table->string('company', 100)->default('');
            $table->text('address')->nullable();
            $table->char('postcode', 6)->default('');
            $table->string('email', 100)->default('');
            $table->string('telephone', 20);
            $table->integer('userid')->default(0);
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
        Schema::dropIfExists('address');
    }
}
