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
        Schema::create('payment_allocations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('payment_id')->constrained('payments')->onDelete('cascade');
            $table->foreignId('account_move_id')->constrained('account_moves')->onDelete('cascade'); // The invoice or bill being paid
            $table->decimal('allocated_amount', 15, 2);
            $table->date('allocation_date');
            $table->timestamps();

            $table->unique(['payment_id', 'account_move_id'], 'payment_allocation_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_allocations');
    }
};
