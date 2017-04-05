<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('categories', function (Blueprint $table) {
//            $table->increments('id');
//            $table->string('name', 50);
//            $table->timestamps();
//        });
//
//        Schema::create('goods', function (Blueprint $table) {
//            $table->increments('id');
//            $table->string('name', 50);
//            $table->string('description', 150);
//            $table->integer('categories_id')->unsigned();
//            $table->foreign('categories_id')->on('categories')->references('id')->onDelete('cascade');
//            $table->string('image');
//            $table->timestamps();
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goods');
    }
}
