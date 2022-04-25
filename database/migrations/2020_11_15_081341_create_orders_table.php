<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
         //    thông tin khách hàng
             $table->bigInteger('cusId')->unsigned();                     
             $table->decimal('total',18);
             $table->tinyInteger('state');
             $table->timestamps();
             $table->foreign('cusId')->references('id')->on('customers')->onDelete('cascade'); 
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
