<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class InterviewScheduledNotification extends Notification
{
    use Queueable;

    public $application;
    public $interviewDate;
    public $interviewLocation;
    public $interviewNotes;

    /**
     * Create a new notification instance.
     */
    public function __construct($application, $interviewDate, $interviewLocation, $interviewNotes = null)
    {
        $this->application = $application;
        $this->interviewDate = $interviewDate;
        $this->interviewLocation = $interviewLocation;
        $this->interviewNotes = $interviewNotes;
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
        $companyName = $this->application->internship->company->name ?? 'A company';
        $title = $this->application->internship->title ?? 'an internship';

        $message = "Your interview with {$companyName} for {$title} is scheduled on {$this->interviewDate} at {$this->interviewLocation}.";
        
        if ($this->interviewNotes) {
            $message .= " Notes: {$this->interviewNotes}";
        }

        return [
            'message' => $message,
            'icon' => 'fa-calendar-check',
            'color' => 'green',
            'application_id' => $this->application->id,
            'interview_date' => $this->interviewDate,
            'interview_location' => $this->interviewLocation,
            'interview_notes' => $this->interviewNotes,
        ];
    }
}
