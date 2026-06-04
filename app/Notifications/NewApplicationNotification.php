<?php

namespace App\Notifications;

use App\Models\Application;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class NewApplicationNotification extends Notification
{
    use Queueable;

    public function __construct(
        public readonly Application $application
    ) {}

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toDatabase(object $notifiable): array
    {
        $applicantName = $this->application->user?->name ?? 'A student';
        $internshipTitle = $this->application->internship?->title ?? 'your internship';
        
        return [
            'type'          => 'new_application',
            'title'         => 'New Application Received',
            'body'          => "{$applicantName} has applied for {$internshipTitle}.",
            'application_id'=> $this->application->id,
            'internship_id' => $this->application->internship_id,
        ];
    }
}
