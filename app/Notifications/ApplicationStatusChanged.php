<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ApplicationStatusChanged extends Notification
{
    use Queueable;

    public $application;

    /**
     * Create a new notification instance.
     */
    public function __construct($application)
    {
        $this->application = $application;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        $status = strtolower($this->application->status);
        $companyName = $this->application->internship->company->name ?? 'A company';
        $title = $this->application->internship->title ?? 'an internship';

        $message = "Your application to {$companyName} for {$title} is now: " . ucfirst($status);
        $icon = 'fa-info-circle';
        $color = 'blue';

        if (in_array($status, ['interview', 'interview scheduled'])) {
            $message = "Great news! {$companyName} has scheduled an interview for {$title}.";
            $icon = 'fa-calendar-check';
            $color = 'green';
        } elseif ($status === 'accepted') {
            $message = "Congratulations! {$companyName} has accepted your application for {$title}.";
            $icon = 'fa-trophy';
            $color = 'green';
        } elseif ($status === 'rejected') {
            $message = "{$companyName} has decided not to move forward with your application for {$title}.";
            $icon = 'fa-times-circle';
            $color = 'red';
        }

        return [
            'message' => $message,
            'icon' => $icon,
            'color' => $color,
            'application_id' => $this->application->id,
        ];
    }
}
