<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->string('slug_product');
            $table->string('picture');
            $table->text('short_description');
            $table->longText('detailed_description');
            $table->integer('quantity')->default(0);
            $table->integer('status')->default(1);
            $table->integer('price_sell')->default(0);
            $table->integer('price_discount')->default(0);
            $table->integer('id_product_type');
            $table->integer('id_brand');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
