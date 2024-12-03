<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('user_name');
            $table->string('user_email');
            $table->string('user_phone');

            $table->decimal('price');
            $table->decimal('shipping_price');
            $table->decimal('total_price');

            $table->text('note');
            $table->enum('status',['pending','completed','cancelled','delivered'])->default('pending');

            $table->string('country');
            $table->string('governorate');
            $table->string('city');
            $table->text('street');

            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
