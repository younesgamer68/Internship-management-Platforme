<?php

namespace App\Livewire\Company;

use Livewire\Component;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;

class Interviews extends Component
{
    public $showInterviewModal = false;
    public $selectedInterview = null;

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
            ->where('status', 'interview')
            ->findOrFail($id);
            
        $this->showInterviewModal = true;
    }

    public function closeModal()
    {
        $this->showInterviewModal = false;
        $this->selectedInterview = null;
    }

    public function updateStatus($id, $status)
    {
        $application = Application::whereHas('internship', function($q) {
            $q->where('company_id', Auth::user()->company_id);
        })->findOrFail($id);
        
        $application->update(['status' => $status]);
        
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
            ->where('status', 'interview')
            ->latest()
            ->get();

        return view('livewire.company.interviews', [
            'interviews' => $interviews
        ]);
    }
}
