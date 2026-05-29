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
        Schema::create('internships', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description');
            $table->text('requirements')->nullable();
            $table->text('responsibilities')->nullable();
            $table->string('location')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->enum('internship_type', ['Remote', 'Onsite', 'Hybrid'])->default('Onsite');
            $table->string('duration');
            $table->string('salary')->nullable();
            $table->boolean('is_paid')->default(false);
            $table->string('field');
            $table->string('subfield')->nullable();
            $table->enum('experience_level', ['Beginner', 'Intermediate', 'Advanced'])->default('Beginner');
            $table->json('skills_required')->nullable();
            $table->integer('students_viewed')->default(0);
            $table->integer('application_count')->default(0);
            $table->date('deadline')->nullable();
            $table->enum('status', ['Open', 'Closed', 'Draft'])->default('Open');
            $table->boolean('featured')->default(false);
            $table->boolean('is_new')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('internships');
    }
};
