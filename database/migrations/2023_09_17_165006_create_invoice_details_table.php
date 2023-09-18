<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('invoice_details', function (Blueprint $table) {
            $table->id();
            $table->integer('id_product');
            $table->integer('id_customer');
            $table->integer('id_invoice')->nullable();
            $table->integer('is_invoice')->default(0);
            $table->integer('unit_price');
            $table->integer('quantity');
            $table->integer('into_money');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('invoice_details');
    }
};
