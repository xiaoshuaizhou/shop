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
            $table->string('website', 255)->nullable();
            $table->string('detailaddress', 255)->nullable();
            $table->string('province')->nullable();
            $table->string('city')->nullable();
            $table->integer('postcode')->nullable();
            $table->text('mark')->nullable();
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
            $table->dropColumn('status');
            $table->dropColumn('phone');
            $table->dropColumn('website');
            $table->dropColumn('detailaddress');
            $table->dropColumn('province');
            $table->dropColumn('city');
            $table->dropColumn('postcode');
            $table->dropColumn('mark');
        });
    }
}
