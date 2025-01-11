<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cads', function (Blueprint $table) {
            $table->id('cads_id');
            $table->unsignedBigInteger('note_id');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->date('date_approved')->nullable();

            $table->foreign('note_id')->references('note_id')->on('promissorynotes')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cads');
    }
};
