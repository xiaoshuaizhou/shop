<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->increments('orderid');
            $table->integer('userid');
            $table->integer('addressid');
            $table->decimal('amount', 10, 2);
            $table->integer('status');
            $table->integer('expressid');
            $table->string('expressno', 100);
            $table->string('tradeno', 100);
            $table->text('tradeext');
            $table->index('userid');
            $table->index('addressid');
            $table->index('expressid');
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
        Schema::dropIfExists('order');
    }
}
