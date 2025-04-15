<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNguyenLieuTable extends Migration
{
    public function up()
    {
        Schema::create('nguyen_lieu', function (Blueprint $table) {
            $table->id();
            $table->string('ten');
            $table->string('don_vi');
            $table->decimal('gia', 10, 2);
            $table->integer('so_luong_ton');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('nguyen_lieu');
    }
}
