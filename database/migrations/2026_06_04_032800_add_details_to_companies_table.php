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
        Schema::table('companies', function (Blueprint $table) {
            $table->string('founded_year')->nullable();
            $table->string('headquarters')->nullable();
            $table->string('default_duration')->nullable();
            $table->string('default_location')->nullable();
            $table->integer('max_applicants')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->dropColumn(['founded_year', 'headquarters', 'default_duration', 'default_location', 'max_applicants']);
        });
    }
};
