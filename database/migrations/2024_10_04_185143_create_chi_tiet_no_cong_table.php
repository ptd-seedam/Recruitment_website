<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChiTietNoCongTable extends Migration
{
    public function up()
    {
        Schema::create('chi_tiet_no_cong', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('no_cong_id'); // Sẽ liên kết qua model
            $table->unsignedBigInteger('don_hang_id'); // Sẽ liên kết qua model
            $table->decimal('so_tien_con_no', 10, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('chi_tiet_no_cong');
    }
}
