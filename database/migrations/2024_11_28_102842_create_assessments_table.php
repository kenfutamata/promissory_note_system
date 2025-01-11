<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{  
    public function up(): void
    {
        Schema::create('assessments', function (Blueprint $table) {
            $table->id('assessment_id');
            $table->string('user_id', 8); 
            $table->string('assessment_path')->nullable();
            $table->string('receipt_path')->nullable(); 
            $table->enum('assessment_type', ['Prelim', 'Midterm', 'Semifinal', 'Final']); 
            $table->date('uploaded_date')->nullable();

            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('assessments');
    }
};
