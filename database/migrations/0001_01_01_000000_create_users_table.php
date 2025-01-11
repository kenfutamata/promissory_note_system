<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('user_id', 8)->unique();
            $table->string('first_name');
            $table->string('middle_name')->nullable(); 
            $table->string('last_name'); 
            $table->string('email')->unique();
            $table->string('program');
            $table->string('year_section');
            $table->string('department');
            $table->string('password');
            $table->enum('role', ['admin', 'accounting', 'cads', 'student'])->default('student');
            $table->string('profile_picture')->nullable(); 
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
