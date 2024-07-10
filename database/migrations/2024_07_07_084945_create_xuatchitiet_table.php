<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('xuatchitiet', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            
            $table->foreign('product_id')->references('id')->on('products');
            $table->unsignedBigInteger('xuat_id');
            $table->foreign('xuat_id')->references('id')->on('xuat')->onDelete('cascade');
           
           
            $table->float('price')->nullable();
            $table->float('total_price')->nullable();
            $table->integer('quantity');
           
           
            $table->date('ngaysx')->nullable();
            $table->date('hansd')->nullable();
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
        Schema::dropIfExists('xuatchitiet');
    }
};
