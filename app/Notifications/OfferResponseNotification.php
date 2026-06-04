<?php

namespace App\Notifications;

use App\Models\InternshipOffer;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class OfferResponseNotification extends Notification
{
    use Queueable;

    public function __construct(
        public readonly InternshipOffer $offer
    ) {}

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toDatabase(object $notifiable): array
    {
        $studentName = $this->offer->user?->name ?? 'An Intern';
        $status = $this->offer->status; // 'accepted' or 'rejected'
        return [
            'type'          => 'offer_response',
            'title'         => "Internship Offer " . ucfirst($status),
            'body'          => "{$studentName} has {$status} your internship offer for: {$this->offer->internship->title}.",
            'offer_id'      => $this->offer->id,
            'status'        => $status,
            'internship_id' => $this->offer->internship_id,
        ];
    }
}
