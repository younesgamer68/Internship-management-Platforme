<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('intern_info_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Step 1: Personal Information
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone');
            $table->date('date_of_birth');
            $table->string('gender')->nullable();        // optional
            $table->string('country');
            $table->string('city');

            // Step 2: Education
            $table->string('university');
            $table->string('degree');
            $table->string('field_of_study');
            $table->integer('education_start_year');
            $table->integer('education_end_year')->nullable();   // optional
            $table->string('gpa')->nullable();                   // optional

            // Step 3: Experience & Skills
            $table->text('experience')->nullable();              // optional
            $table->text('skills');
            $table->string('linkedin_url')->nullable();          // optional
            $table->string('portfolio_url')->nullable();         // optional
            $table->string('resume_path');

            // Step 4: Motivation & Availability
            $table->text('motivation');
            $table->date('preferred_start_date');
            $table->string('availability');
            $table->string('referral_source')->nullable();       // optional

            $table->string('status')->default('pending');        // pending, approved, rejected
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('intern_info_details');
    }
};
