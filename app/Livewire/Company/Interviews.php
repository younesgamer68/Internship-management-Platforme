<?php

namespace App\Livewire\Company;

use Livewire\Component;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;

class Interviews extends Component
{
    public $showInterviewModal = false;
    public $selectedInterview = null;

    public $showScheduleModal = false;
    public $interviewAppId = null;
    public $interviewDate = '';
    public $interviewLocation = '';
    public $interviewNotes = '';

    protected $rules = [
        'interviewAppId' => 'required|exists:applications,id',
        'interviewDate' => 'required|string',
        'interviewLocation' => 'required|string',
        'interviewNotes' => 'nullable|string',
    ];

    public function mount()
    {
        if (!Auth::user() || !Auth::user()->company_id) {
            abort(403);
        }
    }

    public function viewInterview($id)
    {
        $this->selectedInterview = Application::with(['user.userInfo', 'internship'])
            ->whereHas('internship', function($q) {
                $q->where('company_id', Auth::user()->company_id);
            })
            ->whereIn('status', ['interview', 'interview scheduled'])
            ->findOrFail($id);
            
        $this->showInterviewModal = true;
    }

    public function closeModal()
    {
        $this->showInterviewModal = false;
        $this->selectedInterview = null;
    }

    public function openScheduleModal()
    {
        $this->interviewAppId = '';
        $this->interviewDate = '';
        $this->interviewLocation = '';
        $this->interviewNotes = '';
        $this->showScheduleModal = true;
    }

    public function closeScheduleModal()
    {
        $this->showScheduleModal = false;
        $this->interviewAppId = null;
    }

    public function scheduleInterview()
    {
        $this->validate();

        $application = Application::whereHas('internship', function($q) {
            $q->where('company_id', Auth::user()->company_id);
        })->findOrFail($this->interviewAppId);
        
        $application->update([
            'status' => 'interview scheduled',
            'interview_date' => $this->interviewDate,
            'interview_location' => $this->interviewLocation,
            'interview_notes' => $this->interviewNotes,
        ]);
        
        // Notify the student about the interview
        $application->user->notify(new \App\Notifications\InterviewScheduledNotification(
            $application, 
            $this->interviewDate, 
            $this->interviewLocation, 
            $this->interviewNotes
        ));
        
        $this->closeScheduleModal();
        $this->dispatch('toast', message: 'Interview scheduled successfully', type: 'success');
    }

    public function updateStatus($id, $status)
    {
        $application = Application::whereHas('internship', function($q) {
            $q->where('company_id', Auth::user()->company_id);
        })->findOrFail($id);
        
        $application->update(['status' => $status]);
        
        // Notify the student about the status change
        $application->user->notify(new \App\Notifications\ApplicationStatusChanged($application));
        
        if ($this->selectedInterview && $this->selectedInterview->id === $id) {
            $this->selectedInterview->status = $status;
        }
        $this->showInterviewModal = false;
    }

    public function render()
    {
        $interviews = Application::with(['user.userInfo', 'internship'])
            ->whereHas('internship', function($q) {
                $q->where('company_id', Auth::user()->company_id);
            })
            ->whereIn('status', ['interview', 'interview scheduled'])
            ->latest()
            ->get();

        $acceptedApplicants = Application::with(['user'])
            ->whereHas('internship', function($q) {
                $q->where('company_id', Auth::user()->company_id);
            })
            ->where('status', 'accepted')
            ->latest()
            ->get();

        return view('livewire.company.interviews', [
            'interviews' => $interviews,
            'acceptedApplicants' => $acceptedApplicants
        ]);
    }
}
