<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_code')->nullable();
            $table->string('recipient_name');
            $table->string('buyer_name');
            $table->string('email_name');
            $table->string('receiving_phone_number');
            $table->string('receiving_address');
            $table->integer('payment')->default(0);
            $table->integer('total_money')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
