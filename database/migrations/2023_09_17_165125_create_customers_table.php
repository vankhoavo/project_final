<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('first_and_last_name');
            $table->string('email');
            $table->string('password');
            $table->string('phone_number');
            $table->string('hash_active');
            $table->string('ip');
            $table->string('hash_reset')->nullable();
            $table->integer('is_active')->default(0);
            $table->integer('is_block')->default(0);
            $table->integer('provider_id')->nullable();
            $table->string('provider', 50)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
