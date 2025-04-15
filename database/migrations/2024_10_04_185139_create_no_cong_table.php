<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoCongTable extends Migration
{
    public function up()
    {
        Schema::create('no_cong', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nguoi_dung_id');
            $table->unsignedBigInteger('khach_hang_id')->nullable(); // Sẽ liên kết qua model
            $table->decimal('tong_no', 10, 2);
            $table->timestamp('han_thanh_toan')->nullable();
            $table->string('trang_thai');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('no_cong');
    }
}
