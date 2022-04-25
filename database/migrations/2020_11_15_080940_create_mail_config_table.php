<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMailConfigTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mail_config', function (Blueprint $table) {
            $table->bigincrements('id');
            $table->string('server',255);
            $table->string('username',50);
            $table->string('password', 255);
            $table->string('smtp', 255);
            $table->string('tcp',255);            
            $table->string('from',255);
            $table->string('sendcc',255);
            $table->string('subject',255);
            $table->string('content',255);
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
        Schema::dropIfExists('mail_config');
    }
}
