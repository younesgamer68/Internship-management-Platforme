<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        $tables = [
            'ticket_mentions',
            'ticket_attachments',
            'ticket_logs',
            'ticket_replies',
            'tickets',
            'customers',
            'category_user',
            'ticket_categories',
            'team_user',
            'teams',
            'saved_filter_views',
            'sla_policies',
            'automation_rules',
            'auto_triage_rules',
            'golden_responses',
            'ai_suggestion_logs',
            'company_ai_settings',
            'chatbot_conversations',
            'chatbot_faqs',
            'agent_conversations',
            'conversations',
            'kb_media',
            'kb_article_versions',
            'kb_articles',
            'kb_categories',
            'widget_settings',
            'company_mail_settings',
            'tenant_configs',
        ];

        foreach ($tables as $table) {
            Schema::dropIfExists($table);
        }

        Schema::enableForeignKeyConstraints();
    }

    public function down(): void
    {
        // Intentionally left empty: this cleanup is destructive and not reversible.
    }
};