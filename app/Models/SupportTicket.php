<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SupportTicket extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'ticket_number',
        'subject',
        'category',
        'description',
        'status',
    ];

    /**
     * Get the user who submitted the ticket.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
