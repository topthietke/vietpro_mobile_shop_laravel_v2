<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');            
            $table->string('name');         
            $table->string('code'); 
            $table->string('promotion');
            $table->string('accessories');
            $table->string('image');  
            $table->decimal('price',18);
            $table->string('warrnty');
            $table->string('slug');
            $table->string('new');
            $table->tinyInteger('status');         
            $table->tinyInteger('featured');
            $table->string('details');
            $table->bigInteger('catid')->unsigned();
            $table->foreign('catid')->references('id')->on('categories')->onDelete('cascade');
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
        Schema::dropIfExists('products');
    }
}
