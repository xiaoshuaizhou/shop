<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumesToProfile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('profile', function (Blueprint $table) {
            $table->integer('status')->default(0);
            $table->string('phone', 20);
            $table->string('website', 255);
            $table->string('detailaddress', 255);
            $table->string('province');
            $table->string('city');
            $table->integer('postcode');
            $table->text('mark');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('profile', function (Blueprint $table) {
            $table->integer('status')->default(0);
            $table->string('phone', 20);
            $table->string('website', 255);
            $table->string('detailaddress', 255);
            $table->string('province');
            $table->string('city');
            $table->integer('postcode');
            $table->text('mark');
        });
    }
}
