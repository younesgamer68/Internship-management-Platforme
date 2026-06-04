<?php

namespace App\Livewire\Company;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Internship;
use App\Models\Application;

class Dashboard extends Component
{
    public $totalApplications = 0;
    public $internApplicants = 0;
    public $upcomingInterviews = 0;
    public $activeOffers = 0;
    public $recentActivities = [];
    public $recentOffers = [];

    public function mount()
    {
        $user = Auth::user();
        if (!$user || !$user->company_id) {
            return;
        }
        
        $companyId = $user->company_id;

        $this->activeOffers = Internship::where('company_id', $companyId)
                                        ->where('status', '!=', 'closed')
                                        ->count();
                                        
        $this->totalApplications = Application::whereHas('internship', function($query) use ($companyId) {
            $query->where('company_id', $companyId);
        })->count();

        $this->internApplicants = Application::whereHas('internship', function($query) use ($companyId) {
            $query->where('company_id', $companyId);
        })->distinct('user_id')->count('user_id');

        $this->upcomingInterviews = Application::whereHas('internship', function($query) use ($companyId) {
            $query->where('company_id', $companyId);
        })->where('status', 'interview')->count();

        $this->recentActivities = Application::with(['user', 'internship'])
            ->whereHas('internship', function($query) use ($companyId) {
                $query->where('company_id', $companyId);
            })
            ->latest()
            ->take(5)
            ->get();
            
        $this->recentOffers = Internship::where('company_id', $companyId)
            ->withCount('applications')
            ->latest()
            ->take(3)
            ->get();
    }

    public function render()
    {
        return view('livewire.company.dashboard');
    }
}
