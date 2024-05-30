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
        Schema::create('recruitment_forms', function (Blueprint $table) {
            $table->id();
            $table->string('first_name'); // First name
            $table->string('last_name'); // Last name
            $table->string('email')->unique(); // Email
            $table->string('phone_number', 32); // Phone number
            $table->string('short_introduction', 100); // Short introduction
            $table->float('age'); // Age
            $table->string('city'); // City (assuming it's a simple string, you might want to set up a separate table for cities if needed)
            $table->string('field_of_study'); // Field of study
            $table->enum('degree', ['High School', 'Associate', 'Bachelor', 'Master', 'Doctorate']); // Degree
            $table->float('years_of_experience'); // Years of experience
            $table->string('photo_path'); // Path to the uploaded photo
            $table->string('resume_path'); // Path to the uploaded resume
            $table->timestamps(); // Timestamps for created_at and updated_at
            $table->softDeletes(); // Soft delete timestamp
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recruitment_forms');
    }
};
