<?php

namespace App\Notifications;

use App\Models\SupportTicket;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class TicketReplyNotification extends Notification
{
    use Queueable;

    public function __construct(
        public readonly SupportTicket $ticket,
        public readonly string $replyText,
        public readonly bool $isAdminReply = false,
    ) {}

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toDatabase(object $notifiable): array
    {
        return [
            'type'          => 'ticket_reply',
            'title'         => $this->isAdminReply
                ? 'New reply on your ticket'
                : 'User replied to ticket',
            'body'          => \Illuminate\Support\Str::limit($this->replyText, 80),
            'ticket_id'     => $this->ticket->id,
            'ticket_number' => $this->ticket->ticket_number,
            'subject'       => $this->ticket->subject,
        ];
    }
}
