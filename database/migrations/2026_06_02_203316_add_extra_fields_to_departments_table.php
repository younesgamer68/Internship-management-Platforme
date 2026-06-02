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
        Schema::table('departments', function (Blueprint $table) {
            $table->string('faculty')->nullable()->after('name');
            $table->string('head_name')->nullable()->after('university_id');
            $table->string('status')->default('active')->after('head_name'); // active, pending, inactive
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('departments', function (Blueprint $table) {
            $table->dropColumn(['faculty', 'head_name', 'status']);
        });
    }
};
