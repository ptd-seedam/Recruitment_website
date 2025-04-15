<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuanLyKhoTable extends Migration
{
    public function up()
    {
        Schema::create('quan_ly_kho', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kho_hang_id'); // Sẽ liên kết qua model
            $table->unsignedBigInteger('san_pham_id'); // Sẽ liên kết qua model
            $table->string('loai_chuyen_dong');
            $table->integer('so_luong');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('quan_ly_kho');
    }
}
