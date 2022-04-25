<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigincrements('id');
            $table->string('cus_name',255); //tên khách hàng
            $table->tinyInteger('cus_gender'); // giới tính
            $table->string('cus_birthday',255); // ngày tháng năm sinh
            $table->string('cus_phone'); // số điện thoại
            $table->string('cus_identity_card',255); // chứng minh nhân dân / thẻ căng cước
            $table->string('cus_address'); // địa chỉ
            $table->string('cus_email', 255); // hòm thư điện tử
            $table->string('cus_password',255); // mật khẩu khách hàng
            $table->tinyInteger('cus_status'); // mật khẩu khách hàng
            $table->dateTime('cus_join'); // thời gian đăng ký, tham gia mua hàng
            //Khach hang co the dang ky theo email
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
        Schema::dropIfExists('customers');
    }
}
