<?php

namespace App\Livewire\Company;

use Livewire\Component;
use App\Models\Internship;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Offers extends Component
{
    public $title = '';
    public $location = '';
    public $internship_type = 'Onsite'; // match the select in mockup if there is one
    public $description = '';
    
    public $showCreateModal = false;

    protected $rules = [
        'title' => 'required|string|max:255',
        'location' => 'required|string|max:255',
        'internship_type' => 'required|string',
        'description' => 'required|string|min:10',
    ];

    public function mount()
    {
        if (!Auth::user() || !Auth::user()->company_id) {
            abort(403);
        }
    }
    
    public function openCreateModal()
    {
        $this->reset(['title', 'location', 'internship_type', 'description']);
        $this->showCreateModal = true;
    }
    
    public function closeModal()
    {
        $this->showCreateModal = false;
    }

    public function saveOffer()
    {
        $this->validate();

        $companyId = Auth::user()->company_id;

        Internship::create([
            'company_id' => $companyId,
            'title' => $this->title,
            'slug' => Str::slug($this->title) . '-' . uniqid(),
            'description' => $this->description,
            'location' => $this->location,
            'internship_type' => $this->internship_type,
            'requirements' => 'Basic requirements for this position.',
            'responsibilities' => 'Assist with day-to-day operations and team projects.',
            'duration' => '3 Months',
            'is_paid' => false,
            'field' => 'IT & Software',
            'subfield' => 'General',
            'experience_level' => 'Beginner',
            'skills_required' => ['Communication', 'Teamwork'],
            'deadline' => now()->addMonth(),
            'status' => 'Open',
            'featured' => false,
            'is_new' => true,
        ]);

        $this->showCreateModal = false;
        
        $this->dispatch('offer-saved'); // can trigger a toast in frontend
    }

    public function closeOffer($id)
    {
        $offer = Internship::where('company_id', Auth::user()->company_id)->findOrFail($id);
        $offer->update(['status' => 'Closed']);
    }

    public function reopenOffer($id)
    {
        $offer = Internship::where('company_id', Auth::user()->company_id)->findOrFail($id);
        $offer->update(['status' => 'Open']);
    }

    public function render()
    {
        $internships = Internship::where('company_id', Auth::user()->company_id)
            ->withCount('applications')
            ->latest()
            ->get();

        return view('livewire.company.offers', [
            'internships' => $internships
        ]);
    }
}
