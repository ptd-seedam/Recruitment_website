<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanPhamTable extends Migration
{
    public function up()
    {
        Schema::create('san_pham', function (Blueprint $table) {
            $table->id();
            $table->string('ten');
            $table->decimal('gia', 10, 2);
            $table->integer('so_luong');
            $table->text('mo_ta')->nullable();
            $table->text('hinh_sp')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('san_pham');
    }
}
