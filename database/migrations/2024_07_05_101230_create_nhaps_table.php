<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNhapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhaps', function (Blueprint $table) {
            $table->id();
            $table->string('ma_don')->unique();
            $table->string('nguoi_nhap');
            $table->text('ghi_chu')->nullable();
            $table->text('noi_dung_nhap')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nhaps');
    }
}
