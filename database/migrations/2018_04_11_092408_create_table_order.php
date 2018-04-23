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
            $table->integer('userid')->default(0);
            $table->integer('addressid')->default(0);
            $table->decimal('amount', 10, 2)->default(0.0);
            $table->integer('status')->default(0);
            $table->integer('expressid')->default(0);
            $table->string('expressno', 100)->default('');
            $table->string('tradeno', 100)->default('');
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
