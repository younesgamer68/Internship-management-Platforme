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
        Schema::table('users', function (Blueprint $table) {
            $table->string('user_id')->nullable();
            $table->string('provider')->nullable();
            $table->string('join_date')->nullable();
            $table->string('last_login')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('role_name')->nullable();
            $table->string('position')->nullable();
            $table->string('department')->nullable();
            $table->string('line_manager')->nullable();
            $table->string('seconde_line_manager')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'user_id',
                'provider',
                'join_date',
                'last_login',
                'phone_number',
                'role_name',
                'position',
                'department',
                'line_manager',
                'seconde_line_manager'
            ]);
        });
    }
};
