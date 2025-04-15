<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChiTietDonHangTable extends Migration
{
    public function up()
    {
        Schema::create('chi_tiet_don_hang', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('don_hang_id'); // Sẽ liên kết qua model
            $table->unsignedBigInteger('san_pham_id'); // Sẽ liên kết qua model
            $table->integer('so_luong');
            $table->decimal('gia', 10, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('chi_tiet_don_hang');
    }
}
