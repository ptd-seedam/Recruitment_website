<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoanhThuTable extends Migration
{
    public function up()
    {
        Schema::create('doanh_thu', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('don_hang_id'); // Sẽ liên kết qua model
            $table->decimal('tong_doanh_thu', 10, 2);
            $table->string('trang_thai_thanh_toan');
            $table->timestamp('ngay_thanh_toan')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('doanh_thu');
    }
}
