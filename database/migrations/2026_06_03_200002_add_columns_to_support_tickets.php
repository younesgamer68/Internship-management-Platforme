<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('support_tickets', function (Blueprint $table) {
            $table->string('priority')->default('medium')->after('status'); // low, medium, high, urgent
            $table->foreignId('assigned_to')->nullable()->constrained('users')->nullOnDelete()->after('priority');
            $table->string('user_type')->default('intern')->after('user_id'); // intern, company
            $table->timestamp('resolved_at')->nullable()->after('assigned_to');
            $table->timestamp('closed_at')->nullable()->after('resolved_at');
            $table->string('attachment_path')->nullable()->after('description');

            $table->index('status');
            $table->index('priority');
            $table->index('user_type');
        });
    }

    public function down(): void
    {
        Schema::table('support_tickets', function (Blueprint $table) {
            $table->dropColumn(['priority', 'assigned_to', 'user_type', 'resolved_at', 'closed_at', 'attachment_path']);
        });
    }
};
