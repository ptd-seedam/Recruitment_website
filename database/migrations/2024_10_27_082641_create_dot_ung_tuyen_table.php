<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('dot_ung_tuyen', function (Blueprint $table) {
            $table->id();
            $table->string('ten_dotungtuyen');
            $table->date('ngaybatdau');
            $table->date('ngayketthuc');
            $table->text('mo_ta')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dot_ung_tuyen');
    }
};
