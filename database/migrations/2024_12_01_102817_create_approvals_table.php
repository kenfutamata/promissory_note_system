<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('approvals', function (Blueprint $table) {
            $table->id('approval_id');
            $table->unsignedBigInteger('assessment_id');
            $table->string('assessment_type');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->date('date_approved')->nullable();

            $table->foreign('assessment_id')->references('assessment_id')->on('assessments')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('approvals');
    }
};
