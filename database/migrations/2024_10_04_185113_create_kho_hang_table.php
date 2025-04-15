<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKhoHangTable extends Migration
{
    public function up()
    {
        Schema::create('kho_hang', function (Blueprint $table) {
            $table->id();
            $table->string('ten');
            $table->string('dia_chi');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kho_hang');
    }
}
