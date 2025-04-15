<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoSanXuatTable extends Migration
{
    public function up()
    {
        Schema::create('lo_san_xuat', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('san_pham_id'); // Sẽ liên kết qua model
            $table->unsignedBigInteger('nguyen_lieu_id'); // Sẽ liên kết qua model
            $table->integer('so_luong');
            $table->date('ngay_san_xuat');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('lo_san_xuat');
    }
}
