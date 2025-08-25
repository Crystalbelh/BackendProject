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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->decimal('amount', 10, 2);
            $table->string('payment_method')->nullable(); // e.g. paystack, flutterwave, card
            $table->enum('status', ['pending','paid','failed','refunded'])->default('pending');
            $table->string('transaction_reference')->nullable(); // gateway reference
            $table->json('meta')->nullable(); // raw gateway payload if you want
            $table->timestamps();

             $table->unique(['order_id']); // 1 payment record per order (simple flow)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
