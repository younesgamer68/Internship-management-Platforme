<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasColumn('users', 'specialty_id')) {
            return;
        }

        // Legacy index from helpdesk schema includes specialty_id.
        try {
            DB::statement('DROP INDEX IF EXISTS users_specialty_id_is_available_index');
        } catch (\Throwable $e) {
            // Ignore index-drop failures and continue column cleanup.
        }

        Schema::table('users', function (Blueprint $table) {
            $table->dropConstrainedForeignId('specialty_id');
        });
    }

    public function down(): void
    {
        if (Schema::hasColumn('users', 'specialty_id')) {
            return;
        }

        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('specialty_id')
                ->nullable()
                ->constrained('ticket_categories')
                ->nullOnDelete();
        });
    }
};