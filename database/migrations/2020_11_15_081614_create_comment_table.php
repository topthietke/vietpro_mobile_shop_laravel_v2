<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment', function (Blueprint $table) {
            // Mã bình luận
            $table->bigIncrements('id');
            // Mã khách hàng (tên khách hàng, mail của khách hàng)
            $table->bigInteger('cusid')->unsigned();
            // Mã sản phẩm
            $table->bigInteger('prdid')->unsigned();
            // Nội dung comment
            $table->string('com_detail');
            // Trạng thái comment
            $table->string('com_status');
            // Thời gian comment
            $table->timestamps();
            // Tạo quan hệ với bảng product
            $table->foreign('prdid')->references('id')->on('products')->onDelete('cascade');
            // Tạo quản hệ với bảng khách hàng
            $table->foreign('cusid')->references('id')->on('customers')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comment');
    }
}
