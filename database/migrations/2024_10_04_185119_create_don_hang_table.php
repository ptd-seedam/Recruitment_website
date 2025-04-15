<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonHangTable extends Migration
{
    public function up()
    {
        Schema::create('don_hang', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nguoi_dung_id'); // Sẽ liên kết qua model
            $table->unsignedBigInteger('khach_hang_id')->nullable(); // Cột liên kết đến khách hàng
            $table->decimal('tong_tien', 10, 2);
            $table->string('trang_thai');
            $table->string('trang_thai_thanh_toan');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('don_hang');
    }
}
