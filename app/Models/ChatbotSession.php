<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ChatbotSession extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'preview',
        'messages',
    ];

    protected $casts = [
        'messages' => 'array',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get a short preview of the last user message.
     */
    public function updatePreview(string $lastMessage): void
    {
        $this->update([
            'preview' => \Illuminate\Support\Str::limit($lastMessage, 60),
        ]);
    }
}
