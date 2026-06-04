<?php

namespace App\Notifications;

use App\Models\SupportTicket;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class NewTicketNotification extends Notification
{
    use Queueable;

    public function __construct(
        public readonly SupportTicket $ticket
    ) {}

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toDatabase(object $notifiable): array
    {
        $submitterName = $this->ticket->user?->name ?? 'User';
        return [
            'type'          => 'new_ticket',
            'title'         => 'New support ticket created',
            'body'          => "Ticket #{$this->ticket->ticket_number} created by {$submitterName}: {$this->ticket->subject}",
            'ticket_id'     => $this->ticket->id,
            'ticket_number' => $this->ticket->ticket_number,
            'subject'       => $this->ticket->subject,
        ];
    }
}
