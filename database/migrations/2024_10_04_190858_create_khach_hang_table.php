<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKhachHangTable extends Migration
{
    public function up()
    {
        Schema::create('khach_hang', function (Blueprint $table) {
            $table->id();
            $table->string('ten');
            $table->string('email')->unique()->nullable();
            $table->string('sdt')->nullable();
            $table->string('dia_chi')->nullable();
            $table->timestamps();
        });

    }

    public function down()
    {
        Schema::dropIfExists('khach_hang');
    }
}
