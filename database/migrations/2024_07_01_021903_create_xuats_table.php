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
        Schema::create('xuat', function (Blueprint $table) {
            $table->id();
            $table->string('ma_xuat')->unique(); // Unique identifier for the export
            $table->string('nguoi_xuat'); // Name or identifier of the person exporting
            $table->text('ghi_chu')->nullable(); // Additional notes or comments
            $table->text('noi_dung_xuat')->nullable(); // Description or details of the export
            $table->timestamps(); // Laravel's default timestamp columns (created_at, updated_at)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('xuat');
    }
};

