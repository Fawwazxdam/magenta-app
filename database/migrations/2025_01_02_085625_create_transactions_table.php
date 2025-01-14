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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('employee_id')->constrained('employees')->onDelete('cascade')->onUpdate('cascade');
            $table->string('code');
            $table->double('subtotal')->default(0);
            $table->double('discount')->default(0);
            $table->double('tax')->default(0);
            $table->double('total')->default(0);
            $table->enum('status', ['PENDING', 'ON_PROCESS', 'ON_THE_WAY', 'DELIVERED', 'COMPLETED'])->default('PENDING');
            $table->enum('paid_status', ['UNPAID', 'PARTIAL_PAID', 'PAID'])->default('UNPAID');
            $table->timestamp('created_on');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
