<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('promissorynotes', function (Blueprint $table) {
            $table->id('note_id'); 
            $table->string('user_id', 8);
            $table->string('name');
            $table->string('year_section');
            $table->string('contact_no');
            $table->enum('amount_due_for', ['prelim', 'midterm', 'semifinal', 'finals']);
            $table->decimal('partial_payment', 10, 2)->default(0.00);
            $table->decimal('balance_due', 10, 2);
            $table->text('reason');
            $table->date('payment_schedule');
            $table->timestamps(); 

            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('promissorynotes');
    }
};
