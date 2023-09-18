<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('first_and_last_name');
            $table->string('email');
            $table->string('phone_number');
            $table->string('password');
            $table->date('date_of_birth');
            $table->string('hash_reset')->nullable();
            $table->integer('is_block')->default(0);
            $table->integer('rule_id')->default(1);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
