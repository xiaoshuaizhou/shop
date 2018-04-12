<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('productid');
            $table->integer('cateid');
            $table->string('title', 200);
            $table->text('descr');
            $table->integer('num');
            $table->decimal('price', 10, 2);
            $table->string('cover', 200);
            $table->text('pics');
            $table->enum('issale', [1 , 0])->default(0);
            $table->enum('ishot', [1 , 0])->default(0);
            $table->enum('istui', [1 , 0])->default(0);
            $table->decimal('saleprice', 10, 2);
            $table->enum('ison', [1 , 0])->default(1);
            $table->index('cateid');
            $table->index('ison');
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
        Schema::dropIfExists('product');
    }
}
