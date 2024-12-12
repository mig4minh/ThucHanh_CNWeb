<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicinesTable extends Migration
{
    public function up(): void
    {
        Schema::create('medicines', function (Blueprint $table) {
            $table->id('medicine_id'); // Tạo PRIMARY KEY
            $table->string('name', 255); // Tên thuốc
            $table->string('brand', 100)->nullable(); // Thương hiệu (tùy chọn)
            $table->string('dosage', 50); // Liều lượng (ví dụ: 10mg tablets)
            $table->string('form', 50); // Dạng thuốc (viên nén, viên nang, xi-rô, v.v.)
            $table->decimal('price', 10, 2); // Giá đơn vị
            $table->integer('stock'); // Số lượng tồn kho
            $table->timestamps(); // Tạo created_at và updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('medicines');
    }
}
