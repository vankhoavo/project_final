<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('warehouses', function (Blueprint $table) {
            $table->id();
            $table->integer('id_product');
            $table->string('product_name')->nullable();
            $table->integer('input_unit_price')->nullable();
            $table->integer('input_quantity')->nullable();
            $table->integer('entry_warehouse')->nullable();
            $table->integer('is_warehouse')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('warehouses');
    }
};
