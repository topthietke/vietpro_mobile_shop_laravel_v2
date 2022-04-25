<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigincrements('id');
            $table->string('full',255);
            $table->string('password',255);
            $table->string('address', 255);
            $table->string('email', 255);
            $table->string('phone')->default('0395954444');
            $table->tinyInteger('level')->unsigned();
            $table->tinyInteger('status');
            $table->tinyInteger('gender');
            $table->Integer('google_id')->nullable();
            $table->Integer('facebook_id')->nullable();
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
        Schema::dropIfExists('users');
    }
}
