<?php

namespace App\Livewire\Company;

use Livewire\Component;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;

class Applicants extends Component
{
    public $showApplicantModal = false;
    public $selectedApplicant = null;

    public function mount()
    {
        if (!Auth::user() || !Auth::user()->company_id) {
            abort(403);
        }
    }

    public function viewApplicant($id)
    {
        $this->selectedApplicant = Application::with(['user.userInfo', 'internship'])
            ->whereHas('internship', function($q) {
                $q->where('company_id', Auth::user()->company_id);
            })
            ->findOrFail($id);
            
        $this->showApplicantModal = true;
    }

    public function closeModal()
    {
        $this->showApplicantModal = false;
        $this->selectedApplicant = null;
    }

    public function updateStatus($id, $status)
    {
        $application = Application::whereHas('internship', function($q) {
            $q->where('company_id', Auth::user()->company_id);
        })->findOrFail($id);
        
        $application->update(['status' => $status]);
        
        if ($this->selectedApplicant && $this->selectedApplicant->id === $id) {
            $this->selectedApplicant->status = $status;
        }
    }

    public function render()
    {
        $applications = Application::with(['user.userInfo', 'internship'])
            ->whereHas('internship', function($q) {
                $q->where('company_id', Auth::user()->company_id);
            })
            ->latest()
            ->get();

        return view('livewire.company.applicants', [
            'applications' => $applications
        ]);
    }
}
