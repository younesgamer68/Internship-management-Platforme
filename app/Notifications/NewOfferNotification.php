<?php

namespace App\Notifications;

use App\Models\InternshipOffer;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class NewOfferNotification extends Notification
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
        $companyName = $this->offer->company?->company_name ?? 'A Company';
        return [
            'type'          => 'new_offer',
            'title'         => 'New Internship Offer',
            'body'          => "{$companyName} has sent you an internship offer for: {$this->offer->internship->title}.",
            'offer_id'      => $this->offer->id,
            'company_slug'  => $this->offer->company?->slug ?? 'internlink-demo',
            'internship_id' => $this->offer->internship_id,
        ];
    }
}
