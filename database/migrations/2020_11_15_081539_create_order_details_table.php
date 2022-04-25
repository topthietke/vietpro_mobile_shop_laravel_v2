<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_detail', function (Blueprint $table) {
            $table->bigIncrements('id');                             
            $table->integer('quantity')->unsigned();
            $table->integer('price')->unsigned();
            //Thông tin sản phẩm
            $table->bigInteger('prdid')->unsigned();
            $table->foreign('prdid')->references('id')->on('products')->onDelete('cascade');
            $table->bigInteger('ordid')->unsigned();
            $table->foreign('ordid')->references('id')->on('orders')->onDelete('cascade');
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
        Schema::dropIfExists('order_detail');
    }
}
