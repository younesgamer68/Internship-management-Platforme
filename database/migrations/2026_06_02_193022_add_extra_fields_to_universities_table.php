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
        Schema::table('universities', function (Blueprint $table) {
            $table->string('city')->nullable();
            $table->string('website')->nullable();
            $table->string('status')->default('Active'); // Active, Pending, Inactive
            $table->integer('faculties_count')->default(0);
            $table->integer('internships_count')->default(0);
            $table->integer('departments_count')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('universities', function (Blueprint $table) {
            $table->dropColumn([
                'city', 'website', 'status', 'faculties_count', 'internships_count', 'departments_count'
            ]);
        });
    }
};
